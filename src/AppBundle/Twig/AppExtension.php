<?php
namespace AppBundle\Twig;

class AppExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return [new \Twig_SimpleFilter('randomizer', [$this, 'randomizerFilter'])];
    }

    public function randomizerFilter($str)
    {
        $str = 'Randomized title: ' . str_shuffle ( $str );

        return $str;
    }

    public function getName()
    {
        return 'app_extension';
    }
}