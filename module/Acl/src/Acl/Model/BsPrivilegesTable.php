<?php 
namespace Acl\Model;

use Zend\Db\TableGateway\TableGateway;
use Base\Model\AbstractTable;

/**
* BsPrivilegesTable
*/
class BsPrivilegesTable extends AbstractTable
{
	
	function __construct(TableGateway $tableGateway)
		{
			$this->tableGateway=$tableGateway;
		}
}