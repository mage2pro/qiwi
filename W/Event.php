<?php
namespace Dfe\Qiwi\W;
use Magento\Sales\Model\Order\Payment\Transaction as T;
/**
 * 2017-09-03
 */
final class Event extends \Df\PaypalClone\W\Event {
	/**
	 * 2017-09-03
	 * @override
	 * @see \Df\PaypalClone\W\Event::k_idE()
	 * @used-by \Df\PaypalClone\W\Event::idE()
	 * @return string
	 */
	protected function k_idE() {return '';}

	/**
	 * 2017-09-03
	 * @override
	 * @see \Df\Payment\W\Event::k_pid()
	 * @used-by \Df\Payment\W\Event::pid()
	 * @return string
	 */
	protected function k_pid() {return '';}

	/**
	 * 2017-09-03
	 * @override
	 * @see \Df\PaypalClone\W\Event::k_signature()
	 * @used-by \Df\PaypalClone\W\Event::signatureProvided()
	 * @return string
	 */
	protected function k_signature() {return '';}

	/**
	 * 2017-09-03
	 * @override
	 * @see \Df\PaypalClone\W\Event::k_status()
	 * @used-by \Df\PaypalClone\W\Event::status()
	 * @return string
	 */
	protected function k_status() {return '';}
}