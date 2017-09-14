<?php
namespace Dfe\Qiwi\W;
// 2017-09-14
final class Reader extends \Df\Payment\W\Reader {
	/**
	 * 2017-09-14
	 * 1) The GitHub-based documentation:
	 * «The HTTP header X-Api-Signature is added to the POST-request».
	 * «Подпись уведомления отправляется в заголовке X-Api-Signature».
	 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_statuses_en.html.md#operation-statuses
	 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_notification_ru.html.md#Авторизация-подписи-sign_notify
	 * 2) The PDF documentation, page 19:
	 * «The HTTP header "X-Api-Signature" is added to the POST-request».
	 * «В HTTP-запрос уведомления добавляется HTTP-заголовок "X-Api-Signature", содержащий цифровую подпись».
	 * `[QIWI Wallet] The REST API specification (v.2.12)`, https://mage2.pro/t/3745
	 * @override
	 * @see \Df\Payment\W\Reader::http()
	 * @used-by \Df\Payment\W\Reader::__construct()
	 * @return array(string => mixed)
	 */
	protected function http() {return parent::http() + [
		self::K__SIGNATURE => df_request_header(self::K__SIGNATURE)
	];}

	/**
	 * 2017-09-14
	 * @used-by http()
	 * @used-by \Dfe\Qiwi\Signer::sign()
	 * @used-by \Dfe\Qiwi\W\Event::k_signature()
	 */
	const K__SIGNATURE = 'X-Api-Signature';
}