<?php
/**
 * Created by PhpStorm.
 * User: israel
 * Date: 19/04/15
 * Time: 18:29
 */

namespace LivrariaAdmin\Form;

use Zend\InputFilter\InputFilter;
class LivroFilter  extends InputFilter
{
    function __construct()
    {
        $this->add(array(

            'name'=>'nome',
            'require'=>true,
            'filter'=>array(
                    array('name'=>'StripTags'),
                    array('name'=>'StringTrim'),
                    array()
    ),
            'validator'=>array(
                    array('name' => 'NotEmpty',
                        'options'=>array(
                            'messages' => array('isEmpty'=>'Nome não pode estar em branco'),
                        )),


    )


        ));


        $this->add(array(

            'name'=>'autor',
            'require'=>true,
            'filter'=>array(
                array('name'=>'StripTags'),
                array('name'=>'StringTrim'),
                array()
            ),
            'validator'=>array(
                array('name' => 'NotEmpty',
                    'options'=>array(
                        'messages' => array('isEmpty'=>'Nome não pode estar em branco'),
                    )),


            )


        ));

        $this->add(array(

            'name'=>'isbn',
            'require'=>true,
            'filter'=>array(
                array('name'=>'StripTags'),
                array('name'=>'StringTrim'),
                array()
            ),
            'validator'=>array(
                array('name' => 'NotEmpty',
                    'options'=>array(
                        'messages' => array('isEmpty'=>'Nome não pode estar em branco'),
                    )),


            )


        ));

        $this->add(array(

            'name'=>'valor',
            'require'=>true,
            'filter'=>array(
                array('name'=>'StripTags'),
                array('name'=>'StringTrim'),
                array()
            ),
            'validator'=>array(
                array('name' => 'NotEmpty',
                    'options'=>array(
                        'messages' => array('isEmpty'=>'Nome não pode estar em branco'),
                    )),


            )


        ));
    }


}