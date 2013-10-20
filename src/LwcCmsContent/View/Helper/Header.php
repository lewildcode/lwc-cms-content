<?php
namespace LwcCmsContent\View\Helper;

use Zend\View\Helper\AbstractHelper;
use LwcCmsContent\Model\Component\HeaderAwareInterface;
use LwcCmsContent\Model\Component\Header as ContentHeader;

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
        $header = $content->getHeader();

        return $this->view->render($viewModel, array(
            'header' => $header,
            'tag' => $this->getTag($header)
        ));
    }

    /**
     *
     * @param ContentHeader $header
     * @return string
     */
    public function getTag(ContentHeader $header)
    {
        return 'h' . $header->getWeight();
    }
}