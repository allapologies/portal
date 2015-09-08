<?php
namespace AppBundle\Twig;

class LegendExtension extends \Twig_Extension
{
    public function getFunctions()
    {
        return [ new \Twig_SimpleFunction('legend', [$this, 'renderLegend'])];
    }

    public function renderLegend($images)
    {
        foreach ($images as $img ) {
            $title = $img->title;
        }
    }

    public function getName()
    {
        return 'legend_extension';
    }
}
