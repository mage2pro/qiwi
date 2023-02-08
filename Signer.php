<?php
namespace Dfe\Qiwi;
use Dfe\Qiwi\W\Reader;
# 2017-09-14
/** @method Settings s() */
final class Signer extends \Df\PaypalClone\Signer {
	/**
	 * 2017-09-14
	 * 2022-10-27
	 * 1) https://3v4l.org/ZVTE9
	 * https://stackoverflow.com/a/50056467
	 * php.net/manual/function.hex2bin.php
	 * 2) Previously, I used a custom implementation of the @uses hex2bin() function from the documentation:
	 * 2.1) The GitHub-based documentation:
	 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_notification_en.html.md#signed-notification-authorization-in-php-php_apisign
	 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_notification_ru.html.md#Пример-реализации
	 * 2.2) The PDF documentation:
	 * 6.6.2. «APPENDICES» → «Examples of Signed Notification Authorization» → «PHP», page 24
	 * 6.6.2. «ПРИЛОЖЕНИЯ» → «Примеры проверки цифровой подписи уведомления» → «PHP», страница 24.
	 * `[QIWI Wallet] The REST API specification (v.2.12)`, https://mage2.pro/t/3745
	 * @override
	 * @see \Df\PaypalClone\Signer::sign()
	 * @used-by \Df\PaypalClone\Signer::_sign()
	 */
	protected function sign():string {return base64_encode(hex2bin(hash_hmac('sha1',
		implode('|', df_ksort(df_clean_keys($this->v(), Reader::K__SIGNATURE))), $this->s()->password2()
	)));}
}