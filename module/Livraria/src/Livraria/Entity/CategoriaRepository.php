<?php
/**
 * Created by PhpStorm.
 * User: israel
 * Date: 01/04/15
 * Time: 22:55
 */

namespace Livraria\Entity;

use Doctrine\ORM\EntityRepository;
class CategoriaRepository extends EntityRepository
{

    public function fetchPairs()
    {
        $categorias=$this->findAll();

        $array=array();

        foreach($categorias as $categoria)
        {
            $array[$categoria->getId()]=$categoria->getNome();
        }

        return $array;
    }
}