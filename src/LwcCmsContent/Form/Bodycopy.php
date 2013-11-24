<?php
namespace LwcCmsContent\Form;

use Zend\Form\Element\Button;

class Bodycopy extends AbstractContentForm
{

    /**
     *
     * @param string $name            
     * @param array $options            
     */
    public function __construct($name = null, $options = array())
    {
        parent::__construct($name, $options);
        
        $this->add($this->getBodycopy());
        $this->add($this->getSubmitElement(), array(
            'priority' => - 100
        ));
    }

    /**
     *
     * @return array
     */
    public function getBodycopy()
    {
        return array(
            'name' => 'bodycopy',
            'options' => array(
                'label' => 'Content',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            ),
            'attributes' => array(
                'required' => 'required',
                'type' => 'textarea',
                'class' => 'form-control'
            )
        );
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
}