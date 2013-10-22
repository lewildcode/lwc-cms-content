<?php
namespace LwcCmsContent\Type;

use LwcCmsContent\Model\Component\ImageAwareInterface;
use LwcCmsContent\Model\Component\HeaderAwareInterface;
use LwcCmsContent\Model\Component\Header;
use LwcCmsContent\Model\Component\Image;
use LwcCmsContent\Model\AbstractContentEntity;

class Article extends AbstractContentEntity implements ImageAwareInterface, HeaderAwareInterface
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
     * @see \LwcCmsContent\Model\ContentEntityInterface::getTypeId()
     */
    public function getTypeId()
    {
        return 'lwc_article';
    }

    /**
     *
     * @param Image $image
     * @return \LwcCmsContent\Type\Article
     */
    public function setImage(Image $image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     *
     * @return \LwcCmsContent\Model\Component\Image
     */
    public function getImage()
    {
        if($this->image == null) {
            $this->setImage(new Image());
        }
        return $this->image;
    }

    /**
     *
     * @param Header $header
     * @return \LwcCmsContent\Type\Article
     */
    public function setHeader(Header $header)
    {
        $this->header = $header;
        return $this;
    }

    /**
     *
     * @return \LwcCmsContent\Model\Component\Header
     */
    public function getHeader()
    {
        if($this->header == null) {
            $this->setHeader(new Header());
        }
        return $this->header;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\Component\HeaderAwareInterface::getHeaderByline()
     */
    public function getHeaderByline()
    {
        return $this->getHeader()->getByline();
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\Component\HeaderAwareInterface::setHeaderByline()
     */
    public function setHeaderByline($byline)
    {
        $this->getHeader()->setByline($byline);
        return $this;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\Component\HeaderAwareInterface::getHeaderLink()
     */
    public function getHeaderLink()
    {
        return $this->getHeader()->getLink();
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\Component\HeaderAwareInterface::setHeaderLink()
     */
    public function setHeaderLink($link)
    {
        $this->getHeader()->setLink($link);
        return $this;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\Component\HeaderAwareInterface::getHeaderText()
     */
    public function getHeaderText()
    {
        return $this->getHeader()->getText();
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\Component\HeaderAwareInterface::setHeaderText()
     */
    public function setHeaderText($text)
    {
        $this->getHeader()->setText($text);
        return $this;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\Component\HeaderAwareInterface::getHeaderWeight()
     */
    public function getHeaderWeight()
    {
        return $this->getHeader()->getWeight();
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\Component\HeaderAwareInterface::setHeaderWeight()
     */
    public function setHeaderWeight($weight)
    {
        $this->getHeader()->setWeight($weight);
        return $this;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\Component\ImageAwareInterface::getImageClasses()
     */
    public function getImageClasses()
    {
        return $this->getImage()->getClasses();
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\Component\ImageAwareInterface::setImageClasses()
     */
    public function setImageClasses($classes)
    {
        $this->getImage()->setClasses($classes);
        return $this;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\Component\ImageAwareInterface::getImagePath()
     */
    public function getImagePath()
    {
        return $this->getImage()->getPath();
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\Component\ImageAwareInterface::setImagePath()
     */
    public function setImagePath($path)
    {
        $this->getImage()->setPath($path);
        return $this;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\Component\ImageAwareInterface::getImageTitle()
     */
    public function getImageTitle()
    {
        return $this->getImage()->getTitle();
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\Component\ImageAwareInterface::setImageTitle()
     */
    public function setImageTitle($title)
    {
        $this->getImage()->setTitle($title);
        return $this;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\Component\ImageAwareInterface::getImageLink()
     */
    public function getImageLink()
    {
        return $this->getImage()->getLink();
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\Model\Component\ImageAwareInterface::setImageLink()
     */
    public function setImageLink($link)
    {
        $this->getImage()->setLink($link);
        return $this;
    }
}