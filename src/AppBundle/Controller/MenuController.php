<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Core;
use Symfony\Component\HttpFoundation\JsonResponse;

class MenuController extends Controller
{	

	public function indexAction(){
		$html = $this->container->get('templating')->render(
			'portal/menu.html.twig'
		);
		
		return new JsonResponse(['html' => $html]); 
	}
}