<?php
/**
 * Created by PhpStorm.
 * User: israel
 * Date: 24/04/15
 * Time: 15:02
 */

namespace Livraria\Entity;

use Doctrine\ORM\Mapping as ORM;
use Livraria\Entity\Configurator;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Livraria\Entity\UserRepository")
 */
class User {

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
     * @ORM\Column(type="text")
     * @var string
     */
    protected $email;
    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $password;


    protected $salt;

    function __construct($options=null)
    {
        $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
        Configurator::configure($this,$options);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
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
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $hashSenha=$this->encryptPassword($password);

        $this->password = $hashSenha;
        return $this;
    }




    public function toArray()
    {
        return array(
            'id'=>$this->getId(),
            'nome'=>$this->getNome(),
            'email'=>$this->getEmail(),
            'password'=>$this->getPassword(),
            //'salt'=>$this->$salt
        );
    }

    public function encryptPassword($password) {
        $hashSenha = hash('sha512', $password . $this->salt);
        for ($i = 0; $i < 64000; $i++)
            $hashSenha = hash('sha512', $hashSenha);

        return $hashSenha;
    }


}