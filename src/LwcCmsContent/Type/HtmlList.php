<?php
namespace LwcCmsContent\Type;

use LwcCmsContent\Model\AbstractContentEntity;

class HtmlList extends AbstractContentEntity
{

    /**
     *
     * @var string
     */
    protected $listClass;

    /**
     *
     * @var boolean
     */
    protected $ordered = false;

    /**
     *
     * @var array
     */
    protected $items = array();

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\ContentEntityInterface::getTypeId()
     */
    public function getTypeId()
    {
        return 'lwc_htmllist';
    }

    /**
     *
     * @return boolean
     */
    public function getOrdered()
    {
        return $this->ordered;
    }

    /**
     *
     * @param boolean $ordered            
     * @return \LwcCmsContent\Type\HtmlList
     */
    public function setOrdered($ordered)
    {
        $this->ordered = (bool) $ordered;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getListClass()
    {
        return $this->listClass;
    }

    /**
     *
     * @param string $class            
     * @return \LwcCmsContent\Type\HtmlList
     */
    public function setListClass($class)
    {
        $this->listClass = trim($class);
        return $this;
    }

    /**
     *
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     *
     * @param string $items            
     * @return \LwcCmsContent\Type\HtmlList
     */
    public function setItems($items)
    {
        $this->items = array();
        if (! is_array($items)) {
            $items = explode("\n", $items);
        }
        foreach ($items as $item) {
            $this->addItem($item);
        }
        
        return $this;
    }

    /**
     *
     * @param string $item            
     * @return \LwcCmsContent\Type\HtmlList
     */
    public function addItem($item)
    {
        $this->items[] = trim($item);
        return $this;
    }
}