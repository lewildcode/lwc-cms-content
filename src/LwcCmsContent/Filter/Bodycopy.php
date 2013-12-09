<?php
namespace LwcCmsContent\Filter;

class Bodycopy extends AbstractContent
{
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
}