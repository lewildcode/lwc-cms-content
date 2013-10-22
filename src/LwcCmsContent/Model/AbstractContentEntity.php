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
     * @var integer
     */
    protected $rowId;

    /**
     *
     * @var integer
     */
    protected $position;

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
     * @var string
     */
    protected $bodycopy;

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
     * @see \LwcCmsContent\Model\ContentEntityInterface::getRowId()
     */
    public function getRowId()
    {
        return $this->rowId;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\ContentEntityInterface::setRowId()
     */
    public function setRowId($rowId)
    {
        $this->rowId = (int) $rowId;
        return $this;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\ContentEntityInterface::getPosition()
     */
    public function getPosition()
    {
        if($this->position === 0) {
            $this->position = null;
        }
        return $this->position;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\ContentEntityInterface::setPosition()
     */
    public function setPosition($position)
    {
        $this->position = (int) $position;
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
     * @see \LwcCmsContent\Model\ContentEntityInterface::getBodycopy()
     */
    public function getBodycopy()
    {
        if($this->bodycopy === '') {
            $this->bodycopy = null;
        }
        return $this->bodycopy;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\ContentEntityInterface::setBodycopy()
     */
    public function setBodycopy($bodycopy)
    {
        $this->bodycopy = trim($bodycopy);
        return $this;
    }

    /**
     * (non-PHPdoc)
     * @see \LwcCmsContent\Model\ContentEntityInterface::getArrayCopy()
     */
    public function getArrayCopy()
    {
        return array(
            'row_id' => $this->getRowId(),
            'type_id' => $this->getTypeId(),
            'position' => $this->getPosition(),
            'visible' => $this->getVisible(),
            'weight' => $this->getWeight(),
            'bodycopy' => $this->getBodycopy()
        );
    }
}