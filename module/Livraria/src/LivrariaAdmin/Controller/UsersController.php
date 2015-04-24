<?php
/**
 * Created by PhpStorm.
 * User: israel
 * Date: 24/04/15
 * Time: 15:36
 */

namespace LivrariaAdmin\Controller;

use Zend\View\Model\ViewModel;
use LivrariaAdmin\Controller\CRUDController;
class UsersController extends CRUDController
{
    function __construct()
    {
        $this->form='LivrariaAdmin\Form\User';
        $this->entity='Livraria\Entity\User';
        $this->service='Livraria\Service\User';
        $this->route='livraria-admin';
        $this->controller='users';

    }

    public function editAction() {
        $form = new $this->form();
        $request = $this->getRequest();

        $repository = $this->getEm()->getRepository($this->entity);
        $entity = $repository->find($this->params()->fromRoute('id', 0));

        if ($this->params()->fromRoute('id', 0)) {
            $array = $entity->toArray();
            unset($array['password']);
            $form->setData($array);
        }
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $service = $this->getServiceLocator()->get($this->service);
                $service->update($request->getPost()->toArray());
                return $this->redirect()->toRoute($this->route,array('controller'=>$this->controller));
            }
        }
        return new ViewModel(array('form' => $form));
    }


}