<?php
/**
 * Created by PhpStorm.
 * User: israel
 * Date: 01/04/15
 * Time: 21:52
 */

namespace Livraria\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel(array());
    }

}