<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Core;

class RegistrationController extends Controller
{
    public function indexAction(){
        
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

        return new Response($html);
    }
}