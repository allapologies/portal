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
            ->scalarNode('URL')
                ->cannotBeEmpty()
            ->end()
            ->scalarNode('APIKEY')   //PHPstorm exception: method is not found?
                ->cannotBeEmpty()
            ->end()
            ->integerNode('NUMBER')->end()
            ->scalarNode('FORMAT')->end()
            ->integerNode('JSONP')
                ->defaultValue(1)
            ->end()
            ->scalarNode('LOG')->end()
        ->end()
    ;

    return $treeBuilder;
    }
}