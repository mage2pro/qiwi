<?php
namespace Dfe\Qiwi\W;
use Df\Payment\W\Strategy\ConfirmPending;
use \Df\Payment\W\Strategy\Refund;
# 2017-09-14
/** @method Event e() */
final class Handler extends \Df\Payment\W\Handler implements \Df\Payment\W\IRefund {
	/**
	 * 2017-09-14 В валюте заказа (платежа), в формате платёжной системы (копейках).
	 * @override
	 * @see \Df\Payment\W\IRefund::amount()
	 * @used-by \Df\Payment\W\Strategy\Refund::_handle()
	 * @return int
	 */
	function amount() {return $this->e()->r('amount');}

	/**
	 * 2017-09-14
	 * Метод должен вернуть идентификатор операции (не платежа!) в платёжной системе.
	 * Он нужен нам для избежания обработки оповещений о возвратах, инициированных нами же
	 * из административной части Magento: @see \Df\StripeClone\Method::_refund()
	 * Это должен быть тот же самый идентификатор,
	 * который возвращает @see \Dfe\Stripe\Facade\Refund::transId()
	 * @override
	 * @see \Df\Payment\W\IRefund::eTransId()
	 * @used-by \Df\Payment\W\Strategy\Refund::_handle()
	 * @return string
	 */
	function eTransId() {return $this->e()->pid();}

	/**
	 * 2017-09-14
	 * «Operation Statuses»:
	 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_statuses_en.html.md#operation-statuses
	 * «Статусы операций»:
	 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_statuses_ru.html.md#Статусы-операций
	 * @override
	 * @see \Df\Payment\W\Handler::strategyC()
	 * @used-by \Df\Payment\W\Handler::handle()
	 * @return string|null
	 */
	protected function strategyC() {return
		Event::T_REFUND === $this->e()->ttCurrent() ? Refund::class : ConfirmPending::class
	;}
}