<?php
namespace LwcCmsContent\Model\Component;

interface ImageAwareInterface
{

    /**
     *
     * @param string $path
     */
    public function setImagePath($path);

    /**
     *
     * @return string
     */
    public function getImagePath();

    /**
     *
     * @param string $classes
     */
    public function setImageClasses($classes);

    /**
     *
     * @return string
     */
    public function getImageClasses();

    /**
     *
     * @param string $title
     */
    public function setImageTitle($title);

    /**
     *
     * @return string
     */
    public function getImageTitle();

    /**
     *
     * @param string $link
     */
    public function setImageLink($link);

    /**
     *
     * @return string
     */
    public function getImageLink();
}