<?php
/**
 * Created by PhpStorm.
 * User: israel
 * Date: 19/04/15
 * Time: 15:14
 */

namespace Livraria\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="livro")
 * @ORM\Entity(repositoryClass="Livraria\Entity\LivroRepository")
 */
class Livro
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
     * @ORM\ManyToOne(targetEntity="Livraria\Entity\Categoria", inversedBy="livro")
     * @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
     */
    protected $categoria;
    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $autor;
    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $isbn;
    /**
     * @ORM\Column(type="float")
     * @var float
     */
    protected $valor;

    function __construct($options=null)
    {
        Configurator::configure($this, $options);

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
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    /**
     * @return mixed
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * @param mixed $autor
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    /**
     * @return mixed
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param mixed $isbn
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    /**
     * @return float
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param float $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function toArray()
    {
        return array(

            'id'=>$this->getId(),
            'nome'=>$this->getNome(),
            'autor'=>$this->getAutor(),
            'isbn'=>$this->getIsbn(),
            'valor'=>$this->getValor(),
            'categoria'=>$this->getCategoria()->getId()

        );
    }


}