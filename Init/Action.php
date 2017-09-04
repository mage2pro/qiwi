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
	protected function redirectUrl() {return
		'https://bill.qiwi.com/order/external/main.action?' . http_build_query($this->charge()->pRedirect())
	;}

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
	 * 2017-09-03
	 * @used-by id()
	 * @used-by res()
	 * @return array(string => mixed)
	 */
	private function req() {return dfc($this, function() {
		/** @var M $m */ /** @var array(string => mixed) $result */
		df_sentry_extra($m = $this->m(), 'Request Params', $result = $this->charge()->pBill());
		$m->iiaSetTRR($result);
		return $result;
	});}
	
	/**
	 * 2017-09-04
	 * @used-by redirectUrl()
	 * @used-by transId()
	 * @return array(string => mixed)
	 */
	private function res() {return dfc($this, function() {
		$m = $this->m(); /** @var M $m */
		$m->iiaSetTRR(null, $r = Bill::s()->put($this->req())); /** @var array(string => mixed) $r */
		dfp_report($m, $r, 'response');
		return $r;
	});}

	/**
	 * 2017-09-04
	 * @used-by req()
	 * @used-by transId()
	 * @return Charge
	 */
	private function charge() {return dfc($this, function() {return new Charge($this->m());});}
}