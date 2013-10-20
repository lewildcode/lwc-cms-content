<?php
namespace LwcCmsContent\Model\Component;

class Header
{

    /**
     *
     * @var integer
     */
    protected $weight;

    /**
     *
     * @var string
     */
    protected $text;

    /**
     *
     * @var string
     */
    protected $byline;

    /**
     *
     * @var string
     */
    protected $link;

    /**
     *
     * @param integer $weight OPTIONAL
     */
    public function __construct($weight = null)
    {
        if($weight) {
            $this->setWeight($weight);
        }
    }

    /**
     *
     * @return number
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     *
     * @param integer $weight
     * @return \LwcCmsContent\Model\Component\Header
     */
    public function setWeight($weight)
    {
        $this->weight = (int) $weight;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     *
     * @param string $text
     * @return \LwcCmsContent\Model\Component\Header
     */
    public function setText($text)
    {
        $this->text = trim($text);
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getByline()
    {
        return $this->byline;
    }

    /**
     *
     * @param string $byline
     * @return \LwcCmsContent\Model\Component\Header
     */
    public function setByline($byline)
    {
        $this->byline = trim($byline);
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
     * @return \LwcCmsContent\Model\Component\Header
     */
    public function setLink($link)
    {
        $this->link = trim($link);
        return $this;
    }
}