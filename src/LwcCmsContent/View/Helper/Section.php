<?php
namespace LwcCmsContent\View\Helper;

use Zend\View\Helper\AbstractHelper;
use LwcCmsContent\Model\SectionEntity;

class Section extends AbstractHelper
{

    /**
     *
     * @return string
     */
    protected function getViewModel()
    {
        return 'content/section';
    }

    /**
     *
     * @param SectionEntity $section
     * @return string
     */
    public function __invoke(SectionEntity $section)
    {
        $viewModel = $this->getViewModel();
        return $this->view->render($viewModel, array(
            'section' => $section
        ));
    }
}