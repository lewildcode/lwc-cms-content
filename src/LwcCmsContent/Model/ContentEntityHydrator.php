<?php

namespace LwcCmsContent\Model;

use Zend\Stdlib\Hydrator\ClassMethods;
use LwcCmsContent\Model\Component\HeaderAwareInterface;
use LwcCmsContent\Model\Component\Header;
use LwcCmsContent\Model\Component\ImageAwareInterface;
use LwcCmsContent\Model\Component\Image;

class ContentEntityHydrator extends ClassMethods
{
    /**
     * (non-PHPdoc)
     * @see \Zend\Stdlib\Hydrator\ClassMethods::hydrate()
     */
    public function hydrate(array $data, $object)
    {
        if(!$object instanceof ContentEntityInterface) {
            throw new \Exception('Hydration only accepts ContentEntityInterface');
        }
        if($object instanceof HeaderAwareInterface) {
            $head = parent::hydrate($this->extractWithPrefix($data, 'header_'), new Header());
            $data['header'] = $head;
        }
        if($object instanceof ImageAwareInterface) {
            $img = parent::hydrate($this->extractWithPrefix($data, 'image_'), new Image());
            $data['image'] = $img;
        }

        return parent::hydrate($data, $object);
    }

    /**
     *
     * @param array $data
     * @param string $prefix
     * @return array
     */
    protected function extractWithPrefix(array $data, $prefix)
    {
        $filtered = array();
        $length = strlen($prefix);
        foreach($data as $key => $value) {
            if(substr($key, 0, $length) == $prefix) {
                $filtered[substr($key, $length)] = $value;
            }
        }
        return $filtered;
    }
}