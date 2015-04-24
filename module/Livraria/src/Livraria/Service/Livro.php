<?php
/**
 * Created by PhpStorm.
 * User: israel
 * Date: 19/04/15
 * Time: 16:59
 */

namespace Livraria\Service;

use Livraria\Entity\Configurator;
use Livraria\Service\AbstractService;
use Doctrine\ORM\EntityManager;

class Livro extends AbstractService
{


    function __construct( EntityManager $em)
    {
        parent::__construct($em);
        $this->entity='Livraria\Entity\Livro';

    }



    public function insert(array $data)
    {
        $entity=new $this->entity($data);
        $categoria=$this->em->getReference('Livraria\Entity\Categoria',$data['categoria']);


        $entity->setCategoria($categoria);


        $this->em->persist($entity);
        $this->em->flush();
        return $entity;

    }

    public function update(array $data)
    {

        $entity=$this->em->getReference($this->entity, $data['id']);
        $entity=Configurator::configure($entity, $data);
        $categoria=$this->em->getReference('Livraria\Entity\Categoria',$data['categoria']);
        $entity->setCategoria($categoria);

        $this->em->persist($entity);
        $this->em->flush();

        return $entity;


    }


}