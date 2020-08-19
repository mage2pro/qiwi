<?php
namespace Dfe\Qiwi;
use Magento\Framework\App\Response\Http as HttpResponse;
use Magento\Framework\App\Response\HttpInterface as IHttpResponse;
# 2017-09-12
/** @final Unable to use the PHP «final» keyword here because of the M2 code generation. */
class Result extends \Df\Framework\W\Result {
	/**
	 * 2017-09-13
	 * 2017-11-17
	 * We can use the PHP «final» keyword here,
	 * because the method is absent in @see \Magento\Framework\Controller\ResultInterface
	 * @override
	 * @see \Df\Framework\W\Result::__toString()
	 * @used-by render()
	 * @used-by \Df\Payment\W\Action::execute()
	 * @return string
	 */
	final function __toString() {return df_xml_g('result', ['result_code' => $this->_code]);}

	/**
	 * 2017-09-13
	 * QIWI Wallet requires it to be «text/xml», not «application/xml»:
	 * https://github.com/QIWI-API/pull-payments-docs/blob/40d48cf0/_notification_en.html.md#requirements-to-the-response-for-notification
	 * @override
	 * @see \Df\Framework\W\Result::render()
	 * @used-by \Df\Framework\W\Result::renderResult()
	 * @param IHttpResponse|HttpResponse $r
	 */
	final protected function render(IHttpResponse $r) {
		$r->setBody($this->__toString());
		df_response_content_type('text/xml', $r);
	}

	/**
	 * 2017-09-13
	 * @used-by __toString()
	 * @used-by i()
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
	final static function i($code) {/** @var self $i */ $i = new self; $i->_code = $code; return $i;}
}