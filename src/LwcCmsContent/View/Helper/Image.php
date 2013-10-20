<?php
namespace LwcCmsContent\View\Helper;

use Zend\View\Helper\AbstractHelper;
use LwcCmsContent\Model\Component\ImageAwareInterface;

class Image extends AbstractHelper
{

    /**
     *
     * @return string
     */
    protected function getViewModel()
    {
        return 'content/image';
    }

    /**
     *
     * @param ContentEntityInterface $content
     * @return boolean
     *         string
     */
    public function __invoke(ImageAwareInterface $content)
    {
        $viewModel = $this->getViewModel();
        return $this->view->render($viewModel, array(
            'image' => $content->getImage()
        ));
    }
}