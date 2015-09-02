<?php
namespace AppBundle\DependencyInjection;



use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class AppConfiguration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(){
    $treeBuilder = new TreeBuilder();
    $rootNode = $treeBuilder->root('app');
    $rootNode
        ->children()
            ->scalarNode('url')
                ->cannotBeEmpty()
            ->end()
            ->scalarNode('apikey')   //PHPstorm exception: method is not found?
                ->cannotBeEmpty()
            ->end()
            ->integerNode('number')->end()
            ->scalarNode('format')->end()
            ->integerNode('jsonp')
                ->defaultValue(1)
            ->end()
            ->scalarNode('log')->end()
        ->end()
    ;

    return $treeBuilder;
    }
}