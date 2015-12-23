<?php
namespace Application\Model;

use Application\Model\Data\MstComGrd;
use Zend\Db\TableGateway\Feature\GlobalAdapterFeature;


class Entreprise
{
    protected $entreprise = null;

    public function __construct($data = null){
        $this->entreprise = $data['entreprise'];
    }


    public function add($data)
    {
		$connection = $adapter->getDriver()->getConnection();
		if($data['id']){
			$result = null;

			$adapter = GlobalAdapterFeature::getStaticAdapter();

			$connection->beginTransaction();
			try {
				$result = $this->entreprise->getRecord($id);
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
            $result = $this->entreprise->update($data,array("id"=>$data['id']));
            $connection->commit();
        } catch (\Exception $e) {
            $connection->rollback();
        }

        return $result;
		
		
		
	}
	public function delete($id)
	{
        $result = null;

        $adapter = GlobalAdapterFeature::getStaticAdapter();
        $connection = $adapter->getDriver()->getConnection();

        $connection->beginTransaction();
        try {
            $result = $this->entreprise->delete(array("id"=>$id));
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
            $result = $this->entreprise->getRecord($id);
            $connection->commit();
        } catch (\Exception $e) {
            $connection->rollback();
        }

        return $result;
    }
    
}
