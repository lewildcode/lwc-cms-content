<?php
namespace LwcCmsContent\Form\Bodycopy;

use LwcCmsContent\Form\AbstractContentForm;

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
}