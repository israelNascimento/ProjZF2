<?php
/**
 * Created by PhpStorm.
 * User: israel
 * Date: 25/04/15
 * Time: 18:51
 */

namespace Livraria\View\Helper;
use Zend\View\Helper\AbstractHelper;
use Zend\Authentication\Storage\Session as SessionStorage;
use Zend\Authentication\AuthenticationService;

class UserIdentity extends AbstractHelper
{
    protected $authSevice;

    /**
     * @return mixed
     */
    public function getAuthSevice()
    {
        return $this->authSevice;
    }

    function __invoke($namespace=null)
    {
        $sessionStorage=new SessionStorage($namespace);
        $this->authSevice=new AuthenticationService();
        $this->authSevice->setStorage($sessionStorage);

        if($this->authSevice->hasIdentity())
            return $this->authSevice->getIdentity();
        else
            return false;

    }


}