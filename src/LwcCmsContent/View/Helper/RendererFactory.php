<?php

namespace LwcCmsContent\View\Helper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RendererFactory implements FactoryInterface
{
    /**
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return \LwcCmsContent\View\Helper\Renderer
     */
    public function createService(ServiceLocatorInterface $helperPluginManager)
    {
        $config = $helperPluginManager->getServiceLocator()->get('config');
        return new Renderer($config['lwccmscontent']['types']);
    }
}