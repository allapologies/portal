<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Core;

class GalleryController extends Controller
{
    public function indexAction(){
        $images = $this->get('Flickr');
        $num = $this->getParameter('imagenum');
        $key = $this->container->getParameter('apikey');
        $images = $images->loadimages($key, $num);
        $html = $this->container->get('templating')->render(
            'portal/gallery.html.twig', ['images' => $images]
        );

        return new Response($html);
    }
}