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

        $data = $branch->getRecord();

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
		
		$posted=$this->request->getPost()->toArray();
		
        $branch = $this->getServiceLocator()->get('Model\Branch');
		
		$toInsert=array();
		
        $datas = $branch->getRecord($id);
		foreach($datas as $data){
			$data['branch_cd']=$posted['branch_cd'];
			$data['branch_name']=$posted['branch_name'];
			$data['branch_postcode']=$posted['branch_postcode'];
			$data['branch_add1']=$posted['branch_add1'];
			$data['branch_add2']=$posted['branch_add2'];
			$data['branch_tel']=$posted['branch_tel'];
			$data['branch_fax']=$posted['branch_fax'];
		}
		foreach($data as $key=>$row){
			$toInsert[$key]=$row;
		}
		$data = $branch->updateRecord($toInsert);
		
        $view = new ViewModel(array(
				'id' => $toInsert['id'],
            ));

        //$view->setTermplate('index/index');

        return $view;
    }
}
