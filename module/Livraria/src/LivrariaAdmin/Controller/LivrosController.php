<?php
/**
 * Created by PhpStorm.
 * User: israel
 * Date: 19/04/15
 * Time: 19:01
 */

namespace LivrariaAdmin\Controller;
use LivrariaAdmin\Controller\CRUDController;
use Zend\View\Model\ViewModel;
class LivrosController extends CRUDController
{


    function __construct()
    {
        $this->form='LivrariaAdmin\Form\Livro';
        $this->entity='Livraria\Entity\Livro';
        $this->service='Livraria\Service\Livro';
        $this->route='livraria-admin';
        $this->controller='livros';

    }

    public function  newAction()
    {
        $form=$this->getServiceLocator()->get($this->form);
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
        $form=$this->getServiceLocator()->get($this->form);
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

}