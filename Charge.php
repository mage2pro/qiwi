<?php
namespace Dfe\Qiwi;
use Df\Payment\Source\Identification;
/**
 * 2017-09-03
 * @method Method m()
 * @method Settings s()
 */
final class Charge extends \Df\Payment\Charge {
	/**
	 * 2017-09-03
	 * @used-by p()
	 * @return array(string, array(string => mixed))
	 */
	private function pCharge() {$s = $this->s(); return [];}

	/**
	 * 2017-09-03
	 * @used-by \Dfe\Qiwi\Init\Action::req()
	 * @return array(string, array(string => mixed))
	 */
	static function p() {
		$i = new self(dfpm(__CLASS__)); /** @var self $i */
		return [Identification::get($i->o()), $i->pCharge()];
	}
}