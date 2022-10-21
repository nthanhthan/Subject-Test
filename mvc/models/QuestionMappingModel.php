<?php

/**
 * Class QuestionMappingModel
 */
class QuestionMappingModel extends DB
{
    const TABLE_NAME = 'question_mapping';

    /**
     * @param $questionId
     * @param $subjectId
     * @return bool|mysqli_result
     */
    public function insert($questionId, $subjectId)
    {
        $sql = "INSERT INTO {$this->getTableName()} (question_id, subject_id) VALUES ({$questionId}, {$subjectId})";
        return mysqli_query($this->con, $sql);
    }

    /**
     * @param $examId
     * @return array
     */
    public function getQuestionMappingById($examId)
    {
        $sql = "SELECT question_id FROM {$this->getTableName()} WHERE subject_id = {$examId}";
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
     * @param $id
     * @return string[]|null
     */
    public function getDataMapping($id)
    {
        $sql = "SELECT main_table.*, q.* FROM {$this->getTableName()} AS main_table
                LEFT JOIN question q ON q.question_id = main_table.question_id
                WHERE main_table.subject_id = {$id} ORDER BY RAND()";
        $data = [];
        $result = mysqli_query($this->con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }

    /**
     * @param $subjectId
     * @param $questionIds
     * @return array
     */
    public function getAnotherMapping($subjectId, $questionIds)
    {
        $sql = "SELECT q.question_id, q.question_name, q.is_multiple, s.name, s.level
                FROM question_mapping qm
                LEFT JOIN question q on q.question_id = qm.question_id
                LEFT JOIN subject s on qm.subject_id = s.subject_id
                where qm.subject_id = {$subjectId} and qm.question_id NOT IN ($questionIds)";
        $data = [];
        $result = mysqli_query($this->con, $sql);
        if ($result != '') {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }

        return $data;
    }

    /**
     * @param $testId
     * @return string[]|null
     */
    public function getCount($testId)
    {
        $sql = "SELECT COUNT(mapping_id) AS count 
                FROM {$this->getTableName()} WHERE subject_id = {$testId}";
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
}