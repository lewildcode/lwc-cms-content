<?php
namespace LwcCmsContent\Model;

use LwcCmsContent\Model\Component\ImageAwareInterface;
use LwcCmsContent\Model\Component\HeaderAwareInterface;
use LwcCmsContent\Model\Component\Header;
use LwcCmsContent\Model\Component\Image;

class SectionEntity extends AbstractContentEntity implements ImageAwareInterface, HeaderAwareInterface
{

    /**
     *
     * @var Header
     */
    protected $header;

    /**
     *
     * @var Image
     */
    protected $image;

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\Component\HeaderAwareInterface::setHeader()
     */
    public function setHeader(Header $header)
    {
        $this->header = $header;
        return $this;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\Component\HeaderAwareInterface::getHeader()
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\Component\ImageAwareInterface::setImage()
     */
    public function setImage(Image $image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\Component\ImageAwareInterface::getImage()
     */
    public function getImage()
    {
        return $this->image;
    }
}