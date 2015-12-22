<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use My\Foo;
use My\Hoge\Vartest;

class TestController extends AbstractActionController
{
    public function indexAction()
    {
    	$foo = new Foo();
    	$var = new Vartest();
    	$msgFoo = $foo->say();
    	$msgVar = $var->say();
        return new ViewModel(array(
        		'msgFoo' => $msgFoo,
        		'msgVar' => $msgVar,
        	));
    }
}
