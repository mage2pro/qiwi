<?php
namespace Dfe\Qiwi;
/**
 * 2017-04-18
 * @see \Dfe\Qiwi\Signer\Request
 * @see \Dfe\Qiwi\Signer\Response
 * @method Settings s()
 */
abstract class Signer extends \Df\PaypalClone\Signer {
	/**
	 * 2017-04-18
	 * @used-by sign()
	 * @see \Dfe\Qiwi\Signer\Request::values()
	 * @see \Dfe\Qiwi\Signer\Response::values()
	 * @return string[]
	 */
	abstract protected function values();

	/**
	 * 2017-04-18
	 * @override
	 * @see \Df\PaypalClone\Signer::sign()
	 * @used-by \Df\PaypalClone\Signer::_sign()
	 * @return string
	 */
	final protected function sign() {return implode($this->values());}
}