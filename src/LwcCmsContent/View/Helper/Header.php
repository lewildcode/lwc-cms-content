<?php
namespace LwcCmsContent\View\Helper;

use Zend\View\Helper\AbstractHelper;
use LwcCmsContent\Model\Component\HeaderAwareInterface;

class Header extends AbstractHelper
{

    /**
     *
     * @return string
     */
    protected function getViewModel()
    {
        return 'content/header';
    }

    /**
     *
     * @param HeaderAwareInterface $content
     * @return string
     */
    public function __invoke(HeaderAwareInterface $content)
    {
        $viewModel = $this->getViewModel();
        return $this->view->render($viewModel, array(
            'header' => $content->getHeader(),
            'tag' => $this->getTag($content)
        ));
    }

    /**
     *
     * @param HeaderAwareInterface $header
     * @return string
     */
    public function getTag(HeaderAwareInterface $header)
    {
        return 'h' . $header->getHeaderWeight();
    }
}