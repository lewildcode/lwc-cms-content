<?php
namespace LwcCmsContent\Model\Component;

interface ImageAwareInterface
{

    /**
     *
     * @param Image $image
     */
    public function setImage(Image $image);

    /**
     *
     * @return Image
     */
    public function getImage();
}