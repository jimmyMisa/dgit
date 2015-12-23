<?php
namespace Application\Model;

use Application\Model\Data\MstBranch;
use Zend\Db\TableGateway\Feature\GlobalAdapterFeature;


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
    
}
