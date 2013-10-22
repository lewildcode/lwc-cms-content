<?php
namespace LwcCmsContent\Model\Component;

class Image
{

    /**
     *
     * @var string
     */
    protected $path;

    /**
     *
     * @var string
     */
    protected $title;

    /**
     *
     * @var string
     */
    protected $link;

    /**
     *
     * @var string
     */
    protected $classes;

    /**
     *
     * @return string
     */
    public function getClasses()
    {
        return $this->classes;
    }

    /**
     *
     * @param string $classes
     * @return \LwcCmsContent\Model\Component\Image
     */
    public function setClasses($classes)
    {
        $this->classes = trim($classes);
        return $this;
    }

    /**
     *
     * @param string $class
     * @return \LwcCmsContent\Model\Component\Image
     */
    public function addClass($class)
    {
        $this->classes .= ' ' . trim($class);
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     *
     * @param string $path
     * @return \LwcCmsContent\Model\Component\Image
     */
    public function setPath($path)
    {
        $this->path = trim($path);
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     *
     * @param string $title
     * @return \LwcCmsContent\Model\Component\Image
     */
    public function setTitle($title)
    {
        $this->title = trim($title);
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     *
     * @param string $link
     * @return \LwcCmsContent\Model\Component\Image
     */
    public function setLink($link)
    {
        $this->link = trim($link);
        return $this;
    }
}