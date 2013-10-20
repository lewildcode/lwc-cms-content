<?php
namespace LwcCmsContent\Model\Component;

interface HeaderAwareInterface
{

    /**
     *
     * @param Header $header
     */
    public function setHeader(Header $header);

    /**
     *
     * @return Header
     */
    public function getHeader();
}