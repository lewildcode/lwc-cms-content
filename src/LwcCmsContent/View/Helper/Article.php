<?php
namespace LwcCmsContent\View\Helper;

use Zend\View\Helper\AbstractHelper;
use LwcCmsContent\Model\ArticleEntity;

class Article extends AbstractHelper
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
     *
     * @param ArticleEntity $article
     * @return string
     */
    public function __invoke(ArticleEntity $article)
    {
        $viewModel = $this->getViewModel();
        return $this->view->render($viewModel, array(
            'article' => $article
        ));
    }
}