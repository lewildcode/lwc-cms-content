<?php
namespace LwcCmsContent\Form;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class BodycopyFactory implements FactoryInterface
{

    /**
     * (non-PHPdoc)
     * 
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $form = new Bodycopy('bodycopy');
        $filter = new BodycopyFilter();
        $form->setInputFilter($filter);
        return $form;
    }
}