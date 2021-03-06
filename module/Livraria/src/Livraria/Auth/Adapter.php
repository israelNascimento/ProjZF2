<?php
/**
 * Created by PhpStorm.
 * User: israel
 * Date: 25/04/15
 * Time: 09:45
 */

namespace Livraria\Auth;

use Zend\Authentication\Adapter\AdapterInterface,
    Zend\Authentication\Result;
use Doctrine\ORM\EntityManager;

class Adapter implements  AdapterInterface
{

    protected $em;
    protected $username;
    protected $password;

    function __construct( EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
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
        $this->password = $password;
        return $this;
    }



    /**
     * Performs an authentication attempt
     *
     * @return \Zend\Authentication\Result
     * @throws \Zend\Authentication\Adapter\Exception\ExceptionInterface If authentication cannot be performed
     */
    public function authenticate()
    {
        $repository=$this->em->getRepository('Livraria\Entity\User');
        $user=$repository->findByEmailAndPassword($this->getUsername(), $this->getPassword());

        if($user)
            return new Result(Result::SUCCESS,array('user'=>$user),array('OK'));
        else
            return new Result(Result::FAILURE_CREDENTIAL_INVALID, null,array());

    }


}

