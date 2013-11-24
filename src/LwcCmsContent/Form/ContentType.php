<?php
namespace LwcCmsContent\Form;

use Zend\Form\Form;

class ContentType extends Form
{

    /**
     *
     * @param string $name            
     * @param unknown $options            
     */
    public function __construct($name = null, $options = array())
    {
        parent::__construct($name, $options);
        
        $this->add($this->getTypeElement());
        $this->add($this->getSubmitElement());
        
        if(isset($options['types'])) {
            $this->get('type')->setValueOptions($options['types']);
        }
    }

    /**
     *
     * @return array
     */
    public function getSubmitElement()
    {
        return array(
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => array(
                'value' => 'Submit',
                'class' => 'btn btn-primary'
            )
        );
    }

    /**
     *
     * @return array
     */
    public function getTypeElement()
    {
        return array(
            'name' => 'type',
            'type' => 'select',
            'options' => array(
                'label' => 'Type',
                'label_attributes' => array(
                    'class' => 'control-label'
                ),
                'value_options' => array()
            ),
            'attributes' => array(
                'required' => 'required',
                'class' => 'form-control'
            )
        );
    }
}