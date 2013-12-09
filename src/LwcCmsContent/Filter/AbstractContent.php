<?php
namespace LwcCmsContent\Filter;

use Zend\InputFilter\InputFilter;

abstract class AbstractContent extends InputFilter
{

    public function __construct()
    {
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