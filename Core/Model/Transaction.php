<?php

namespace Core\Model;

use Core\Base\Model;


/**
 * handle operations on transaction table
 */
class Transaction extends Model
{


    /**
     * get all transactions by user id
     *
     * @return array $data
     */
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
    

    /**
     * get transaction by id
     *
     * @param integer $t_id
     * @return array $data
     */
    public function get_by_transaction_id($t_id)
    {
        $data = array();
        //$result = $this->connection->query("SELECT * FROM transactions WHERE id=$t_id AND SUBSTRING(created_at, 1, 10)=date(NOW())");
          
        $stmt=$this->connection->prepare("SELECT * FROM transactions WHERE id=? AND SUBSTRING(created_at, 1, 10)=date(NOW())");
        $stmt->bind_param('i',$t_id);
        $stmt->execute();
        $result=$stmt->get_result();


        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                     $data[] = $row;
            }
        }
        else{
            $data=array('');
        }
        return $data;
    }


}