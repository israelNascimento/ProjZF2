<?php
/**
 * Created by PhpStorm.
 * User: israel
 * Date: 03/04/15
 * Time: 20:55
 */

namespace LivrariaAdmin\Form;

use Zend\Form\Form;

class Categoria extends Form
{
    public function __construct($name = null)
    {
        parent::__construct($name);

        $this->setAttribute('method','post');
      $this->setInputFilter(new CategoriaFilter());
        $this->add(array(
            'name'=>'id',
            'options'=>array('type'=>'hidden'),
            'attributes'=>array()
        ));

        $this->add(array(
           'name'=>'nome',
            'options'=>array('type'=>'text', 'label'=>'Nome'),
            'attributes'=>array('id'=>'nome', 'placeholder'=>'Entre com nome')
        ));

        $this->add(array(
           'name'=>'submit',
            'type'=>'Zend\Form\Element\Submit',
            'attributes'=>array('value'=>'Salvar', 'class'=>'btn-success')
        ));
    }


}