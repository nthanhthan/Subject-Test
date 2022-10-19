<?php

/**
 * Class StudentModel
 */
class StudentModel extends DB
{
    public function checkExistAccount($email,$pass){
        $sql = "SELECT * FROM student";
        $result = mysqli_query($this->con, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                if ($row['email'] == $email && md5($pass) === $row['password']) {
                    $_SESSION['fullname'] = $row['fullname'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['id'] = $row['student_id'];
                    return true;
                }
            }
        }
        return false;
    }

    public function contact($data){
        $id = $data['id'];
        $name = $data['title'];
        $mess = $data['message'];
        $sql = "INSERT INTO idea(`student_id`,`title`,`content`) VALUES ($id,'$name','$mess')";
        return mysqli_query($this->con, $sql);
    }

    function getAllContact()
    {
        $data = [];
        $sql = "SELECT i.*,s.fullname,s.email FROM idea i,student s WHERE i.student_id = s.student_id";
        $result = mysqli_query($this->con, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
               $data[] = $row;
            }
        }
        return $data;
    }

    function getAllStudent()
    {
        $data = [];
        $sql = "SELECT * FROM student";
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
        $sql = "SELECT * FROM student WHERE student_id = {$id}";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function insert($name, $email, $phone, $pass, $card, $birthday, $class)
    {
        $pass = md5($pass);
        $sql = "INSERT INTO student (email, password, fullname, birthday, card, phone, class) 
                VALUES ('{$email}', '{$pass}' , '{$name}', '{$birthday}', '{$card}', '{$phone}', '{$class}')";
        mysqli_query($this->con, $sql);
        return mysqli_insert_id($this->con);
    }

    public function update($id, $name, $email, $phone, $pass, $card, $birthday)
    {
        $pass = md5($pass);
        $sql = "UPDATE student SET fullname = '{$name}', email = '{$email}', phone = '{$phone}', password = '{$pass}', card = '{$card}', birthday = '{$birthday}', class = '{$class}' WHERE student_id = {$id}";
        mysqli_query($this->con, $sql);
        return mysqli_insert_id($this->con);
    }

    /**
     * @param $id
     * @return bool|mysqli_result
     */
    public function deleteById($id)
    {
        $sql = "DELETE FROM student WHERE student_id = {$id}";
        return mysqli_query($this->con, $sql);
    }

    /**
     * @param $email
     * @return string[]|null
     */
    function getByEmail($email)
    {
        $sql = "SELECT * FROM student WHERE email = '{$email}'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }

     /**
     * Verify account by email
     * @param $email
     * @return bool|mysqli_result
     */
    function updateVerify($email)
    {
        $sql = "UPDATE student SET status = 1 WHERE email='{$email}'";
        return mysqli_query($this->con, $sql);
    }
}
