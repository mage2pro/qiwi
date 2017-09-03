<?php
namespace Dfe\Qiwi\API;
use Df\API\Operation as O;
use Df\Core\Exception as DFE;
// 2017-09-03
/** @method static Bill s() */
final class Bill extends \Df\API\Facade {
	/**
	 * 2017-09-03
	 * «4.2. Creating an Invoice», page 7.
	 * «4.2. Выставление счета пользователю», страница 7.
	 * `[QIWI Wallet] The REST API specification (v.2.12)`, https://mage2.pro/t/3745
	 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_pull-payments-api_en.html.md#request--put
	 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_pull-payments-api_ru.html.md#Запрос--put
	 * https://developer.qiwi.com/ru/pull-payments/index.html#invoice_rest
	 * @param string $id
	 * @param array(string => mixed) $a
	 * @return O
	 * @throws DFE
	 */
	function put($id, array $a) {return $this->p([$id, $a]);}
}