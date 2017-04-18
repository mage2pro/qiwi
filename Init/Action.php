<?php
namespace Dfe\Qiwi\Init;
// 2017-04-18
/** @method \Dfe\Qiwi\Method m() */
final class Action extends \Df\PaypalClone\Init\Action {
	/**
	 * 2017-04-18
	 * @override
	 * @see \Df\Payment\Init\Action::redirectUrl()
	 * @used-by \Df\Payment\Init\Action::action()
	 * @return string
	 */
	protected function redirectUrl() {return '';}
}