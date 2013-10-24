<?php
namespace LwcCmsContent\View\Helper;

use Zend\View\Helper\AbstractHelper;
use LwcCmsContent\Model\ContentEntityInterface;

class RawHtml extends AbstractHelper implements RendererInterface
{
    /**
     *
     * @return string
     */
    protected function getViewModel()
    {
        return 'content/rawhtml';
    }

    /**
     *
     * @param ContentEntityInterface $content            
     * @return string
     */
    public function __invoke(ContentEntityInterface $content)
    {
        if (! $content->getHtml()) {
            return false;
        }
        $viewModel = $this->getViewModel();
        return $this->view->render($viewModel, array(
            'content' => $content
        ));
    }
}