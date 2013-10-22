<?php
namespace LwcCmsContent\View\Helper;

use Zend\View\Helper\AbstractHelper;
use LwcCmsContent\Type\Section as SectionEntity;
use LwcCmsContent\Model\ContentEntityInterface;

class Section extends AbstractHelper implements RendererInterface
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
    public function __invoke(ContentEntityInterface $content)
    {
        $viewModel = $this->getViewModel();
        return $this->view->render($viewModel, array(
            'section' => $content
        ));
    }
}