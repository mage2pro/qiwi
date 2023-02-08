<?php
namespace Dfe\Qiwi\API;
use Df\API\Operation as O;
use Df\Core\Exception as DFE;
use Zend_Http_Client as Z;
# 2017-09-03
/** @method static Bill s() */
final class Bill extends \Df\API\Facade {
	/**
	 * 2017-09-03
	 * «4.6. Refunds», page 13.
	 * «4.6. Возврат средств по оплаченному счету», страница 13.
	 * `[QIWI Wallet] The REST API specification (v.2.12)`, https://mage2.pro/t/3745
	 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_pull-payments-api_en.html.md#refunds
	 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_pull-payments-api_ru.html.md#Возврат-оплаченного-счета-refund
	 * https://developer.qiwi.com/ru/pull-payments/index.html#refund
	 * @throws DFE
	 */
	function refund(string $id, string $refundId):O {return $this->p($id, Z::PUT, "refund/$refundId");}
}