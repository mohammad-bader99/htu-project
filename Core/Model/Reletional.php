<?php

namespace Core\Model;

use Core\Base\Model;


/**
 * handle operation on reletional table
 */
class Reletional extends Model
{


    /**
     * create new row by sql
     *
     * @param string $sql
     * @return void
     */
    public function create_by_sql($sql)
    {
        $this->connection->query($sql);
    }
    

    /**
     * delete row by sql
     *
     * @param string $sql
     * @return void
     */
    public function delete_by_sql($sql)
    {
        $this->connection->query($sql);
    }


}