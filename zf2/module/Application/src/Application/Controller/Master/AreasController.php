<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller\Master;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\Area;

class AreasController extends AbstractActionController
{
    protected $crudTable;

    

    public function detailAction()
    {   
        $id = (isset($_GET['id']))?$_GET['id']:0;
        /*$id=$this->getEvent()->getRouteMatch()->getParam('id');
        
        $area = $this->getServiceLocator()->get('Model\Area');*/
        $area = new Area();
        $data = $area->getRecord($id);

        $view = new ViewModel(array(
                'data' => $data,
            )
        );
        return $view;
    }

    public function editAction(){
         $id = (isset($_GET['id']))?$_GET['id']:0;
        /*$id=$this->getEvent()->getRouteMatch()->getParam('id');
        
        $area = $this->getServiceLocator()->get('Model\Area');*/
        $area = new Area();
        $data = $area->getRecord($id);

        $view = new ViewModel(array(
                'data' => $data,
            )
        );
        return $view;
    }

    public function indexAction()
    {
        $area = $this->getServiceLocator()->get('Model\Area');

		if($data=$this->request->isPost()){
			$data=$this->request->getPost()->toArray();
			$data = $area->getRecordWhere($data);
			
		}
		else{
			$data = $area->getRecord();
		}

        $view = new ViewModel(array(
                'data' => $data,
            ));


        return $view;
    }

    public function updateAction(){
       $area = new Area();
        $request = $this->request->getPost()->toArray();
       if(isset($request['id'])) $id = $request['id'];
       else $id = 0;
       $result = $area->saveArea($request,$id);
		return new ViewModel(array(
			'id' => $id,
		));
        
    }


    
}