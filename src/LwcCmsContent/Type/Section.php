<?php
namespace LwcCmsContent\Type;

class Section extends Article
{

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\ContentEntityInterface::getTypeId()
     */
    public function getTypeId()
    {
        return 'lwc_section';
    }
}