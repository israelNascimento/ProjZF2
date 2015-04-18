<?php
/**
 * Created by PhpStorm.
 * User: israel
 * Date: 13/04/15
 * Time: 09:13
 */

namespace Livraria\Service;

use Doctrine\ORM\EntityManager;
use Livraria\Entity\Categoria as CategoriaService;
use Livraria\Entity\Configurator;

class Categoria
{
    protected $em;

    /**
     * @param EntityManager $em
     */
    function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function insert(array $data)
    {
        $entity=new CategoriaService($data);

        $this->em->persist($entity);
        $this->em->flush();

        return $entity;

    }

    public function update(array $data)
    {
        $entity=$this->em->getReference('Livraria\Entity\Categoria',$data['id']);
        $entity=Configurator::configure($entity,$data);
        $this->em->persist($entity);
        $this->em->flush();

        return $entity;


    }

    public function delete($id)
    {
        $entity=$this->em->getReference('Livraria\Entity\Categoria', $id);
       if($entity)
       {
           $this->em->remove($entity);
           $this->em->flush();
           return $id;
       }
    }

}