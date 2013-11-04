<?php

namespace Anh\AdminBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class CustomCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $lister = $container->getDefinition('anh_admin.bundles_lister');

        $taggedServices = $container->findTaggedServiceIds('anh_admin.bundle');

        foreach ($taggedServices as $id => $attributes) {
            $lister->addMethodCall('addBundle', array(new Reference($id)));
        }
    }
}
