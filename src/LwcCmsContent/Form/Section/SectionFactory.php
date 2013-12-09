<?php
namespace LwcCmsContent\Form\Section;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use LwcCmsContent\Filter\Section as SectionFilter;

class SectionFactory implements FactoryInterface
{

    /**
     * (non-PHPdoc)
     * 
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $form = new Section('section');
        $filter = new SectionFilter();
        $form->setInputFilter($filter);
        return $form;
    }
}