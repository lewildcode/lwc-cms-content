<?php
namespace LwcCmsContent\Filter;

class Article extends AbstractContent
{
    /**
     *
     * @return array
     */
    public function getBody()
    {
        return array(
            'name' => 'body',
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