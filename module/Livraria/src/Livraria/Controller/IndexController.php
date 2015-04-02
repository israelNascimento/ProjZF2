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
        $em=$this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo=$em->getRepository('Livraria\Entity\Categoria');
        $categorias=$repo->findAll();
        return new ViewModel(array('categorias'=>$categorias));
    }

}