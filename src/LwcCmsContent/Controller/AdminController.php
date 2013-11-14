<?php
namespace LwcCmsContent\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class AdminController extends AbstractActionController
{

    /**
     *
     * @return \LwcCmsContent\Service\ContentService
     */
    protected function getContentService()
    {
        return $this->getServiceLocator()->get('LwcCmsContent\Service\Content');
    }

    /**
     *
     * @return \LwcCmsContent\Service\TypeService
     */
    protected function getTypeService()
    {
        return $this->getServiceLocator()->get('LwcCmsContent\Service\Type');
    }

    public function indexAction()
    {}

    public function wizardAction()
    {
        return array(
            'types' => $this->getTypeService()->getTypes()
        );
    }
}