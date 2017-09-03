<?php
namespace Dfe\Qiwi;
/**
 * 2017-09-03
 * @method Method m()
 * @method Settings s()
 */
final class Charge extends \Df\Payment\Charge {
	/**
	 * 2017-09-03
	 * @used-by p()
	 * @return array(string => mixed)
	 */
	private function pCharge() {$s = $this->s(); return [];}

	/**
	 * 2017-09-03
	 * @used-by \Dfe\Qiwi\Init\Action::req()
	 * @param Method $m
	 * @return array(string, array(string => mixed))
	 */
	static function p(Method $m) {return (new self($m))->pCharge();}
}