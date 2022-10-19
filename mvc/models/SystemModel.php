<?php

/**
 * Class SystemModel
 */
class SystemModel extends DB
{
    public function checkExistAccount($email,$pass){
        $sql = "SELECT * FROM admin_user";
        $result = mysqli_query($this->con, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                if ($row['email'] == $email && md5($pass) === $row['password']) {
                    $_SESSION['is_admin'] = $row['level'];
                    $_SESSION['user_id'] = $row['user_id'];
                    return true;
                }
            }
        }
        return false;
    }
}
