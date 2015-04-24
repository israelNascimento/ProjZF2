<?php
/**
 * Created by PhpStorm.
 * User: israel
 * Date: 24/04/15
 * Time: 15:28
 */

namespace Livraria\Service;
use Doctrine\ORM\EntityManager;
use Livraria\Service\AbstractService;
use Livraria\Entity\Configurator;
class User extends AbstractService
{
    function __construct(EntityManager $em)
    {
        parent::__construct($em);
        $this->entity='Livraria\Entity\User';
    }

    public function update(array $data) {
        $entity = $this->em->getReference($this->entity, $data['id']);

        if (empty($data['password']))
            unset($data['password']);

        $entity = Configurator::configure($entity, $data);

        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }

}