<?php

namespace Core\Model;

use Core\Base\Model;


/**
 * handle operations on user table
 */
class User extends Model
{


    /**
     * check the username and password
     *
     * @param string $username
     * @return void
     */
    public function check_username(string $username)
    {
        //$result = $this->connection->query("SELECT * FROM $this->table WHERE username='$username'");

        $stmt=$this->connection->prepare("SELECT * FROM $this->table WHERE username=?");
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $result=$stmt->get_result();

        if ($result) { // if there is an error in the connection or if there is syntax error in the SQL.
            if ($result->num_rows > 0) {
                return $result->fetch_object();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
