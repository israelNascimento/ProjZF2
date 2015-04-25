<?php
/**
 * Created by PhpStorm.
 * User: israel
 * Date: 25/04/15
 * Time: 09:25
 */

namespace LivrariaAdmin\Form;

use Zend\Form\Form;
class Login extends Form
{

    public function __construct($name = null) {
        parent::__construct('login');


        $this->setAttribute('method', 'post');
        //$this->setInputFilter(new LivroFilter);

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
                'value' => 'Logar',
                'class' => 'btn-success'
            )
        ));
    }

}