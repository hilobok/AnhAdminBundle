<?php

namespace Anh\AdminBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Anh\AdminBundle\DependencyInjection\Compiler\CustomCompilerPass;

class AnhAdminBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new CustomCompilerPass());
    }
}
