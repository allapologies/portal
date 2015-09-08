<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Core;

class DefaultController extends Controller
{
    public function indexAction(){
        $html = $this->container->get('templating')->render(
            'portal/portal.html.twig'
        );

        return new Response($html);
    }
}