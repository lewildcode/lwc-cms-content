<?php
namespace LwcCmsContent\Service;

class TypeService
{

    /**
     *
     * @var array
     */
    protected $types = array();

    /**
     *
     * @param array $types            
     */
    public function __construct(array $types = array())
    {
        $this->setTypes($types);
    }

    /**
     *
     * @return array
     */
    public function getTypes()
    {
        return $this->types;
    }
    
    /**
     * 
     * @return array
     */
    public function getTypesKeyValue()
    {
        $types = array();
        foreach($this->getTypes() as $type => $specs) {
            $types[$type] = $specs['class_name'];
        }
        return $types;
    }

    /**
     *
     * @param string $identifier            
     * @return boolean
     */
    public function hasType($identifier)
    {
        return isset($this->types[trim($identifier)]);
    }

    /**
     *
     * @param array $types            
     * @return \LwcCmsContent\Service\TypeService
     */
    public function setTypes(array $types)
    {
        $this->types = array();
        foreach ($types as $identifier => $specs) {
            $this->addType($identifier, $specs);
        }
        return $this;
    }

    /**
     *
     * @param string $type            
     * @return string
     */
    public function getClassName($type)
    {
        if (! $this->hasType($type)) {
            return false;
        }
        return $this->types[$type]['class_name'];
    }

    /**
     *
     * @param string $identifier            
     * @param array $specs            
     * @return \LwcCmsContent\Service\TypeService
     */
    public function addType($identifier, array $specs)
    {
        $this->types[trim($identifier)] = $specs;
        return $this;
    }
}