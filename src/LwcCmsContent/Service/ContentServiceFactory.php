<?php
namespace LwcCmsContent\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

class ContentServiceFactory implements FactoryInterface
{

    /**
     * (non-PHPdoc)
     *
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');

        $service = new ContentService();
        $service->setHydrator(new ClassMethods());
        $service->addTable($serviceLocator->get('LwcCmsContent\Table\Content'));
        $service->setTypes($config['lwccmscontent']['types']);
        return $service;
    }
}