<?php

namespace App\Utils;

use App\Entity\Jobs;
use App\Entity\Sfcs;
use App\Entity\Users;
use Symfony\Component\HttpFoundation\Session\Session;


class StorageSession
{
    private $session;
    private static $instance;

    function __construct()
    {
        if (!$this->session->get('isLogged')){
            $this->session->set('isLogged',false);
        }

        $this->session= new Session();
        $this->session->start();
    }



    public function setUserLogged(Users $u){
      $this->session->set('userId',$u->getId());

    }
    public function setJob(Jobs $j){
        $this->session->set('jobsId',$j->getId());

    }
    public function setSfc(Sfcs $s){
        $this->session->set('sfcsId',$s->getId());

    }
    public function setFormer(Users $u){
        if ($u->getRoles()== ['ROLE_FORMATEUR']){

        }
    }
    private function getInstance(){

        if (self::$instance == null){
            self::$instance = new StorageSession();

        }
        return self::$instance;


    }
    public function isLog(){
        return $this->session->get('isLogged');
    }


    public function redirectIfCanAccess(){


        if (!$this->isLog()){
            $this->session->getFlashBag()->add('ERROR','no connected ! ');

            header('location:http://'.$_SERVER['HTTP_HOST'].'/login');die();
        }
    }


}
