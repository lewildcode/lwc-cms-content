<?php
namespace LwcCmsContent\Type;

use LwcCmsContent\Model\AbstractContentEntity;
use LwcCmsContent\Type\DefinitionList\Definition;
use Zend\Json\Json;

class DefinitionList extends AbstractContentEntity
{

    /**
     *
     * @var string
     */
    protected $dlClass;

    /**
     *
     * @var array
     */
    protected $definitions = array();

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\ContentEntityInterface::getTypeId()
     */
    public function getTypeId()
    {
        return 'lwc_definitionlist';
    }

    /**
     *
     * @return string
     */
    public function getDlClass()
    {
        return $this->dlClass;
    }

    /**
     *
     * @param string $class
     * @return \LwcCmsContent\Type\DefinitionList
     */
    public function setDlClass($class)
    {
        $this->dlClass = trim($class);
        return $this;
    }

    /**
     *
     * @return array
     */
    public function getDefinitions()
    {
        return $this->definitions;
    }

    /**
     *
     * @param string $definitions
     * @return \LwcCmsContent\Type\DefinitionList
     */
    public function setDefinitions($definitions)
    {
        $decoded = Json::decode($definitions, Json::TYPE_ARRAY);

        $defObjList = array();
        if (is_array($decoded)) {
            foreach ($decoded as $definition) {
                $defObj = new Definition();
                $defObj->setTerm($definition['term']);
                $defObj->setDescriptions($definition['descriptions']);
                $defObjList[] = $defObj;
            }
        }

        $this->definitions = $defObjList;

        return $this;
    }
}