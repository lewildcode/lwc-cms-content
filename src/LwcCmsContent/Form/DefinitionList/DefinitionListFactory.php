<?php
namespace LwcCmsContent\Form\DefinitionList;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use LwcCmsContent\Filter\DefinitionList as DlFilter;

class DefinitionListFactory implements FactoryInterface
{

    /**
     * (non-PHPdoc)
     * 
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $form = new DefinitionList('definitionlist');
        $filter = new DlFilter();
        $form->setInputFilter($filter);
        return $form;
    }
}