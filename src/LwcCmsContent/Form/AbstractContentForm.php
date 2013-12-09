<?php
namespace LwcCmsContent\Form;

use Zend\Form\Form;
use Zend\Form\Exception\InvalidArgumentException;
use Zend\InputFilter\InputFilterInterface;
use LwcCmsContent\Filter\AbstractContent;

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
        
        $this->add($this->getWeight());
        $this->add($this->getSubmitElement(), array(
            'priority' => - 100
        ));
    }
    
    /**
     * (non-PHPdoc)
     * @see \Zend\Form\Form::setInputFilter()
     */
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        if(!$inputFilter instanceof AbstractContent) {
            throw new InvalidArgumentException('AbstractContent filter needed!');
        }
        return parent::setInputFilter($inputFilter);
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
}