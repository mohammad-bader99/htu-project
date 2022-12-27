<?php

namespace Core\Model;

use Core\Base\Model;

class Transaction extends Model
{

    public function get_by_user_id()
    {
        $id=$_SESSION['user']['id'];
        $data = array();
        $result = $this->connection->query("SELECT * FROM reletional WHERE user_id=$id");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $data[] = $row;
            }
        }
        return $data;
    }
    
    public function get_by_transaction_id($t_id)
    {
        $data = array();
        $result = $this->connection->query("SELECT * FROM transactions WHERE id=$t_id");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $data[] = $row;
            }
        }
        return $data;
    }


}