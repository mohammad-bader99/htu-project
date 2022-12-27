<?php

namespace Core\Model;

use Core\Base\Model;

class Item extends Model
{

    public function out_of_stock()
    {
        $data = array();
        $result = $this->connection->query("SELECT * FROM $this->table WHERE quantity=0");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $data[] = $row;
            }
        }
        return $data;
    }
    
    public function top_expensive()
    {
        $data = array();
        $result = $this->connection->query("SELECT * FROM items ORDER BY selling_price DESC;");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function available_items()
    {
        $data = array();
        $result = $this->connection->query("SELECT * FROM $this->table WHERE quantity>0");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function get_by_name($name)
        {
            $result = $this->connection->query("SELECT * FROM $this->table WHERE item_name='$name'");

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_object()) {
                    $data = $row;
                }
            }
            return $data;
        }


}