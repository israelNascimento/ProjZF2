<?php
/**
 * Created by PhpStorm.
 * User: israel
 * Date: 24/04/15
 * Time: 15:54
 */

namespace LivrariaAdmin\Form;

use Zend\Form\Form;
class User extends Form{


    public function __construct($name = null) {
        parent::__construct('user');


        $this->setAttribute('method', 'post');
        //$this->setInputFilter(new LivroFilter);

        $this->add(array(
            'name' => 'id',
            'attibutes' => array(
                'type' => 'hidden'
            )
        ));

        $this->add(array(
            'name' => 'nome',
            'options' => array(
                'type' => 'text',
                'label' => 'Nome'
            ),
            'attributes' => array(
                'id' => 'nome',
                'placeholder' => 'Entre com o nome'
            )
        ));


        $this->add(array(
            'name' => 'email',
            'options' => array(
                'type' => 'email',
                'label' => 'Email'
            ),
            'attributes' => array(
                'id' => 'email',
                'placeholder' => 'Entre com seu Email'
            ),
        ));

        $this->add(array(
            'name' => 'password',
            'options' => array(
                'type' => 'password',
                'label' => 'Senha'
            ),
            'attributes' => array(
                'id' => 'isbn',
                'placeholder' => 'Entre com a senha',
                'type' =>'password'
            ),
        ));



        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Salvar',
                'class' => 'btn-success'
            )
        ));
    }
}