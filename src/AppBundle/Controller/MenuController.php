<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Core;
use Symfony\Component\HttpFoundation\JsonResponse;

class MenuController extends Controller
{
	public function indexAction(){
	$response = ["code" => 100, "success" => true, "data"=> "<h2>Test</h2>"];
	
	return new JsonResponse($response); 
	}      
}