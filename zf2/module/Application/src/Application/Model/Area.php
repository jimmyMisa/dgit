<?php
namespace Application\Model;

use Application\Model\Data\MstArea;
use Zend\Db\TableGateway\Feature\GlobalAdapterFeature;

use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;


class Area
{
    public function __construct($data = null){
        $this->area = $data['area'];
    }
    
    public function getRecord($id = null)
    {
        $result = null;

        $adapter = GlobalAdapterFeature::getStaticAdapter();
        $connection = $adapter->getDriver()->getConnection();

        $department = new MstArea();

        $connection->beginTransaction();
        try {
            $result = $department->getRecord($id);
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
           $result = $this->area->select(function (Select $select) {
				 set($select);
			});
			
			
            $connection->commit();
        } catch (\Exception $e) {
            $connection->rollback();
        }

        return $result;
    }

    public function saveArea($data,$id)
     {
         $area = new MstArea();
         if ($id == 0) {
             $area->insert($data);
         } 
         else {
             if ($area->getRecord($id)) {
                 $area->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Area id does not exist');
             }
         }
     }
}