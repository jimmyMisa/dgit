<?php
namespace Application\Model;

use Application\Model\Data\MstPost;
use Zend\Db\TableGateway\Feature\GlobalAdapterFeature;


class Department
{
    protected $department = null;

    public function __construct($data = null){
        $this->department = $data['department'];
    }


    public function add($data)
    {

    }

    public function getRecord($id = null)
    {
        $result = null;

        $adapter = GlobalAdapterFeature::getStaticAdapter();
        $connection = $adapter->getDriver()->getConnection();

        $connection->beginTransaction();
        try {
            $result = $this->department->getRecord($id);
            $connection->commit();
        } catch (\Exception $e) {
            $connection->rollback();
        }

        return $result;
    }
    
}