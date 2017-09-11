<?php
namespace Dfe\Qiwi\Init;
use Dfe\Qiwi\API\Bill;
use Dfe\Qiwi\Charge;
use Dfe\Qiwi\Method as M;
use Dfe\Qiwi\W\Event as Ev;
// 2017-09-02
/** @method \Dfe\Qiwi\Method m() */
final class Action extends \Df\Payment\Init\Action {
	/**
	 * 2017-09-10
	 * @override
	 * @see \Df\Payment\Init\Action::forceGet()
	 * @used-by \Df\Payment\Init\Action::action()
	 * @return string
	 */
	protected function forceGet() {return true;}

	/**
	 * 2017-09-10
	 * @override
	 * @see \Df\Payment\Init\Action::redirectParams()
	 * @used-by \Df\Payment\Init\Action::action()
	 * @return array(string => mixed)
	 */
	protected function redirectParams() {return $this->charge()->pRedirect();}

	/**
	 * 2017-09-02
	 * «[QIWI Wallet] The REST API specification (v.2.12)»: https://mage2.pro/t/3745
	 * «4.3. Redirection for Invoice Payment», page 9.
	 * «Merchant may offer a Visa QIWI Wallet user to pay the invoice immediately
	 * by redirecting to the Visa QIWI Wallet checkout page.»
	 * «4.3. Переадресация для оплаты счета», страница 9.
	 * «Провайдер может предложить пользователю немедленно оплатить счет
	 * с помощью переадресации на страницу оплаты».
	 * 2017-09-04
	 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_checkout_en.html.md#checkout-checkout_en
	 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_checkout_ru.html.md#Форма-оплаты-checkout_ru
	 * https://developer.qiwi.com/ru/pull-payments/index.html#checkout_ru
	 * @override
	 * @see \Df\Payment\Init\Action::redirectUrl()
	 * @used-by \Df\Payment\Init\Action::action()
	 * @return string
	 */
	protected function redirectUrl() {return 'https://bill.qiwi.com/order/external/main.action';}

	/**
	 * 2017-09-10
	 * 2017-09-11
	 * «4.2. Creating an Invoice», page 7.
	 * «4.2. Выставление счета пользователю», страница 7.
	 * `[QIWI Wallet] The REST API specification (v.2.12)`, https://mage2.pro/t/3745
	 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_pull-payments-api_en.html.md#request--put
	 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_pull-payments-api_ru.html.md#Запрос--put
	 * https://developer.qiwi.com/ru/pull-payments/index.html#invoice_rest
	 * @override
	 * @see \Df\Payment\Init\Action::preorder()
	 * @used-by \Df\Payment\Init\Action::action()
	 */
	protected function preorder() {
		$c = $this->charge(); /** @var Charge $c */
		/** @var M $m */ /** @var array(string => mixed) $req */
		df_sentry_extra($m = $this->m(), 'Request Params', $req = $c->pBill());
		$res = Bill::s()->put([$c->id(), $req]); /** @var array(string => mixed) $res */
		$m->iiaSetTRR($req, $res);
		dfp_report($m, ['Request' => $req, 'Response' => $res], 'preorder');
	}

	/**
	 * 2017-09-04
	 * QIWI Wallet does not provide its own payment ID in a payment response:
	 * `An example of a response to «PUT https://api.qiwi.com/api/v2/prv/{prv_id}/bills/{bill_id}»`
	 * https://mage2.pro/t/4447
	 * So we use our internal payment ID as a base for the corresponding Magento transaction ID.
	 * @override
	 * @see \Df\Payment\Init\Action::transId()
	 * @used-by \Df\Payment\Init\Action::action()
	 * @used-by action()
	 * @return string|null
	 */
	protected function transId() {return $this->e2i($this->charge()->id(), Ev::T_INIT);}

	/**
	 * 2017-09-04
	 * @used-by preorder()
	 * @used-by redirectParams()
	 * @used-by transId()
	 * @return Charge
	 */
	private function charge() {return dfc($this, function() {return new Charge($this->m());});}
}