<?php
namespace LwcCmsContent\Model;

class BodycopyEntity extends AbstractContentEntity
{
    /**
     * (non-PHPdoc)
     * @see \LwcCmsContent\Model\ContentEntityInterface::getTypeId()
     */
    public function getTypeId()
    {
        return 'lwc_bodycopy';
    }
}