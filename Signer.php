<?php
namespace Dfe\Qiwi;
use Dfe\Qiwi\W\Reader;
// 2017-09-14
/** @method Settings s() */
final class Signer extends \Df\PaypalClone\Signer {
	/**
	 * 2017-09-14
	 * @override
	 * @see \Df\PaypalClone\Signer::sign()
	 * @used-by \Df\PaypalClone\Signer::_sign()
	 * @return string
	 */
	protected function sign() {return base64_encode(self::hexToStr(hash_hmac('sha1',
		implode('|', df_ksort(df_clean_keys($this->v(), Reader::K__SIGNATURE)))
		,$this->s()->password2()
	)));}

	/**
	 * 2017-09-14
	 * I have copied this function from the documentation.
	 * 1) The GitHub-based documentation:
	 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_notification_en.html.md#signed-notification-authorization-in-php-php_apisign
	 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_notification_ru.html.md#Пример-реализации
	 * 2) The PDF documentation:
	 * 6.6.2. «APPENDICES» → «Examples of Signed Notification Authorization» → «PHP», page 24
	 * 6.6.2. «ПРИЛОЖЕНИЯ» → «Примеры проверки цифровой подписи уведомления» → «PHP», страница 24.
	 * `[QIWI Wallet] The REST API specification (v.2.12)`, https://mage2.pro/t/3745
	 * @used-by sign()
	 * @param string $hex
	 * @return string
	 */
	private static function hexToStr($hex){
		$r = ''; /** @var string $r */
		for ($i=0; $i < strlen($hex)-1; $i+=2) {
			$r .= chr(hexdec($hex[$i].$hex[$i+1]));
		}
		return $r;
	}
}