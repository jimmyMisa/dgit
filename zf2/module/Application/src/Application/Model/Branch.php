<?php
namespace Application\Model;

use Application\Model\Data\MstBranch;
use Zend\Db\TableGateway\Feature\GlobalAdapterFeature;

use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;


class Branch
{
    protected $branch = null;

    public function __construct($data = null){
        $this->branch = $data['branch'];
    }


    public function add($data)
    {
		$connection = $adapter->getDriver()->getConnection();
		if($data['id']){
			$result = null;

			$adapter = GlobalAdapterFeature::getStaticAdapter();

			$connection->beginTransaction();
			try {
				$result = $this->branch->getRecord($id);
				$connection->commit();
			} catch (\Exception $e) {
				$connection->rollback();
			}

			return $result;
		}
		else $connection->rollback();
    }
	
	public function updateRecord($data)
	{
        $result = null;

        $adapter = GlobalAdapterFeature::getStaticAdapter();
        $connection = $adapter->getDriver()->getConnection();

        $connection->beginTransaction();
        try {
            $result = $this->branch->update($data,array("id"=>$data['id']));
            $connection->commit();
        } catch (\Exception $e) {
            $connection->rollback();
        }

        return $result;
		
		
		
	}

    public function getRecord($id = null)
    {
        $result = null;

        $adapter = GlobalAdapterFeature::getStaticAdapter();
        $connection = $adapter->getDriver()->getConnection();

        $connection->beginTransaction();
        try {
            $result = $this->branch->getRecord($id);
            $connection->commit();
        } catch (\Exception $e) {
            $connection->rollback();
        }

        return $result;
    }
    public function getRecordWhere($data)
    {
        $result = null;

        $adapter = GlobalAdapterFeature::getStaticAdapter();
        $connection = $adapter->getDriver()->getConnection($data);

        $connection->beginTransaction();
        try {
			function add($datas){
				global $data;
				 $data=$datas;
			}
			add($data);
			function set(Select $select){
				global $data;
				foreach($data as $key=>$value){
					$select->where->like($key, "%$value%");
				}
			}
           $result = $this->branch->select(function (Select $select) {
				 set($select);
			});
			
			
            $connection->commit();
        } catch (\Exception $e) {
            $connection->rollback();
        }

        return $result;
    }
    
}
