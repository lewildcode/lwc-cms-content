<?php
namespace LwcCmsContent\Table;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class ContentTable extends TableGateway
{

    /**
     *
     * @param integer $id
     * @return \Zend\Db\ResultSet\ResultSet
     */
    public function getContentsByRowId($id)
    {
        $select = new Select($this->getTable());
        $select->order(array(
            'position ASC',
            'id ASC'
        ));
        $select->where('row_id = ' . (int) $id);
        return $this->selectWith($select);
    }
}