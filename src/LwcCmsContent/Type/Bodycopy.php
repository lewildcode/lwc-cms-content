<?php
namespace LwcCmsContent\Type;

use LwcCmsContent\Model\AbstractContentEntity;

class Bodycopy extends AbstractContentEntity
{

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\ContentEntityInterface::getTypeId()
     */
    public function getTypeId()
    {
        return 'lwc_bodycopy';
    }
}