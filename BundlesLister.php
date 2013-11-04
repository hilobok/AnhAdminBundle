<?php

namespace Anh\AdminBundle;

class BundlesLister
{
    private $bundles;

    public function addBundle($bundle)
    {
        $this->bundles[] = $bundle;
    }

    public function getBundles()
    {
        $bundles = null;

        foreach ($this->bundles as $bundle) {
            $alias = $bundle->getContainerExtension()->getAlias();
            $class = get_class($bundle);

            $bundles[] = array(
                'alias' => $alias,
                'route' => $alias  . '_admin',
                'title' => defined($class . '::TITLE') ? constant($class . '::TITLE') : $alias,
                'description' => defined($class . '::DESCRIPTION') ? constant($class . '::DESCRIPTION') : '',
                'version' => defined($class . '::VERSION') ? constant($class . '::VERSION') : 'unknown'
            );
        }

        return $bundles;
    }
}
