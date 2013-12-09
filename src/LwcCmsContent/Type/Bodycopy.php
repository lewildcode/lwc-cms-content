<?php
namespace LwcCmsContent\Type;

use LwcCmsContent\Model\AbstractContentEntity;

class Bodycopy extends AbstractContentEntity
{

    /**
     *
     * @var string
     */
    protected $bodycopy;

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\ContentEntityInterface::getTypeId()
     */
    public function getTypeId()
    {
        return 'lwc_bodycopy';
    }

    /**
     *
     * @return string
     */
    public function getBodycopy()
    {
        if ($this->bodycopy === '') {
            $this->bodycopy = null;
        }
        return $this->bodycopy;
    }

    /**
     *
     * @param string $bodycopy            
     * @return \LwcCmsContent\Type\Bodycopy
     */
    public function setBodycopy($bodycopy)
    {
        $this->bodycopy = $bodycopy;
        return $this;
    }
    
    /**
     * (non-PHPdoc)
     * @see \LwcCmsContent\Model\AbstractContentEntity::__toString()
     */
    public function __toString()
    {
        if($bodycopy = $this->getBodycopy()) {
            return substr($bodycopy, 0, 60) . '...';
        }
        return parent::__toString();
    }
}