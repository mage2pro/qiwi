<?php
namespace Dfe\Qiwi\Init;
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
	 * @override
	 * @see \Df\Payment\Init\Action::redirectUrl()
	 * @used-by \Df\Payment\Init\Action::action()
	 * @return string
	 */
	protected function redirectUrl() {return 'https://bill.qiwi.com/order/external/main.action';}

	/**
	 * 2017-09-03
	 * @override
	 * @see \Df\Payment\Init\Action::transId()
	 * @used-by \Df\Payment\Init\Action::action()
	 * @used-by action()
	 * @return string|null
	 */
	protected function transId() {return $this->e2i('', Ev::T_INIT);}

	/**
	 * 2017-09-03
	 * @used-by res()
	 * @return array(string => mixed)
	 */
	private function req() {return dfc($this, function() {
		/** @var M $m */ /** @var array(string => mixed) $result */
		df_sentry_extra($m = $this->m(), 'Request Params', $result = Charge::p($m));
		$m->iiaSetTRR($result);
		return $result;
	});}

	/**
	 * 2017-09-03
	 * @used-by redirectUrl()
	 * @used-by transId()
	 * @return array(string => mixed)
	 */
	private function res() {return [];}
}