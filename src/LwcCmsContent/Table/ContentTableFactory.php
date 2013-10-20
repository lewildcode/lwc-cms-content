<?php
namespace LwcCmsContent\Table;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ContentTableFactory implements FactoryInterface
{

    /**
     * (non-PHPdoc)
     *
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $db = $serviceLocator->get('LwcCmsContent\DbAdapter');
        $config = $serviceLocator->get('Config');

        $table = $config['lwccmscontent']['contenttable'];
        return new ContentTable($table, $db);
    }
}