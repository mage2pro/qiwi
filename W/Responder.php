<?php
namespace Dfe\Qiwi\W;
use Dfe\Qiwi\Result;
/**
 * 2017-09-12
 * In English:
 * 1) The GitHub-based documentation:
 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_notification_en.html.md#requirements-to-the-response-for-notification
 * 2) The PDF-based documentation:
 * «5.2. Requirements to the Response», page 20
 * `[QIWI Wallet] The REST API specification (v.2.12)`, https://mage2.pro/t/3745
 * « The response should be in XML.
 *  "Content-type" HTTP header must be "text/xml"
 * otherwise notification is treated as unsuccessful on Visa QIWI Wallet side.
 *  In response to the request, the result code must be returned in result_code tag within result tag.
 * In order to help in identifying the reasons of notification errors
 * we recommend that the result codes returned by the merchant
 * be in accordance with Notification codes table:
 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_notification_en.html.md#notification-codes-notify_codes
 *  Any response with result code other than 0 ("Success") and/or HTTP status code other than 200 (OK)
 * will be treated by Visa QIWI Wallet server as a temporary error.
 * Thus the server will continue repeating requests (notifications) with increased time intervals
 * within next 24 hours (50 attempts in total)
 * until it gets a response with result code 0 ("Success") and HTTP status code 200 (OK).
 * If the response with result code 0 ("Success") and HTTP status code 200
 * has not been received within 24 hours, Visa QIWI Wallet server will stop sending the requests
 * and will send an email to the merchant with new Invoice status code
 * and indication on the possible technical issues on the merchant’s server side.»
 *
 * In Russian:
 * 1) The GitHub-based documentation:
 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_notification_ru.html.md#Ответ--post
 * 2) The PDF-based documentation:
 * «5.2. Требования к ответу провайдера», страница 20.
 * `[QIWI Wallet] The REST API specification (v.2.12)`, https://mage2.pro/t/3745
 *  Ответ на запрос должен быть в формате XML.
 *  HTTP-заголовок Content-Type ответа должен быть равен «text/xml».
 * В противном случае уведомление будет считаться неуспешным.
 *  В ответе на запрос должен вернуться код результата обработки уведомления.
 * Код результата должен находиться в теге result_code, вложенном в тег result.
 * В целях ускорения выявления причин временных ошибок
 * рекомендуется возвращать коды результата в соответствии с таблицей кодов завершения:
 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_notification_ru.html.md#Коды-уведомлений--notify_codes
 *  Любой ответ, содержащий код результата обработки уведомления, отличный от 0 ("Успех"),
 * и/или код состояния HTTP, отличный от 200 (OK),
 * интерпретируется сервером Visa QIWI Wallet как временная ошибка провайдера.
 * Сервер повторяет запрос с нарастающим интервалом в течение суток (всего 50 попыток)
 * до получения в ответе кода результата 0 и кода состояния HTTP 200.
 * Если ответ с кодом результата 0 и кодом состояния HTTP 200 так и не был получен в указанное время,
 * повторные уведомления от сервера Visa QIWI Wallet прекращаются,
 * и на адрес электронной почты провайдера высылается письмо с новым статусом счета
 * и указанием на возможную техническую неисправность в работе сервиса провайдера.
 */
final class Responder extends \Df\Payment\W\Responder {
	/**
	 * 2017-09-13
	 * 2023-08-03 "Treat `\Throwable` similar to `\Exception`": https://github.com/mage2pro/core/issues/311
	 * @override
	 * @see \Df\Payment\W\Responder::error()
	 * @used-by \Df\Payment\W\Responder::setError()
	 * @param \Throwable|string $t
	 */
	protected function error($t):Result {return Result::i(1)->setHttpResponseCode(500);}

	/**
	 * 2017-09-12
	 * @override
	 * @see \Df\Payment\W\Responder::notForUs()
	 * @used-by \Df\Payment\W\Responder::setNotForUs()
	 */
	protected function notForUs(string $m):Result {return $this->success();}

	/**
	 * 2017-09-13
	 * @override
	 * @see \Df\Payment\W\Responder::success()
	 * @used-by self::notForUs()
	 * @used-by \Df\Payment\W\Responder::get()
	 */
	protected function success():Result {return Result::i(0);}
}