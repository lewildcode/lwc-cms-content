<?php
namespace LwcCmsContent\Type;

use LwcCmsContent\Model\AbstractContentEntity;

class RawHtml extends AbstractContentEntity
{

    /**
     * 
     * @var string
     */
    protected $html;
    
    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\ContentEntityInterface::getTypeId()
     */
    public function getTypeId()
    {
        return 'lwc_rawhtml';
    }
    
    /**
     * 
     * @return string
     */
    public function getHtml()
    {
        if($this->html === '') {
            $this->html = null;
        }
        return $this->html;
    }
    
    /**
     * 
     * @param string $html
     * @return \LwcCmsContent\Type\RawHtml
     */
    public function setHtml($html)
    {
        $this->html = trim($html);
        return $this;
    }
}