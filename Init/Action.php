<?php
namespace Dfe\Qiwi\Init;
// 2017-09-02
/** @method \Dfe\Qiwi\Method m() */
final class Action extends \Df\PaypalClone\Init\Action {
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
}