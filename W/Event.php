<?php
namespace Dfe\Qiwi\W;
use Magento\Sales\Model\Order\Payment\Transaction as T;
// 2017-09-14 [QIWI Wallet] An example of a webhook notification: https://mage2.pro/t/4487
final class Event extends \Df\PaypalClone\W\Event {
	/**
	 * 2017-09-14
	 * @override
	 * @see \Df\PaypalClone\W\Event::k_idE()
	 * @used-by \Df\PaypalClone\W\Event::idE()
	 * @return string
	 */
	protected function k_idE() {return $this->k_pid();}

	/**
	 * 2017-09-14
	 * @override
	 * @see \Df\Payment\W\Event::k_pid()
	 * @used-by k_idE()
	 * @used-by \Df\Payment\W\Event::pid()
	 * @return string
	 */
	protected function k_pid() {return 'bill_id';}

	/**
	 * 2017-09-14
	 * @see \Dfe\Qiwi\W\Reader::http()
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
	 * @see \Df\PaypalClone\W\Event::k_signature()
	 * @used-by \Df\PaypalClone\W\Event::signatureProvided()
	 * @return string
	 */
	protected function k_signature() {return Reader::K__SIGNATURE;}

	/**
	 * 2017-09-14
	 * «Operation Statuses»:
	 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_statuses_en.html.md#operation-statuses
	 * «Статусы операций»:
	 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_statuses_ru.html.md#Статусы-операций
	 * @override
	 * @see \Df\PaypalClone\W\Event::k_status()
	 * @used-by \Df\PaypalClone\W\Event::status()
	 * @return string
	 */
	protected function k_status() {return 'status';}
}