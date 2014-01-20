<?php

namespace Sirian\NodeJSBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class SirianNodeJSExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $this->loadServices($container);

        $config = $this->processConfiguration(new Configuration(), $configs);
        
        $this->addParameters($container, $config);
    }

    protected function loadServices($container)
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }

    protected function addParameters(ContainerBuilder $container, $parameters)
    {
        $definition = new Definition();
        $definition
            ->setClass('Sirian\NodeJSBundle\ParameterBag\ParameterBag')
            ->addArgument($parameters)
            ->setPublic(false)
            ->addTag('sirian_node_js.parameter_bag')
        ;

        $container
            ->setDefinition('sirian_node_js.parameter_bag.' . $this->getAlias(), $definition)
        ;
    }
}
