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
    public function updateAction()
    {
		$posted=$this->request->getPost();
		
        $view = new ViewModel(array(
                'data' => $posted,
            ));

        //$view->setTermplate('index/index');

        return $view;
    }
}
