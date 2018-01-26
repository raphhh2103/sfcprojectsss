<?php

namespace App\Controller;

use App\Entity\JobsSfcs;
use App\Entity\StorageSession;
use App\Entity\UserJobs;
use App\Entity\Users;
use App\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Session\Session;

class UsersController extends Controller
{

    /**
     * @Route("/former/add", name="former_add")
     */
    public function index(Request $request, StorageSession $session)
    {

        $user = new Users();
        $user->setPassword('test1234=');
        $user->setUsername('userDefault');
        $user->setFullName('userDefault');
        $user->setRoles(['ROLE_USER']);
        $form = $this->createFormBuilder($user)
        ->add('email',TextType::class)
        ->add('save',SubmitType::class ,array('label'=> 'generate link'))
        ->getForm();

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
           $id =  $user->getId();
           $link = 'http://localhost:8000/user/update/';
//            dump($user->getId());
//            dump(get_current_user());
//            dump($user->getId());die();
            $userJob = new UserJobs();
            $userJob->setUser($user->getId());
            $userJob->setFormateur($_SESSION['id']);
            $userJob->setJobs($_SESSION['idjobs']);
            $userJob->setSkils($_SESSION['idskills']);


            return $this->render('formateur/index.html.twig',array('link'=>$link.$id,'form'=>$form->createView(),'user'=>$user->getId(),));

        }






        // replace this line with your own code!
        return $this->render('formateur/index.html.twig', array('form'=>$form->createView(),'user'=>$user->getId(),));
    }
}
