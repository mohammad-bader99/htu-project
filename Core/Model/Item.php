<?php

namespace Core\Model;

use Core\Base\Model;


/**
 * handle operation on the items table
 */
class Item extends Model
{


    /**
     * get all out of stock items from the databse
     *
     * @return array $data
     */
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
    

    /**
     * get top expensive items from the database
     *
     * @return array $data
     */
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


    /**
     * return availabe items to sell from the database
     *
     * @return array $data
     */
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


    /**
     * get item from the database by its name
     *
     * @param string $name
     * @return array $data
     */
    public function get_by_name($name)
        {
           // $result = $this->connection->query("SELECT * FROM $this->table WHERE item_name='$name'");

           $stmt=$this->connection->prepare("SELECT * FROM $this->table WHERE item_name=?");
           $stmt->bind_param('s',$name);
           $stmt->execute();
           $result=$stmt->get_result();


            if ($result->num_rows > 0) {
                while ($row = $result->fetch_object()) {
                    $data = $row;
                }
            }
            return $data;
        }


}