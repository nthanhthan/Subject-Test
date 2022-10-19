<?php

/**
 * Class QuestionMappingModel
 */
class SubjectMappingModel extends DB
{
    const TABLE_NAME = 'subject_mapping';

    /**
     * @param $studentId
     * @param $subjectId
     * @return bool|mysqli_result
     */
    public function insert($studentId, $subjectId)
    {
        $sql = "INSERT INTO {$this->getTableName()} (subject_id, student_id) VALUES ({$subjectId}, {$studentId})";
        return mysqli_query($this->con, $sql);
    }

    /**
     * @param $examId
     * @return array
     */
    public function getSubjectMappingByIdVer2($examId)
    {
        $sql = "SELECT student_id FROM {$this->getTableName()} WHERE subject_id = {$examId}";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row['student_id'];
        }

        return $data;
    }

    /**
     * @param $examId
     * @return array
     */
    public function getSubjectMappingById($examId)
    {
        $sql = "SELECT student_id FROM {$this->getTableName()} WHERE subject_id = {$examId}";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }

    /**
     * @param $id
     * @return bool|mysqli_result
     */
    public function deleteMappingById($id)
    {
        $sql = "DELETE FROM {$this->getTableName()} WHERE subject_id = {$id}";
        return mysqli_query($this->con, $sql);
    }

    /**
     * @return string
     */
    public function getTableName()
    {
        return self::TABLE_NAME;
    }
}