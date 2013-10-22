<?php
namespace LwcCmsContent\Model\Component;

interface HeaderAwareInterface
{

    /**
     * @param string $text
     */
    public function setHeaderText($text);

    /**
     *
     * @return string
     */
    public function getHeaderText();

    /**
     *
     * @param integer $weight
     */
    public function setHeaderWeight($weight);

    /**
     *
     * @return integer
    */
    public function getHeaderWeight();

    /**
     * @param string $byline
     */
    public function setHeaderByline($byline);

    /**
     *
     * @return string
    */
    public function getHeaderByline();

    /**
     * @param string $link
     */
    public function setHeaderLink($link);

    /**
     *
     * @return string
    */
    public function getHeaderLink();
}