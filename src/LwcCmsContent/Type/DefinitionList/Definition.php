<?php
namespace LwcCmsContent\Type\DefinitionList;

class Definition
{

    /**
     *
     * @var string
     */
    protected $term;

    /**
     *
     * @var array
     */
    protected $descriptions = array();

    /**
     *
     * @return string
     */
    public function getTerm()
    {
        return $this->term;
    }

    /**
     *
     * @param string $term
     * @return \LwcCmsContent\Type\DefinitionList\Definition
     */
    public function setTerm($term)
    {
        $this->term = trim($term);
        return $this;
    }

    /**
     *
     * @param array $descriptions
     * @return \LwcCmsContent\Type\DefinitionList\Definition
     */
    public function setDescriptions(array $descriptions)
    {
        $this->descriptions = array();
        foreach ($descriptions as $description) {
            $this->addDescription($description);
        }
        return $this;
    }

    /**
     *
     * @param string $description
     * @TODO filtering
     * @return \LwcCmsContent\Type\DefinitionList\Definition
     */
    public function addDescription($description)
    {
        $this->descriptions[] = trim($description);
        return $this;
    }

    /**
     *
     * @return array
     */
    public function getDescriptions()
    {
        return $this->descriptions;
    }

    /**
     *
     * @param integer $index
     * @return string
     */
    public function getDescription($index)
    {
        if (! isset($this->descriptions[(int) $index])) {
            return false;
        }
        return $this->descriptions[(int) $index];
    }
}