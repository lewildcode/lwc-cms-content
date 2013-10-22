<?php
namespace LwcCmsContent\View\Helper;

use LwcCmsContent\Model\ContentEntityInterface;

interface RendererInterface
{

    /**
     *
     * @param ContentEntityInterface $content
     * @return string
     */
    public function __invoke(ContentEntityInterface $content);
}