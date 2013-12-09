<?php
namespace LwcCmsContent\Form;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ContentTypeFactory implements FactoryInterface
{

    /**
     * (non-PHPdoc)
     * 
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $typeService = $serviceLocator->get('LwcCmsContent\Service\Type');
        return new ContentType('contentTypeSelection', array(
            'types' => array_merge(
                array('' => ''),
                $typeService->getTypesKeyValue()
            ),
            'pages' => array(
                1 => 'Asd'
            )
        ));
    }
}