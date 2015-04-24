<?php
/**
 * Created by PhpStorm.
 * User: israel
 * Date: 01/04/15
 * Time: 22:40
 */

namespace Livraria\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="Categoria")
 * @ORM\Entity(repositoryClass="Livraria\Entity\CategoriaRepository")
 */
class Categoria
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $nome;

    /**
     * @ORM\OneToMany(targetEntity="Livraria\Entity\Livro", mappedBy="categoria")
     */
    protected $livros;



    function __construct($options=null)
    {
        Configurator::configure($this,$options);
        $this->livros=new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getNome();
    }

    /**
     * @return mixed
     */
    public function getLivros()
    {
        return $this->livros;
    }

    /**
     * @return array
     */
    public  function toArray()
    {
        return array(
            'id'=>$this->getId(),
            'nome'=>$this->getNome()
        );
    }




}