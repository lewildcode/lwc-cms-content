<?php
namespace LwcCmsContent\Service;

use LwcCmsPage\Entity\RowEntityInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Stdlib\Hydrator\HydratorInterface;
use LwcCmsContent\Model\ContentEntityInterface;
use LwcCmsContent\Model\AbstractContentEntity;

class ContentService
{

    /**
     *
     * @var array
     */
    protected $gateways = array();

    /**
     *
     * @var HydratorInterface
     */
    protected $hydrator;

    /**
     *
     * @var array
     */
    protected $types = array();

    /**
     *
     * @return array
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     *
     * @param string $identifier
     * @return boolean
     */
    public function hasType($identifier)
    {
        return isset($this->types[trim($identifier)]);
    }

    /**
     *
     * @param string $identifier
     * @return boolean
     *         string
     */
    public function getTypeClassName($identifier)
    {
        if (! $this->hasType($identifier)) {
            return false;
        }
        return $this->types[$identifier]['class_name'];
    }

    /**
     *
     * @param array $types
     * @return \LwcCmsContent\Service\ContentService
     */
    public function setTypes(array $types)
    {
        $this->types = array();
        foreach ($types as $identifier => $specs) {
            $this->addType($identifier, $specs);
        }
        return $this;
    }

    /**
     *
     * @param string $identifier
     * @param array $specs
     * @return \LwcCmsContent\Service\ContentService
     */
    public function addType($identifier, array $specs)
    {
        $this->types[trim($identifier)] = $specs;
        return $this;
    }

    /**
     *
     * @param string $name
     * @return TableGateway
     */
    public function getTable($name)
    {
        if (! isset($this->gateways[$name])) {
            return false;
        }
        return $this->gateways[$name];
    }

    /**
     *
     * @param TableGateway $table
     * @return \LwcCmsContent\Service\ContentService
     */
    public function addTable(TableGateway $table)
    {
        $this->gateways[$table->getTable()] = $table;
        return $this;
    }

    /**
     *
     * @return \Zend\Stdlib\Hydrator\HydratorInterface
     */
    public function getHydrator()
    {
        return $this->hydrator;
    }

    /**
     *
     * @param HydratorInterface $hydrator
     * @return \LwcCmsContent\Service\ContentService
     */
    public function setHydrator(HydratorInterface $hydrator)
    {
        $this->hydrator = $hydrator;
        return $this;
    }

    /**
     *
     * @param string $type
     * @return string
     */
    protected function getTypeTableName($type)
    {
        return 'cms_content_' . $type;
    }

    /**
     *
     * @param string $type
     * @param Adapter $dbAdapter
     * @return \Zend\Db\TableGateway\TableGateway
     */
    protected function getTypeTableGateway($type, Adapter $dbAdapter)
    {
        $tableName = $this->getTypeTableName($type);
        return new TableGateway($tableName, $dbAdapter);
    }

    /**
     *
     * @param \ArrayObject $cms
     * @param \ArrayObject|false $typeData
     * @return array
     */
    protected function getContentArray(\ArrayObject $cms, $typeData)
    {
        if (! $typeData instanceof \ArrayObject) {
            return $cms->getArrayCopy();
        }
        return array_merge($cms->getArrayCopy(), $typeData->getArrayCopy());
    }

    /**
     *
     * @return \Zend\Db\Adapter\AdapterInterface
     */
    protected function getCmsAdapter()
    {
        return $this->getTable('cms_content')->getAdapter();
    }

    /**
     *
     * @param RowEntityInterface $row
     * @return \Zend\Db\ResultSet\ResultSet
     */
    public function getContentsForRow(RowEntityInterface $row)
    {
        $cms = $this->getTable('cms_content');
        $dbAdapter = $this->getCmsAdapter();

        $contents = array();
        $hydrator = $this->getHydrator();
        foreach ($cms->getContentsByRowId($row->getId()) as $arrayObject) {
            $type = $arrayObject['type_id'];
            $className = $this->getTypeClassName($type);
            if ($className === false) {
                throw new \Exception('Could not resolve content type: ' . $type);
            }

            $tableGateway = $this->getTypeTableGateway($type, $dbAdapter);
            $this->addTable($tableGateway);

            $type = $tableGateway->select('content_id = ' . (int) $arrayObject['id'])->current();
            $contentArray = $this->getContentArray($arrayObject, $type);
            $contents[] = $hydrator->hydrate($contentArray, new $className());
        }
        return $contents;
    }

    /**
     *
     * @param integer $id
     * @return ContentEntityInterface
     */
    public function getContentById($id)
    {
        $table = $this->getTable('cms_content');
        // TODO join
        return $table->select('id = ' . (int) $id)->current();
    }

    /**
     *
     * @param \ArrayObject $arrayObject
     * @return boolean|AbstractContentEntity
     */
    public function getContentByCmsObject(\ArrayObject $arrayObject)
    {
        $type = $arrayObject['type_id'];
        if(!$this->hasType($type)) {
            return false;
        }
        $cmsId = $arrayObject['id'];
        $table = $this->getTypeTableGateway($type, $this->getCmsAdapter());
        $typedContent = $table->select('content_id = ' . $cmsId)->current();
        $contentArray = $this->getContentArray($arrayObject, $typedContent);
        $className = $this->getTypeClassName($type);
        return $this->getHydrator()->hydrate($contentArray, new $className());
    }

    /**
     *
     * @param ContentEntityInterface $content
     * @return integer
     */
    public function save(ContentEntityInterface $content)
    {
        $table = $this->getTable('cms_content');
        $data = $content->getArrayCopy();
        if ($id = $content->getId()) {
            return $table->update($data, 'id = ' . (int) $id);
        }
        return $table->insert($data);
    }
}