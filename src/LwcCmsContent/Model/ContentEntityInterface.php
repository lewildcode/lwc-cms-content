<?php
namespace LwcCmsContent\Model;

interface ContentEntityInterface
{

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
    public function getPosition();

    /**
     *
     * @param integer $position
     */
    public function setPosition($position);

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
    public function getBodycopy();

    /**
     *
     * @param string $bodycopy
     */
    public function setBodycopy($bodycopy);

    /**
     *
     * @return string
     */
    public function getTypeId();

    /**
     *
     * @return integer
     */
    public function getRowId();

    /**
     *
     * @param integer $rowId
     */
    public function setRowId($rowId);

    /**
     * @return boolean
     */
    public function getVisible();

    /**
     * @param boolean $visible
     */
    public function setVisible($visible);
}