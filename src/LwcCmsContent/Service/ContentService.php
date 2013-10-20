<?php
namespace LwcCmsContent\Service;

use LwcCmsContent\Table\ContentTable;
use LwcCmsPage\Entity\RowEntityInterface;
use LwcCmsContent\Model\ContentEntityHydrator;

class ContentService
{

    /**
     *
     * @var ContentTable
     */
    protected $table;

    /**
     *
     * @var ContentEntityHydrator
     */
    protected $hydrator;

    /**
     *
     * @var array
     */
    protected $types = array();

    /**
     *
     * @param ContentTable $table
     * @param ContentEntityHydrator $hydrator
     * @param array $types
     */
    public function __construct(ContentTable $table, ContentEntityHydrator $hydrator, array $types = array())
    {
        $this->setTable($table);
        $this->setHydrator($hydrator);
        $this->setTypes($types);
    }

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
        return $this->types[$identifier];
    }

    /**
     *
     * @param array $types
     * @return \LwcCmsContent\Service\ContentService
     */
    public function setTypes(array $types)
    {
        $this->types = array();
        foreach ($types as $identifier => $className) {
            $this->addType($identifier, $className);
        }
        return $this;
    }

    /**
     *
     * @param string $identifier
     * @param string $className
     * @return \LwcCmsContent\Service\ContentService
     */
    public function addType($identifier, $className)
    {
        $this->types[trim($identifier)] = trim($className);
        return $this;
    }

    /**
     *
     * @return \LwcCmsContent\Table\ContentTable
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     *
     * @param ContentTable $table
     * @return \LwcCmsContent\Service\ContentService
     */
    public function setTable(ContentTable $table)
    {
        $this->table = $table;
        return $this;
    }

    /**
     *
     * @return \LwcCmsContent\Model\ContentEntityHydrator
     */
    public function getHydrator()
    {
        return $this->hydrator;
    }

    /**
     *
     * @param ContentEntityHydrator $hydrator
     * @return \LwcCmsContent\Service\ContentService
     */
    public function setHydrator(ContentEntityHydrator $hydrator)
    {
        $this->hydrator = $hydrator;
        return $this;
    }

    /**
     *
     * @param RowEntityInterface $row
     * @return \Zend\Db\ResultSet\ResultSet
     */
    public function getContentsForRow(RowEntityInterface $row)
    {
        $dataset = $this->getTable()->getContentsByRowId($row->getId());
        $contents = array();

        $hydrator = $this->getHydrator();

        foreach ($dataset as $arrayObject) {
            $identifier = $arrayObject['type_id'];
            $className = $this->getTypeClassName($identifier);
            if ($className === false) {
                throw new \Exception('Could not resolve content type: ' . $identifier);
            }
            $contents[] = $hydrator->hydrate($arrayObject->getArrayCopy(), new $className());
        }
        return $contents;
    }
}