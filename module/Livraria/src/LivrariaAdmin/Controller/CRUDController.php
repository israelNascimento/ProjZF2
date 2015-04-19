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

class CRUDController  extends AbstractActionController
{
    protected $em;
    protected $form;
    protected $entity;
    protected $service;
    protected $route;
    protected $controller;

    public function indexAction()
    {
        $page=$this->params()->fromRoute('page');
        $list=$this->getEm()->getRepository($this->entity)
            ->findAll();

        $paginator=new Paginator(new ArrayAdapter($list));
        $paginator->setCurrentPageNumber($page);
        $paginator->setDefaultItemCountPerPage(10);

        return new ViewModel(array('data'=>$paginator, 'page'=>$page ));
    }

    public function  newAction()
    {
        $form= new $this->form();
        $request=$this->getRequest();

        if($request->isPost())
        {
            $form->setData($request->getPost());
            $service=$this->getServiceLocator()->get($this->service);
            $service->insert($request->getPost()->toArray());
            return $this->redirect()->toRoute($this->route,array('controller'=>$this->controller));
        }
        return new ViewModel(array('form'=>$form));
    }

    public function editAction()
    {
        $form=new $this->form();
        $request=$this->getRequest();

        $repository=$this->getEm()->getRepository($this->entity);
        $entity=$repository->find($this->params()->fromRoute('id',0));

        if($this->params()->fromRoute('id'))
            $form->setData($entity->toArray());

        if($request->isPost())
        {
            $form->setData($request->getPost()->toArray());
            if($form->isValid())
            {
                $service=$this->getServiceLocator()->get($this->service);
                $service->update($request->getPost()->toArray());
                return $this->redirect()->toRoute($this->route,array('controller'=>$this->controller));

            }
        }
        return new ViewModel(array('form'=>$form));
    }

    public function deleteAction()
    {
        $service=$this->getServiceLocator()->get($this->service);
        if($service->delete($this->params()->fromRoute('id',0)))
            return $this->redirect()->toRoute($this->route,array('controller'=>$this->controller));

    }

    protected function getEm()
    {
        if(null===$this->em)
            $this->em=$this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        return $this->em;


    }
}