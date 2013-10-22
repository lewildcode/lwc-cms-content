<?php
namespace LwcCmsContent\View\Helper;

use Zend\View\Helper\AbstractHelper;
use LwcCmsContent\Model\ContentEntityInterface;

class DefinitionList extends AbstractHelper implements RendererInterface
{

    /**
     *
     * @return string
     */
    protected function getViewModel()
    {
        return 'content/definitionlist';
    }

    /**
     *
     * @param ContentEntityInterface $content
     * @return boolean
     *         string
     */
    public function __invoke(ContentEntityInterface $content)
    {
        if (! $content->getDefinitions()) {
            return false;
        }
        $viewModel = $this->getViewModel();
        return $this->view->render($viewModel, array(
            'list' => $content
        ));
    }
}