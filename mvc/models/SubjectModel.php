<?php

/**
 * Class SubjectModel
 */
class SubjectModel extends DB
{
    const LIMIT_PER_PAY = 8;

    const TABLE_NAME = 'subject';

    /**
     * @param $name
     * @param $description
     * @param $level
     * @param $themeId
     * @param $pass
     * @param $time
     * @return int|string
     */
    public function insert($name, $description, $level, $themeId, $pass, $time)
    {
        $password = password_hash($pass,PASSWORD_DEFAULT);
        $id = $_SESSION['user_id'];
        $sql = "INSERT INTO {$this->getTableName()} (name, description, level, theme_id, pass, time, user_id)
                VALUES ('{$name}', '{$description}', {$level}, {$themeId}, '{$password}', {$time}, {$id})";
        mysqli_query($this->con, $sql);
        return mysqli_insert_id($this->con);
    }

    /**
     * @return array
     */
    public function getAvgExamAndCountQues()
    {
        $sql = "SELECT sub.*, COUNT(mapping.mapping_id) AS question_number, th.name AS theme_name, a.fullname
                FROM subject AS sub
                LEFT JOIN question_mapping AS mapping on sub.subject_id = mapping.subject_id
                LEFT JOIN theme AS th ON sub.theme_id = th.theme_id
                LEFT JOIN admin_user AS a ON a.user_id = sub.user_id
                GROUP BY sub.subject_id";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }

    /**
     * @return array
     */
    public function getAvgExamAndCountStu()
    {
        $sql = "SELECT a.subject_id,COUNT(*) count_student,s.name FROM `subject_mapping` a 
        LEFT JOIN `subject` s ON s.subject_id = a.subject_id GROUP BY a.subject_id";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }

    /**
     * @param $id
     * @return string[]|null
     */
    public function getById($id)
    {
        $sql = "SELECT * FROM subject WHERE subject_id = {$id}";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }

    /**
     * @param $id
     * @param $name
     * @param $description
     * @param $level
     * @param $themeId
     * @param $pass
     * @param $time
     * @return bool|mysqli_result
     */
    public function update($id, $name, $description, $level, $themeId, $pass, $time)
    {
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "UPDATE {$this->getTableName()}
                SET name = '{$name}', description = '{$description}', level = {$level}, theme_id = {$themeId},
                    pass = '{$pass}', time = {$time}
                WHERE subject_id = {$id}";
        return mysqli_query($this->con, $sql);
    }

    /**
     * @param $id
     * @return array
     */
    public function getDataByThemeId($id, $start)
    {
        $limit = self::LIMIT_PER_PAY;
        $sql = "SELECT subject.*, COUNT(qm.mapping_id) AS ques_num FROM {$this->getTableName()}
                LEFT JOIN question_mapping qm ON subject.subject_id = qm.subject_id
                WHERE theme_id = {$id}
                GROUP BY subject.subject_id ORDER BY subject.created_at DESC LIMIT {$start}, {$limit}";
        $data = [];
        $result = mysqli_query($this->con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }

    /**
     * @param $name
     * @return array
     */
    public function getAnotherSubject($name)
    {
        $sql = "SELECT subject.*, COUNT(qm.mapping_id) AS ques_num FROM {$this->getTableName()}
                LEFT JOIN question_mapping qm ON subject.subject_id = qm.subject_id
                WHERE subject.name LIKE '%{$name}%'
                GROUP BY subject.subject_id";
        $data = [];
        $result = mysqli_query($this->con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }

    /**
     * @param $id
     * @return bool|mysqli_result
     */
    public function deleteById($id)
    {
        $sql = "DELETE FROM {$this->getTableName()} WHERE subject_id = {$id}";
        return mysqli_query($this->con, $sql);
    }

    /**
     * @param $id
     * @return string[]|null
     */
    public function getCount($id)
    {
        $sql = "SELECT COUNT(subject_id) AS sum FROM {$this->getTableName()} WHERE theme_id = {$id}";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }

    /**
     * @return string
     */
    public function getTableName()
    {
        return self::TABLE_NAME;
    }

    public function getAllSubject()
    {
        $data = [];
        $sql = "SELECT * FROM subject";
        $result = mysqli_query($this->con, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        return $data;
    }

    /**
     * @param $id
     * @return string[]|null
     */
    public function getAllSubjectById($id)
    {
        $sql = "SELECT * FROM subject WHERE theme_id = {$id}";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
        }
        return $data;
    }
}