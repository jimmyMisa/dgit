<?php

namespace Application\Model\Data;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\Feature\GlobalAdapterFeature;

class TableModel extends TableGateway
{

	protected $name;

	public function __construct( $adapter = null )
	{
		if($adapter == null){
			$adapter = GlobalAdapterFeature::getStaticAdapter();
		}
		parent::__construct($this->name,$adapter);
	}
    public function insert($data) {
        $resultSet = $this->tableGateway->insert($data);
        return $resultSet;
    }
}