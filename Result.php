<?php
namespace Dfe\Qiwi;
# 2017-09-12
/** @final Unable to use the PHP «final» keyword here because of the M2 code generation. */
class Result extends \Df\Framework\W\Result\Xml {
	/**
	 * 2021-12-03
	 * @override
	 * @see \Df\Framework\W\Result\Xml::contents()
	 * @used-by \Df\Framework\W\Result\Xml::__toString()
	 * @return array(string => mixed)
	 */
	protected function contents():array {return ['result_code' => $this->_code];}

	/**
	 * 2017-09-13, 2021-12-03
	 * QIWI Wallet requires it to be «text/xml», not «application/xml»:
	 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_notification_en.html.md#requirements-to-the-response-for-notification
	 * @override
	 * @see \Df\Framework\W\Result\Xml::contentType()
	 * @used-by \Df\Framework\W\Result\Xml::render()
	 */
	protected function contentType():string {return 'text/xml';}

	/**
	 * 2021-12-03
	 * @override
	 * @see \Df\Framework\W\Result\Xml::tag()
	 * @used-by \Df\Framework\W\Result\Xml::__toString()
	 */
	final protected function tag():string {return 'result';}

	/**
	 * 2017-09-13
	 * @used-by self::contents()
	 * @used-by self::i()
	 * @var int
	 */
	private $_code;

	/**
	 * 2017-09-13
	 * @used-by \Dfe\Qiwi\W\Responder::error()
	 * @used-by \Dfe\Qiwi\W\Responder::success()
	 * @param int $code
	 * @return self
	 */
	final static function i(int $code) {/** @var self $i */ $i = new self; $i->_code = $code; return $i;}
}