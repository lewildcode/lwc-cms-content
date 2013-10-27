<?php
namespace LwcCmsContent\View\Helper;

use Zend\View\Helper\AbstractHelper;
use LwcCmsContent\Model\ContentEntityInterface;

class HtmlList extends AbstractHelper implements RendererInterface
{

    /**
     *
     * @return string
     */
    protected function getViewModel()
    {
        return 'content/htmllist';
    }

    /**
     *
     * @param ContentEntityInterface $content
     * @return boolean
     *         string
     */
    public function __invoke(ContentEntityInterface $content)
    {
        if (! $content->getItems()) {
            return false;
        }
        $viewModel = $this->getViewModel();
        return $this->view->render($viewModel, array(
            'list' => $content
        ));
    }
}