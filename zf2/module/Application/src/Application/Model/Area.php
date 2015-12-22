<?php
namespace Application\Model;

use Application\Model\Data\MstArea;
use Zend\Db\TableGateway\Feature\GlobalAdapterFeature;


class Area
{
    
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