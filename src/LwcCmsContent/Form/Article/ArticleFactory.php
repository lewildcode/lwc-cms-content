<?php
namespace LwcCmsContent\Form\Article;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use LwcCmsContent\Filter\Article as ArticleFilter;

class ArticleFactory implements FactoryInterface
{

    /**
     * (non-PHPdoc)
     * 
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $form = new Article('article');
        $filter = new ArticleFilter();
        $form->setInputFilter($filter);
        return $form;
    }
}