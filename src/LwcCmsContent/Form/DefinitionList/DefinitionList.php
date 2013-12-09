<?php
namespace LwcCmsContent\Form\DefinitionList;

use LwcCmsContent\Form\AbstractContentForm;

class DefinitionList extends AbstractContentForm
{

    /**
     *
     * @param string $name            
     * @param array $options            
     */
    public function __construct($name = null, $options = array())
    {
        parent::__construct($name, $options);
        
        $this->add($this->getTermElement());
        $this->add($this->getDescriptionElement());
    }

    /**
     *
     * @return array
     */
    public function getTermElement()
    {
        return array(
            'name' => 'term',
            'type' => 'text',
            'options' => array(
                'label' => 'Term',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            ),
            'attributes' => array(
                'required' => 'required',
                'class' => 'form-control'
            )
        );
    }

    /**
     *
     * @return array
     */
    public function getDescriptionElement()
    {
        return array(
            'name' => 'descriptions',
            'type' => 'textarea',
            'options' => array(
                'label' => 'Description',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            ),
            'attributes' => array(
                'required' => 'required',
                'class' => 'form-control'
            )
        );
    }
}