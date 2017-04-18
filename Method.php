<?php
namespace Dfe\Qiwi;
// 2017-04-18
final class Method extends \Df\PaypalClone\Method {
	/**
	 * 2017-04-18
	 * @override
	 * @see \Df\Payment\Method::amountLimits()
	 * @used-by \Df\Payment\Method::isAvailable()
	 * @return null
	 */
	protected function amountLimits() {return null;}
}