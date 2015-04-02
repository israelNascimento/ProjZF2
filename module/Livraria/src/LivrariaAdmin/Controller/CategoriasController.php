<?php
/**
 * Created by PhpStorm.
 * User: israel
 * Date: 02/04/15
 * Time: 16:01
 */
namespace LivrariaAdmin\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;
class CategoriasController  extends AbstractActionController
{
    protected $em;

    public function indexAction()
    {
        $page=$this->params()->fromRoute('page');
        $list=$this->getEm()->getRepository('Livraria\Entity\Categoria')
                   ->findAll();

        $paginator=new Paginator(new ArrayAdapter($list));
        $paginator->setCurrentPageNumber($page);
        $paginator->setDefaultItemCountPerPage(1);

        return new ViewModel(array('data'=>$paginator, 'page'=>$page ));
    }

    protected function getEm()
    {
        if(null===$this->em)
        $this->em=$this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        return $this->em;

    }
}