<?php

namespace App\Controller;

use App\Entity\Sfcs;
use App\Form\SFCSType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\Validator\Constraints\DateTime;

class SfcsController extends Controller
{
    /**
     * @Route("/sfcs", name="sfcs")
     */
    public function index()
    {
        // replace this line with your own code!
        return $this->render('@Maker/demoPage.html.twig', [ 'path' => str_replace($this->getParameter('kernel.project_dir').'/', '', __FILE__) ]);
    }

    /**
     * @Route("/createSfc", name="user_registration")
     */
    public function registerAction(Request $request)
    {

        $sfcs = new Sfcs();
        $form = $this->createForm(SFCSType::class, $sfcs);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


//            var_dump($date);die;
            // On enregistre l'utilisateur dans la base
            $sfcs->setDateCreate(\DateTime::ATOM);
            $sfcs->setIsValid(true);
            $em = $this->getDoctrine()->getManager();
            $em->persist($sfcs);
            $em->flush();


        }

        return $this->render(
            'Admin/createSfcs.html.twig',
            array('form' => $form->createView())
        );
    }
}
