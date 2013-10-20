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
     * @var array
     */
    protected $classes = array(
        'image'
    );

    /**
     *
     * @return array
     */
    public function getClasses()
    {
        return $this->classes;
    }

    /**
     *
     * @param array $classes
     * @return \LwcCmsContent\Model\Component\Image
     */
    public function setClasses(array $classes)
    {
        $this->classes = array();

        foreach ($classes as $class) {
            $this->addClass($class);
        }
        return $this;
    }

    /**
     *
     * @param string $class
     * @return \LwcCmsContent\Model\Component\Image
     */
    public function addClass($class)
    {
        $this->classes[] = trim($class);
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