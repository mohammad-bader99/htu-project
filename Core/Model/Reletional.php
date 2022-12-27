<?php

namespace Core\Model;

use Core\Base\Model;

class Reletional extends Model
{

    public function create_by_sql($sql)
    {
        $this->connection->query($sql);
    }
    
    public function delete_by_sql($sql)
    {
        $this->connection->query($sql);
    }


}