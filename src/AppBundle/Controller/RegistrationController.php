<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Core;
use Symfony\Component\HttpFoundation\Request;


class RegistrationController extends Controller
{
    public function indexAction(Request $request){
        
    	$form = $this->createFormBuilder()
            ->add('Login:', 'text', array(
            	'attr'  => array('class' => 'form-control'),
            	'required' => true
        	))
            ->add('E-mail:', 'email', array(
            	'attr'  => array('class' => 'form-control'),
            	'required' => true
        	))
            ->add('Name:', 'text', array(
            	'attr'  => array('class' => 'form-control'),
            	'required' => true
        	))
			->add('gender', 'choice', array(
				'attr'  => array('class' => 'form-control'),
			    'choices'  => array('m' => 'Male', 'f' => 'Female'),
			    'required' => true,
			))
			->add('Password:', 'password', array(
            	'attr'  => array('class' => 'form-control'),
            	'required' => true
        	))
            ->getForm();

        $html = $this->container->get('templating')->render(
            'portal/registration.html.twig', ['form' => $form->createView()]
        );

        $form->handleRequest($request);

	    if ($form->isValid()) {
	        // perform some action, such as saving the task to the database

	        return $this->redirectToRoute('home');

	    }

        return new Response($html);
    }
}