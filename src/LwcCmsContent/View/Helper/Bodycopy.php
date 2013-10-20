<?php
namespace LwcCmsContent\View\Helper;

use Zend\View\Helper\AbstractHelper;
use LwcCmsContent\Model\ContentEntityInterface;

class Bodycopy extends AbstractHelper
{

    /**
     *
     * @return string
     */
    protected function getViewModel()
    {
        return 'content/bodycopy';
    }

    /**
     *
     * @param ContentEntityInterface $content
     * @return boolean
     *         string
     */
    public function __invoke(ContentEntityInterface $content)
    {
        if (! $content->getBodycopy()) {
            return false;
        }
        $viewModel = $this->getViewModel();
        return $this->view->render($viewModel, array(
            'content' => $content
        ));
    }
}