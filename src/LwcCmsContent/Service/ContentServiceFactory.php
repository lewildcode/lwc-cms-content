<?php
namespace LwcCmsContent\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use LwcCmsContent\Model\ContentEntityHydrator;

class ContentServiceFactory implements FactoryInterface
{
    /**
     * (non-PHPdoc)
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $dbTable = $serviceLocator->get('LwcCmsContent\Table\Content');
        $hydrator = new ContentEntityHydrator();
        $config = $serviceLocator->get('Config');
        $types = $config['lwccmscontent']['types'];
        return new ContentService($dbTable, $hydrator, $types);
    }
}