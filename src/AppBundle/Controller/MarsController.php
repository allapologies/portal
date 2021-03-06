<?php
namespace AppBundle\Controller;

use AppBundle\Core\ReadfileSingletone;
use AppBundle\Rover\Parser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Rover\Rover;

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

        /**
         * TODO handle wrong input data error
         */
        try {
            $input = Parser::parseStart($input);
        } catch (\AppBundle\Rover\RoverException $e){
            $e->logGeneralReport();
            $e->logAdminReport();
        }
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
        $rov = new Rover([$input[0],$input[1]], $direct);
        $steps = Parser::parseMovements($input[3]);
        
        /**
         * TODO  ?? relocate to move method
         */
        try {
            foreach ($steps as $step) {
                switch ($step) {
                    case "L": $rov->turnLeft(); break;
                    case "R": $rov->turnRight(); break;
                    case "M": $rov->move(); break;
                }
            }
        } catch (RoverException $e) {
            echo 'Выброшено исключение: ', $e->logReport(); 
        }


        /**
         * Prints current position
         */
        $position = $rov->getPosition();

        $html = $this->container->get('templating')->render(
            'portal/mars.html.twig', ['position' => $position]
        );

        return new Response($html);
    }
}