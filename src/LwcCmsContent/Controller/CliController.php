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

    public function createAction()
    {
        $type = $this->params('type');
        $service = $this->getContentService();

        // valid content type?
        if(!$service->hasType($type)) {
            return $this->notFoundAction();
        }
        // valid json?
        try{
            $specs = Json::decode($this->params('specs'), Json::TYPE_ARRAY);
        } catch(\Exception $e) {
            $viewModel = new ConsoleModel();
            $viewModel->setResult('JSON decoding failed.');
            return $viewModel;
        }

        $className  = $service->getTypeClassName($type);
        $instance = new $className();
        $instance->setRowId((int) $this->params('row'));
        $instance->setWeight((int) $this->params('weight'));
        $service->getHydrator()->hydrate($specs, $instance);

        $service->save($instance);
    }
}