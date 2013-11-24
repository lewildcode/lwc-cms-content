<?php
namespace LwcCmsContent\Form;

use Zend\Form\Form;

abstract class AbstractContentForm extends Form
{

    /**
     *
     * @param string $name            
     * @param array $options            
     */
    public function __construct($name = null, $options = array())
    {
        parent::__construct($name, $options);
        
        $this->add($this->getPosition());
        $this->add($this->getWeight());
    }

    /**
     *
     * @return array
     */
    public function getWeight()
    {
        return array(
            'name' => 'weight',
            'type' => 'number',
            'options' => array(
                'label' => 'Weight (width)',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            ),
            'attributes' => array(
                'placeholder' => 'Value between 1 - 12',
                'min' => 1,
                'max' => 12,
                'required' => 'required',
                'class' => 'form-control'
            )
        );
    }

    /**
     *
     * @return array
     */
    public function getPosition()
    {
        return array(
            'name' => 'position',
            'type' => 'number',
            'options' => array(
                'label' => 'Position',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            ),
            'attributes' => array(
                'class' => 'form-control'
            )
        );
    }
}