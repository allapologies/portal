<?php
namespace AppBundle\Controller;

use AppBundle\Core\ReadfileSingletone;
use AppBundle\Rover\Parser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class MarsController extends Controller
{
    public function indexAction(Request $request){

        /**
         * Read
         */
        $file = ReadfileSingletone::getInstance();

        /**
         * TODO handle reading error exception
         */
        $input = $file->readFile(__DIR__.'/../input/input.data');

        
        // createFormBuilder is a shortcut to get the "form factory"
        // and then call "createBuilder()" on it
        $form = $this->createFormBuilder()
            ->add('Input', 'text')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $data = $form->getData();
            
            return $this->redirectToRoute('mars');            
        }

        /**
         * TODO handle wrong input data error
         */
        $input = Parser::parseStart($input);

        /**
         * TODO implement creation of multiple objects
         */
        $direct = strtolower($input[2]);

        /**
         * TODO implement bindings between geo and math coordinates in Coordinates Class
         */
        switch ($direct){
            case "n": $direct = [0, 1]; break;
            case "w": $direct = [-1, 0]; break;
            case "s": $direct = [0, -1]; break;
            case "e": $direct = [1, 0]; break;
        }
        /**
         * Creation new class instance
         */


        $rov = $this->get('Rover');
        $rov->x_pos= $input[0];
        $rov->y_pos= $input[1];
        $rov->direction= $direct;

        $steps = Parser::parseMovements($input[3]);

        /**
         * TODO  ?? relocate to move method
         */
        foreach ($steps as $step) {
            switch ($step) {
                case "L": $rov->turnLeft(); break;
                case "R": $rov->turnRight(); break;
                case "M": $rov->move(); break;
            }
        }


        /**
         * Prints current position
         */
        $position = $rov->getPosition();

        $html = $this->container->get('templating')->render(
            'portal/mars.html.twig', ['position' => $position, 'form' => $form->createView()]
        );

        return new Response($html);
    }
}