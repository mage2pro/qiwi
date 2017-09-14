<?php
namespace Dfe\Qiwi\W;
// 2017-09-14
final class Reader extends \Df\Payment\W\Reader {
	/**
	 * 2017-09-14
	 * @override
	 * @see \Df\Payment\W\Reader::http()
	 * @used-by \Df\Payment\W\Reader::__construct()
	 * @return array(string => mixed)
	 */
	protected function http() {return parent::http() + [
		self::K__SIGNATURE => df_request_header(self::K__SIGNATURE)
	];}

	/**
	 * 2017-09-14
	 * @used-by http()
	 * @used-by \Dfe\Qiwi\W\Event::k_signature()
	 */
	const K__SIGNATURE = 'X-Api-Signature';
}