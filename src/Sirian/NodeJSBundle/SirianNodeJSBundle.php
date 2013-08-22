<?php

namespace Sirian\NodeJSBundle;

use Sirian\NodeJSBundle\DependencyInjection\Compiler\MergeParametersPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class SirianNodeJSBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new MergeParametersPass());
    }

}
