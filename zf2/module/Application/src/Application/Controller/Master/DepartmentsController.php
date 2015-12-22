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
use Application\Model\Department;

class DepartmentsController extends AbstractActionController
{
    public function indexAction()
    {
	
        $department = $this->getServiceLocator()->get('Model\Department');

        $data = $department->getRecord();

        $view = new ViewModel(array(
                'data' => $data,
            ));

        //$view->setTermplate('index/index');

        return $view;
    }
    public function detailAction()
    {   
    	$id=$this->getEvent()->getRouteMatch()->getParam('id');
		
        $department = $this->getServiceLocator()->get('Model\Department');

        $data = $department->getRecord($id);

        $view = new ViewModel(array(
                'data' => $data,
            ));
        return $view;
    }
    public function updateAction()
    {
    	$id=$this->getEvent()->getRouteMatch()->getParam('id');
		
		$posted=$this->request->getPost();
		
		
		
		
        //$data = $department->updateRecord($queryied);
		
        $view = new ViewModel(array(
                'data' => $data,
            ));

        //$view->setTermplate('index/index');

        return $view;
    }
}
