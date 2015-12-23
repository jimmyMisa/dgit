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
use Application\Model\Enterprise;

class EnterprisesController extends AbstractActionController
{
    public function indexAction()
    {
	
        $enterprise = $this->getServiceLocator()->get('Model\Enterprise');

        $data = $enterprise->getRecord();

        $view = new ViewModel(array(
                'data' => $data,
            ));

        //$view->setTermplate('index/index');

        return $view;
    }
    public function detailAction()
    {   
    	$id=$this->getEvent()->getRouteMatch()->getParam('id');
		
        $enterprise = $this->getServiceLocator()->get('Model\Enterprise');
        $data = $enterprise->getRecord($id);

        $view = new ViewModel(array(
                'data' => $data,
            ));
        return $view;
    }
    public function deleteAction()
    {   
    	$id=$this->getEvent()->getRouteMatch()->getParam('id');
		
        $enterprise = $this->getServiceLocator()->get('Model\Enterprise');
        $data = $enterprise->delete($id);

        $view = new ViewModel();
        return $view;
    }
    public function editAction()
    {   
    	$id=$this->getEvent()->getRouteMatch()->getParam('id');
		
        $enterprise = $this->getServiceLocator()->get('Model\Enterprise');
        $data = $enterprise->getRecord($id);

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
        $enterprise = $this->getServiceLocator()->get('Model\Enterprise');
		
		$updated = $enterprise->updateRecord($data);
		var_dump($data);
		
        $view = new ViewModel(array(
				'id' => $data['id'],
            ));

        //$view->setTermplate('index/index');

        return $view;
    }
}
