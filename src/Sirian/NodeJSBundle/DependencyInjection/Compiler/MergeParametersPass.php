<?php

namespace Sirian\NodeJSBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class MergeParametersPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $bag = $container->getDefinition('sirian_node_js.parameter_bag');

        foreach ($container->findTaggedServiceIds('sirian_node_js.parameter_bag') as $id => $tag) {
            $bag->addMethodCall('merge', [new Reference($id)]);
        }
    }
}
