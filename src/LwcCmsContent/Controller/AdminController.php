<?php
namespace LwcCmsContent\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use LwcCmsContent\Form\Bodycopy;

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
        $form = $this->getServiceLocator()->get('LwcCmsContent\Form\Bodycopy');
        
        if($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());
            if($form->isValid()) {
                var_dump($form->getData());
                exit;
            }
        }
        return array(
            'typeForm' => $this->getServiceLocator()->get('LwcCmsContent\Form\ContentType'),
            'form' => $form,
        );
    }
}