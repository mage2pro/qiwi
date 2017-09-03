<?php
namespace Dfe\Qiwi\API;
/**
 * 2017-09-03
 * [QIWI Wallet] An example of a response to «PUT https://api.qiwi.com/api/v2/prv/{prv_id}/bills/{bill_id}»
 * https://mage2.pro/t/4447
 * @used-by \Dfe\Qiwi\API\Client::responseValidatorC()
 */
final class Validator extends \Df\API\Response\Validator {
	/**
	 * 2017-09-03
	 * @override
	 * @see \Df\API\Exception::long()
	 * @used-by \Df\API\Client::p()
	 * @return string
	 */
	function long() {return '';}

	/**
	 * 2017-09-03
	 * @override
	 * @see \Df\API\Exception::short()
	 * @used-by \Df\API\Client::p()
	 * @return string
	 */
	function short() {return '';}

	/**
	 * 2017-09-03
	 * @override
	 * @see \Df\API\Response\Validator::valid()
	 * @used-by \Df\API\Response\Validator::validate()
	 * @return bool
	 */
	function valid() {return !$this->rCode();}

	/**
	 * 2017-09-03 `[QIWI Wallet] API error codes`: https://mage2.pro/t/4448
	 * @used-by valid()
	 * @return int
	 */
	private function rCode() {return dfc($this, function() {return
		intval(dfa($this->r(), 'result_code'))
	;});}
}