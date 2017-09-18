<?php
namespace Dfe\Qiwi;
// 2017-09-04
final class Method extends \Df\Payment\Method {
	/**
	 * 2017-09-04
	 * 1) The GitHub-based documentation:
	 * «The rounding up method depends on the invoice currency» / «Способ округления зависит от валюты».
	 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_pull-payments-api_en.html.md#request--put
	 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_pull-payments-api_ru.html.md#Запрос--put
	 * 2) The PDF documentation:
	 * «A positive number rounded up to 2 or 3 decimal places after the comma.»
	 * «Положительное число, округленное до 2 или 3 знаков после десятичной точки.»
	 * Format: number(6.3). Regex: ^\d+(.\d{0,3})?$
	 * «4.2. Creating an Invoice», page 7.
	 * «4.2. Выставление счета пользователю», страница 7.
	 * `[QIWI Wallet] The REST API specification (v.2.12)`, https://mage2.pro/t/3745
	 * [QIWI Wallet] What are the rounding rules for each supported currency? https://mage2.pro/t/4454
	 * @override
	 * @see \Df\Payment\Method::amountFormat()
	 * @used-by \Df\Payment\Operation::amountFormat()
	 * @param float|int $a
	 * @return string
	 */
	function amountFormat($a) {return df_f2($a);}

	/**
	 * 2017-09-05
	 * @used-by \Dfe\Qiwi\Charge::pBill()
	 * @return string|null
	 */
	function phone() {return $this->iia(self::$II_PHONE);}
	
	/**
	 * 2017-09-18
	 * `[QIWI Wallet] What are the minimum and maximum payment amount limitations
	 * for each payment option and currency?` https://mage2.pro/t/4526
	 * @override
	 * @see \Df\Payment\Method::amountLimits()
	 * @used-by \Df\Payment\Method::isAvailable()
	 * @return null
	 */
	protected function amountLimits() {return null;}

	/**
	 * 2017-09-05
	 * @override
	 * @see \Df\Payment\Method::iiaKeys()
	 * @used-by \Df\Payment\Method::assignData()
	 * @return string[]
	 */
	protected function iiaKeys() {return [self::$II_PHONE];}

	/**
	 * 2017-09-05
	 * @used-by iiaKeys()
	 * @used-by phone()
	 */
	private static $II_PHONE = 'phone';
}