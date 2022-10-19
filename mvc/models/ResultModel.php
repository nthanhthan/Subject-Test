<?php

/**
 * Class ResultModel
 */
class ResultModel extends DB
{
    const TABLE_NAME = 'result';

    /**
     * @param $testId
     * @param $studentId
     * @param $result
     * @return int|string
     */
    public function insert($testId, $studentId, $result)
    {
        $sql = "INSERT INTO {$this->getTableName()} (subject_id, student_id, result)
                VALUES ({$testId}, {$studentId}, '{$result}')";
        mysqli_query($this->con, $sql);
        return mysqli_insert_id($this->con);
    }

    /**
     * @return array
     */
    public function getHistory()
    {
        $studentId = $_SESSION['id'];
        $sql = "SELECT rs.*, s.name subject_name, s.level, t.name FROM result AS rs
                LEFT OUTER JOIN subject s on s.subject_id = rs.subject_id
                LEFT JOIN theme t on s.theme_id = t.theme_id
                WHERE student_id = {$studentId} ORDER BY created_at DESC";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }

    /**
     * @param $resultId
     * @return array
     */
    public function getDetail($resultId)
    {
        $studentId = $_SESSION['id'];
        $sql = "SELECT rs.result, rm.question_id, rm.selected, s.name, q.question_name, q.is_multiple, s.subject_id 
                FROM result AS rs
                LEFT JOIN result_mapping rm on rs.result_id = rm.result_id
                LEFT JOIN subject s on rs.subject_id = s.subject_id
                LEFT JOIN question q on rm.question_id = q.question_id
                WHERE rm.result_id = {$resultId} AND student_id = {$studentId}";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }

    /**
     * @return string
     */
    public function getTableName()
    {
        return self::TABLE_NAME;
    }

    
    /**
     * @return array
     */
    public function getAllHistory()
    {
        $sql = "SELECT rs.*, s.name subject_name, s.level, t.name, st.fullname FROM result AS rs
                LEFT OUTER JOIN subject s on s.subject_id = rs.subject_id
                LEFT JOIN theme t on s.theme_id = t.theme_id
                LEFT JOIN student st on st.student_id = rs.student_id
                ORDER BY created_at DESC";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }

    public function getCountTest($id)
    {
        $sql = "SELECT COUNT(*) cnt,s.name 
        FROM result r, subject s
        WHERE r.subject_id = s.subject_id AND r.student_id = {$id} GROUP BY r.subject_id";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }

    public function getAllResultById($id)
    {
        $sql = "SELECT r.*,s.fullname FROM result r, student s WHERE r.student_id = s.student_id AND r.subject_id = {$id}";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }
}