<?php
namespace Dfe\Qiwi;
// 2017-09-02 The «QIWI Wallet» PSP does not provide a test mode: https://mage2.pro/t/4443
/** @method static Settings s() */
final class Settings extends \Df\Payment\Settings {
	/**
	 * 2017-09-02 «API ID».
	 * @used-by \Dfe\Qiwi\API\Client::headers()
	 * @return string
	 */
	function apiID() {return $this->v();}

	/**
	 * 2017-09-02 «API password».
	 * @used-by \Dfe\Qiwi\API\Client::headers()
	 * @return string
	 */
	function password1() {return $this->p();}

	/**
	 * 2017-09-02 «Webhook password».
	 * @return string
	 */
	function password2() {return $this->p();}
}