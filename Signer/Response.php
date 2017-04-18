<?php
namespace Dfe\Qiwi\Signer;
// 2017-04-18
final class Response extends \Dfe\Qiwi\Signer {
	/**
	 * 2017-04-18
	 * @override
	 * @see \Dfe\Qiwi\Signer::values()
	 * @used-by \Dfe\Qiwi\Signer::sign()
	 * @return string[]
	 */
	protected function values() {return dfa_select_ordered($this->v(), []);}
}