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
	 * 2017-09-04 Our local (without the module prefix) internal payment ID.
	 * @override
	 * @see \Df\Payment\Operation::id()
	 * @used-by pRedirect()
	 * @used-by \Dfe\Qiwi\Init\Action::transId()
	 * @return string
	 */
	function id() {return dfc($this, function() {return Identification::get($this->o());});}

	/**
	 * 2017-09-04
	 * «4.2. Creating an Invoice», page 7.
	 * «4.2. Выставление счета пользователю», страница 7.
	 * `[QIWI Wallet] The REST API specification (v.2.12)`, https://mage2.pro/t/3745
	 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_pull-payments-api_en.html.md#request--put
	 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_pull-payments-api_ru.html.md#Запрос--put
	 * https://developer.qiwi.com/ru/pull-payments/index.html#invoice_rest
	 * @used-by \Dfe\Qiwi\Init\Action::req()
	 * @return array(string, array(string => mixed))
	 */
	function pBill() {$s = $this->s(); return [
		// 2017-09-04
		// «The invoice amount. The rounding up method depends on the invoice currency.»
		// «Сумма, на которую выставляется счет. Способ округления зависит от валюты.»
		// Required, number(6.3).
		'amount' => ''
		// 2017-09-04
		// «Invoice currency identifier (Alpha-3 ISO 4217 code).
		// Depends on currencies allowed for the merchant.
		// The following values are supported: RUB, EUR, USD, KZT.»
		// «Идентификатор валюты (Alpha-3 ISO 4217 код).
		// Может использоваться любая валюта, предусмотренная договором с КИВИ.»
		// Required, string(3).
		// As you can see, the English and Russian versions of the same documentation
		// contain a contradictory information about currencies.
		// [QIWI Wallet] Which currencies are supported by the REST API? https://mage2.pro/t/4445
		,'ccy' => ''
		// 2017-09-04
		// «Comment to the invoice» / «Комментарий к счету»
		// Required, string(255).
		,'comment' => ''
		// 2017-09-04
		// «Date and time up to which the invoice is available for payment.
		// If the invoice is not paid by this date it will become void and will be assigned a final status.
		// Important! Invoice will be automatically expired when 45 days is passed after the invoicing date.»
		// «Дата, до которой счет будет доступен для оплаты.
		// Если счет не будет оплачен до этой даты, ему присваивается финальный статус
		// и последующая оплата станет невозможна.
		// Внимание! По истечении 28 суток от даты выставления
		// счет автоматически будет переведен в финальный статус.»
		// Required, dateTime.
		// As you can see, the English and Russian versions of the same documentation
		// contain a contradictory information.
		// [QIWI Wallet] What is the maximum unpaid invoice lifetime? https://mage2.pro/t/4453
		,'lifetime' => ''
		// 2017-09-04
		// «If the value is "mobile" the user’s MNO balance will be used as a funding source.
		// If the value is "qw", any other funding source is used available in Visa QIWI Wallet interface.
		// If parameter isn’t present, value "qw" is assumed.»
		// «"mobile" - оплата счета будет производиться с баланса мобильного телефона пользователя,
		// "qw" – любым способом через интерфейс Visa QIWI Wallet.
		// По умолчанию "qw".»
		// Optional, string.
		,'pay_source' => 'qw'
		// 2017-09-04
		// «Merchant’s name» / «Название провайдера»
		// Optional, string(100).
		,'prv_name' => ''
		// 2017-09-04
		// «The Visa QIWI Wallet user’s ID, to whom the invoice is issued.
		// It is the user’s phone number with "tel:" prefix.»
		// «Идентификатор номера QIWI Wallet, на который выставляется счет (в международном формате),
		// с префиксом "tel:".»
		// Required, string(20).
		,'user' => ''
	];}

	/**
	 * 2017-09-04
	 * «4.3. Redirection for Invoice Payment», page 9.
	 * «4.3. Переадресация для оплаты счета», страница 9.
	 * «Merchant may offer a Visa QIWI Wallet user to pay the invoice immediately
	 * by redirecting to the Visa QIWI Wallet checkout page.»
	 * «Провайдер может предложить пользователю немедленно оплатить счет
	 * с помощью переадресации на страницу оплаты».
	 * «[QIWI Wallet] The REST API specification (v.2.12)»: https://mage2.pro/t/3745
	 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_checkout_en.html.md#checkout-checkout_en
	 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_checkout_ru.html.md#Форма-оплаты-checkout_ru
	 * https://developer.qiwi.com/ru/pull-payments/index.html#checkout_ru
	 * @used-by \Dfe\Qiwi\Init\Action::req()
	 * @return array(string, array(string => mixed))
	 */
	function pRedirect() {$s = $this->s(); return [
		// 2017-09-04
		// «The URL to which the payer will be redirected
		// when creation of Visa QIWI Wallet transaction is unsuccessful.
		// URL must be within merchant's site.»
		// «URL для переадресации в случае неуспеха при создании транзакции в Visa QIWI Wallet.
		// Ссылка должна вести на сайт провайдера.
		// Если пользователь выбрал на платежной форме способ оплаты,
		// отличный от оплаты с баланса Visa QIWI Wallet,
		// то переадресация на сайт провайдера не выполняется.»
		// Optional, string.
		'failUrl' => $this->customerReturnRemoteWithFailure()
		// 2017-09-04
		// «This parameter (if true) means that invoice page would be opened in "iframe".
		// The checkout page appears more compact
		// and can be embedded conveniently within the merchant’s site.
		// Default value is false.»
		// «Признак отображения страницы в iframe
		// (более компактный вид, удобный для встраивания ее в сайт провайдера).
		// По умолчанию false»
		// Optional, true/false.
		,'iframe' => false
		// 2017-09-04
		// «Accepts mobile, qw, card, wm, ssk.
		// Default payment method to show first for the client.
		// Allowed values:
		// 		card – a credit/debit card;
		// 		mobile – client’s cell phone account;
		// 		qw – Visa QIWI Wallet account;
		// 		ssk – payment by cash in a QIWI Terminal;
		// 		wm – linked WebMoney wallet.
		// When specified method is inaccessible for the Customer,
		// the page contains notice about it and the client can choose another method.»
		// «Способ оплаты по умолчанию,
		// который необходимо отобразить пользователю при открытии платежной формы.
		// Возможные значения:
		// 		card – оплата банковской картой;
		// 		mobile – оплата с баланса мобильного телефона;
		// 		qw – оплата с баланса Visa QIWI Wallet;
		// 		ssk – оплата наличными в терминале QIWI;
		// 		wm – оплата с привязанного кошелька WebMoney.
		// Если способ оплаты не доступен, пользователю отображается предупреждение,
		// при этом на странице можно выбрать другие способы оплаты.»
		// Optional, string.
		,'pay_source' => ''
		// 2017-09-04
		// «Merchant’s ID in Visa QIWI Wallet system,
		// corresponds to {prv_id} parameter used to create the bill.»
		// «Идентификатор провайдера.
		// Соответствует параметру {prv_id} из запроса на выставление счета.»
		// Required, string.
		,'shop' => $s->merchantID()
		// 2017-09-04
		// «The URL to which the payer will be redirected
		// in case of successful creation of Visa QIWI Wallet transaction.
		// URL must be within merchant's site»
		// «URL для переадресации в случае успешного создания транзакции в Visa QIWI Wallet.
		// Ссылка должна вести на сайт провайдера.
		// Если пользователь выбрал на платежной форме способ оплаты,
		// отличный от оплаты с баланса Visa QIWI Wallet,
		// то переадресация на сайт провайдера не выполняется.»
		// Optional, string.
		,'successUrl' => $this->customerReturnRemote()
		// 2017-09-04
		// «"iframe" or empty.
		// This parameter means that hyperlink specified in successUrl / failUrl parameter
		// opens in "iframe" page.»
		// «Флаг, показывающий, что ссылки в параметрах successUrl / failUrl открываются в iframe.
		// Если отсутствует, то считается выключенным.»
		// Optional, string.
		,'target' => ''
		// 2017-09-04
		// «Invoice ID generated by the merchant,
		// corresponds to `bill_id` parameter used to create the bill.»
		// «Идентификатор счета в информационной системе провайдера.
		// Соответствует параметру `bill_id` из запроса на выставление счета.».
		// Required, string.
		,'transaction' => $this->id()
	];}
}