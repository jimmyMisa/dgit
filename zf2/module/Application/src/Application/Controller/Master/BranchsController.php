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
use Application\Model\Branch;

class BranchsController extends AbstractActionController
{
    public function indexAction()
    {
	
        $branch = $this->getServiceLocator()->get('Model\Branch');

		if($data=$this->request->isPost()){
			$data=$this->request->getPost()->toArray();
			$data = $branch->getRecordWhere($data);
			
		}
		else{
			$data = $branch->getRecord();
		}

        $view = new ViewModel(array(
                'data' => $data,
            ));

        //$view->setTermplate('index/index');

        return $view;
    }
    public function detailAction()
    {   
    	$id=$this->getEvent()->getRouteMatch()->getParam('id');
		
        $branch = $this->getServiceLocator()->get('Model\Branch');
        $data = $branch->getRecord($id);

        $view = new ViewModel(array(
                'data' => $data,
            ));
        return $view;
    }
    public function editAction()
    {   
    	$id=$this->getEvent()->getRouteMatch()->getParam('id');
		
        $branch = $this->getServiceLocator()->get('Model\Branch');
        $data = $branch->getRecord($id);

        $view = new ViewModel(array(
                'data' => $data,
            ));
        return $view;
    }
    public function updateAction()
    {
    	$id=$this->getEvent()->getRouteMatch()->getParam('id');
		$data=null;
		
		$data=$this->request->getPost()->toArray();
		$data['id']=$id;
        $branch = $this->getServiceLocator()->get('Model\Branch');
		
		$updated = $branch->updateRecord($data);
		
        $view = new ViewModel(array(
				'id' => $data['id'],
            ));

        //$view->setTermplate('index/index');

        return $view;
    }
}
