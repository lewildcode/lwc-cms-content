<?php
namespace LwcCmsContent\Model;

interface ContentEntityInterface
{
    /**
     * @return string
     */
    public function __toString();
    
    /**
     *
     * @return integer
     */
    public function getId();

    /**
     *
     * @param integer $id
     */
    public function setId($id);

    /**
     *
     * @return integer
     */
    public function getWeight();

    /**
     *
     * @param integer $weight
     */
    public function setWeight($weight);

    /**
     *
     * @return string
     */
    public function getTypeId();

    /**
     * @return boolean
     */
    public function getVisible();

    /**
     * @param boolean $visible
     */
    public function setVisible($visible);

    /**
     * @return array
     */
    public function getArrayCopy();
}