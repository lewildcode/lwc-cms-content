<?php
namespace LwcCmsContent\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use LwcCmsContent\Form\Bodycopy;
use Zend\View\Model\ViewModel;

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
    {
        $types = $this->getTypeService()->getTypes();
        $contentService = $this->getContentService();
        $viewData = array();
        
        foreach(array_keys($types) as $type) {
            $numberOfItems = $contentService->getContentsByType($type)->count();
            $viewData[$type] = $numberOfItems;
        }
        
        return array(
            'types' => $viewData
        );
    }
    
    public function listAction()
    {
        $type = $this->params('type');
        $service = $this->getContentService();
        $view = new ViewModel();
        $view->setVariables(array(
            'type' => $type,
            'service' => $service,
            'items' => $service->getContentsByType($type)
        ));
        if($this->getRequest()->isXmlHttpRequest()) {
            $view->setTerminal(true);
        }
        return $view;
    }

    public function formAction()
    {
        $type = $this->params('type');
        $id = $this->params('id');
        $typeService = $this->getTypeService();
        
        $formAlias = $typeService->getForm($type);
        $form = $this->getServiceLocator()->get($formAlias);
        
        if($id) {
            $base = $this->getContentService()->getContentById($id);
            $content = $this->getContentService()->getContentByBaseObject($base);
            $form->bind($content);
        }
        
        if($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());
            if($form->isValid()) {
                return $this->redirect()->toRoute('zfcadmin/lwccmscontent', array(
                    'action' => 'form',
                    'id' => $id
                ));
            }
        }
        $view = new ViewModel();
        $view->setVariables(array(
            'form' => $form,
            'type' => $type
        ));
        if($this->getRequest()->isXmlHttpRequest()) {
            $view->setTerminal(true);
        }
        return $view;
    }
}