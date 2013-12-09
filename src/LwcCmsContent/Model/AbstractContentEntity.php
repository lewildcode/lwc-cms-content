<?php
namespace LwcCmsContent\Model;

abstract class AbstractContentEntity implements ContentEntityInterface
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var boolean
     */
    protected $visible = true;

    /**
     *
     * @var integer
     */
    protected $weight;

    /**
     *
     * @param integer $weight
     *            OPTIONAL
     */
    public function __construct($weight = null)
    {
        if ($weight) {
            $this->setWeight($weight);
        }
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\ContentEntityInterface::getId()
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\ContentEntityInterface::setId()
     */
    public function setId($id)
    {
        $this->id = (int) $id;
        return $this;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\ContentEntityInterface::getVisible()
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\ContentEntityInterface::setVisible()
     */
    public function setVisible($visible)
    {
        $this->visible = (bool) $visible;
        return $this;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\ContentEntityInterface::getWeight()
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\ContentEntityInterface::setWeight()
     */
    public function setWeight($weight)
    {
        $this->weight = (int) $weight;
        return $this;
    }

    /**
     * (non-PHPdoc)
     * 
     * @see \LwcCmsContent\Model\ContentEntityInterface::getArrayCopy()
     */
    public function getArrayCopy()
    {
        return array(
            'type_id' => $this->getTypeId(),
            'visible' => $this->getVisible(),
            'weight' => $this->getWeight()
        );
    }
    
    /**
     * (non-PHPdoc)
     * @see \LwcCmsContent\Model\ContentEntityInterface::__toString()
     */
    public function __toString()
    {
        return 'Content of type ' . $this->getTypeId() . ' / ID ' . $this->getId();
    }
}