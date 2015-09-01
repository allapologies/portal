<?php
namespace AppBundle\Controller;

use AppBundle\Core\ReadfileSingletone;
use AppBundle\Rover\Parser;
use AppBundle\Rover\Field;
use AppBundle\Rover\Rover;
use AppBundle\Core\Settings;



use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class MarsController extends Controller
{
    public function indexAction(){
        /**
         * REad
         */
        $file = ReadfileSingletone::getInstance();

        /**
         * TODO handle reading error exception
         */
        $input = $file->readFile(__DIR__.'/../input/input.data');

        /**
         * TODO handle wrong input data error
         */
        $fieldSize = Parser::parseField($input);
        $plateau = new Field($fieldSize[0], $fieldSize[1]);
        $rovers = Parser::parseStart($input);

        /**
         * TODO implement creation of multiple objects
         */
        $settings = new Settings;
        $direct = strtolower($rovers[2]);

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
        $rover = new Rover($rovers[0], $rovers[1], $direct);
        $steps = Parser::parseMovements($rovers[3]);

        /**
         * TODO  ?? relocate to move method
         */
        foreach ($steps as $step) {
            switch ($step) {
                case "L": $rover->turnLeft(); break;
                case "R": $rover->turnRight(); break;
                case "M": $rover->move(); break;
            }
        }
        /**
         * Prints current position
         */
        $position = $rover->getPosition();

        $html = $this->container->get('templating')->render(
            'portal/mars.html.twig', ['position' => $position]
        );

        return new Response($html);
    }
}