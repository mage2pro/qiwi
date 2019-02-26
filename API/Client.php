<?php
namespace Dfe\Qiwi\API;
use Dfe\Qiwi\Settings as S;
// 2017-09-03
final class Client extends \Df\API\Client {
	/**
	 * 2017-09-03
	 * [QIWI Wallet] An example of a response to
	 * «PUT https://api.qiwi.com/api/v2/prv/{prv_id}/bills/{bill_id}»
	 * https://mage2.pro/t/4447
	 * @override
	 * @see \Df\API\Client::_construct()
	 * @used-by \Df\API\Client::__construct()
	 */
	protected function _construct() {
		parent::_construct();
		$this->resJson();
		$this->addFilterResBV(function($v) {return $v['response'];});
	}

	/**
	 * 2017-09-03
	 * @override
	 * @see \Df\API\Client::headers()
	 * @used-by \Df\API\Client::__construct()
	 * @used-by \Df\API\Client::_p()
	 * @return array(string => string)
	 */
	protected function headers() {/** @var S $s */$s = $this->s(); return [
		/**
		 * 2017-09-03
		 * «Authentication data are transmitted using the standard rules of basic-authorization for HTTP-requests.
		 * The HTTP header "Authorization" is added to the request.
		 * The value of this parameter is composed of the word "Basic",
		 * blank character and encrypted BASE64 pair "API ID:API password"».
		 * «Авторизационные данные передаются по стандартным правилам basic-аутентификации при запросах по HTTP.
		 * К запросу добавляется HTTP-заголовок с параметром "Authorization".
		 * В заголовке указывается строка "Basic " (с пробелом на конце)
		 * и пара "API_ID:API_password", закодированная в BASE64.»
		 * `[QIWI Wallet] The REST API specification (v.2.12)`, page 7: https://mage2.pro/t/3745
		 * https://en.wikipedia.org/wiki/Basic_access_authentication
		 */
		'Authorization' => 'Basic ' . base64_encode("{$s->apiID()}:{$s->password1()}")
		/**
		 * 2017-09-03
		 * «Requests from the merchants to QIWI
		 * are sent in the format of the HTTP-request parameters encoded by UTF-8.
		 * In response, the data is returned in one of two formats
		 * in accordance with the value of the "Accept" HTTP header, which is transmitted in the request:
		 * 		 XML (value of the "Accept" header: "application/xml", "text/xml");
		 * 		 JSON (value of the "Accept" header: "application/json", "text/json").»
		 * «Данные при запросах на сервер Visa QIWI Wallet
		 * передаются в формате параметров HTTP-запроса в кодировке UTF-8.
		 * В ответ данные возвращаются в одном из двух форматов
		 * в соответствии со значением HTTP-заголовка "Accept", передаваемого в запросе:
		 * 		 XML (значения заголовка "Accept": "application/xml", "text/xml");
		 * 		 JSON (значения заголовка "Accept": "application/json", "text/json").»
		 */
		,'Accept' => 'application/json'
	];}

	/**
	 * 2017-09-03
	 * @override
	 * @see \Df\API\Client::responseValidatorC()
	 * @used-by \Df\API\Client::p()
	 * @return string
	 */
	protected function responseValidatorC() {return \Dfe\Qiwi\API\Validator::class;}

	/**
	 * 2017-09-03
	 * @override
	 * @see \Df\API\Client::urlBase()
	 * @used-by \Df\API\Client::__construct()
	 * @used-by \Df\API\Client::url()
	 * @return string
	 */
	protected function urlBase() {return "https://api.qiwi.com/api/v2/prv/{$this->s()->merchantID()}";}

	/**
	 * 2017-09-03
	 * @used-by headers()
	 * @used-by urlBase()
	 * @return S
	 */
	private function s() {return dfps($this);}
}