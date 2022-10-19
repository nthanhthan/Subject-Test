<?php

/**
 * Class TeacherModel
 */
class TeacherModel extends DB
{
    function getAllTeacher()
    {
        $data = [];
        $id = $_SESSION['user_id'];
        $sql = "SELECT * FROM admin_user WHERE NOT user_id = $id";
        $result = mysqli_query($this->con, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
               $data[] = $row;
            }
        }
        return $data;
    }

    /**
     * @param $id
     * @return string[]|null
     */
    public function getById($id)
    {
        $sql = "SELECT * FROM admin_user WHERE user_id = {$id}";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function insert($name, $email, $pass)
    {
        $pass = md5($pass);
        $sql = "INSERT INTO admin_user (email, password, fullname, level) 
                VALUES ('{$email}', '{$pass}', '{$name}', 1)";
        mysqli_query($this->con, $sql);
        return mysqli_insert_id($this->con);
    }

    public function update($id, $name, $email, $pass)
    {
        $pass = md5($pass);
        $sql = "UPDATE admin_user SET fullname = '{$name}', email = '{$email}', password = '{$pass}' WHERE user_id = {$id}";
        mysqli_query($this->con, $sql);
        return mysqli_insert_id($this->con);
    }

    /**
     * @param $id
     * @return bool|mysqli_result
     */
    public function deleteById($id)
    {
        $sql = "DELETE FROM admin_user WHERE user_id = {$id}";
        return mysqli_query($this->con, $sql);
    }
}
