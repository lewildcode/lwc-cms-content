<?php
namespace LwcCmsContent\Form;

use Zend\InputFilter\InputFilter;

class BodycopyFilter extends InputFilter
{

    public function __construct()
    {
        $this->add($this->getPosition());
        $this->add($this->getWeight());
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
            'filters' => array(
                array(
                    'name' => 'StripTags'
                ),
                array(
                    'name' => 'StringTrim'
                ),
                array(
                    'name' => 'Null'
                )
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
            'required' => false,
            'filters' => array(
                array(
                    'name' => 'Int'
                ),
                array(
                    'name' => 'Null'
                )
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
            'filters' => array(
                array(
                    'name' => 'Int'
                )
            ),
            'validators' => array(
                array(
                    'name' => 'Between',
                    'options' => array(
                        'min' => 1,
                        'max' => 12
                    )
                )
            )
        );
    }
}