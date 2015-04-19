<?php
/**
 * Created by PhpStorm.
 * User: israel
 * Date: 02/04/15
 * Time: 16:01
 */
namespace LivrariaAdmin\Controller;


use LivrariaAdmin\Controller\CRUDController;
class CategoriasController  extends CRUDController
{


    function __construct()
    {
        $this->form='LivrariaAdmin\Form\Categoria';
        $this->entity='Livraria\Entity\Categoria';
        $this->service='Livraria\Service\Categoria';
        $this->route='livraria-admin';
        $this->controller='categorias';

    }
}