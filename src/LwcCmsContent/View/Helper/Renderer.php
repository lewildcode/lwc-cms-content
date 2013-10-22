<?php
namespace LwcCmsContent\View\Helper;

use Zend\View\Helper\AbstractHelper;
use LwcCmsContent\Model\ContentEntityInterface;

class Renderer extends AbstractHelper
{

    /**
     *
     * @var array
     */
    protected $contentTypes;

    /**
     *
     * @param array $contentTypes
     */
    public function __construct(array $contentTypes)
    {
        $this->contentTypes = $contentTypes;
    }

    /**
     *
     * @param ContentEntityInterface $content
     * @return string
     */
    public function __invoke(ContentEntityInterface $content)
    {
        $helper = $this->contentTypes[$content->getTypeId()]['view_helper'];
        return $this->getView()->$helper($content);
    }
}