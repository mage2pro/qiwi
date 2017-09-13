<?php
namespace Dfe\Qiwi;
use Magento\Framework\App\Response\Http;
use Magento\Framework\App\Response\HttpInterface as IHttp;
// 2017-09-12
/** @final Unable to use the PHP «final» keyword here because of the M2 code generation. */
class Response extends \Df\Framework\Controller\Response {
	/**
	 * 2017-09-13
	 * @override
	 * @see \Df\Framework\Controller\Response::__toString()
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
	 * @see \Magento\Framework\Controller\AbstractResult::render()
	 * https://github.com/magento/magento2/blob/2.1.0/lib/internal/Magento/Framework/Controller/AbstractResult.php#L109-L113
	 * @param IHttp|Http $res
	 * @return $this
	 */
	final protected function render(IHttp $res) {
		$res->setBody($this->__toString());
		df_response_content_type('text/xml', $res);
		return $this;
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