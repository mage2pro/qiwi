<?php
namespace Dfe\Qiwi\API;
use Df\API\Operation as O;
use Df\Core\Exception as DFE;
// 2017-09-03
/** @method static Bill s() */
final class Bill extends \Df\API\Facade {
	/**
	 * 2017-09-03
	 * @param string $id
	 * @param array(string => mixed) $a
	 * @return O
	 * @throws DFE
	 */
	function put($id, array $a) {return $this->p([$id, $a]);}
}