<?php
namespace AppBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Definition\Processor;


class AppExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new AppConfiguration();
        $processor = new Processor();
        $processedConfiguration = $processor->processConfiguration(
            $configuration,
            $configs
        );
        $container->setParameter( 'apikey', $processedConfiguration['apikey']);
    }
}