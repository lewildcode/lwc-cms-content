<?php
namespace LwcCmsContent\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Json\Json;
use Zend\View\Model\ConsoleModel;

class CliController extends AbstractActionController
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

    public function showTypesAction()
    {
        $types = $this->getTypeService()->getTypes();
        foreach ($types as $type => $specs) {
            echo $type . ' => ' . $specs['class_name'] . "\n";
        }
        return $types;
    }

    public function createAction()
    {
        $type = $this->params('type');
        $service = $this->getTypeService();
        $specs = $this->params('specs', array());
        
        if (! $service->hasType($type)) {
            return $this->notFoundAction();
        }
        
        if (! empty($specs)) {
            try {
                $specs = Json::decode($specs, Json::TYPE_ARRAY);
            } catch (\Exception $e) {
                $viewModel = new ConsoleModel();
                $viewModel->setResult('JSON decoding failed.');
                return $viewModel;
            }
        }
        
        $className = $service->getClassName($type);
        $instance = new $className();
        $instance->setWeight((int) $this->params('weight'));
        
        $contentService = $this->getContentService();
        $contentService->getHydrator()->hydrate($specs, $instance);
        $contentService->save($instance);
    }

    public function updateAction()
    {
        $service = $this->getContentService();
        $cmsObject = $service->getContentById($this->params('id'));
        $specs = $this->params('specs', array());
        
        if (! $cmsObject) {
            return $this->notFoundAction();
        }
        if (! empty($specs)) {
            try {
                $specs = Json::decode($specs, Json::TYPE_ARRAY);
            } catch (\Exception $e) {
                $viewModel = new ConsoleModel();
                $viewModel->setResult('JSON decoding failed.');
                return $viewModel;
            }
        }
        
        $instance = $service->getContentByBaseObject($cmsObject);
        $service->getHydrator()->hydrate($specs, $instance);
        $service->save($instance);
    }
}