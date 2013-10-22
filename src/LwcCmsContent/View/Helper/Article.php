<?php
namespace LwcCmsContent\View\Helper;

use Zend\View\Helper\AbstractHelper;
use LwcCmsContent\Type\Article as ArticleEntity;
use LwcCmsContent\Model\ContentEntityInterface;

class Article extends AbstractHelper implements RendererInterface
{

    /**
     *
     * @return string
     */
    protected function getViewModel()
    {
        return 'content/article';
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\View\Helper\RendererInterface::__invoke()
     */
    public function __invoke(ContentEntityInterface $content)
    {
        $viewModel = $this->getViewModel();
        return $this->view->render($viewModel, array(
            'article' => $content
        ));
    }
}