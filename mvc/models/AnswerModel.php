 <?php

/**
 * Class AnswerModel
 */
class AnswerModel extends DB
{
    const TABLE_NAME = 'answer';

    /**
     * @param $answer
     * @param $isCorrect
     * @param $questionId
     * @return bool|mysqli_result
     */
    public function insert($answer, $isCorrect, $questionId)
    {
        $sql = "INSERT INTO {$this->getTableName()} (answer_description, is_correct, question_id)
                VALUES ('{$answer}', {$isCorrect}, {$questionId})";
        return mysqli_query($this->con, $sql);
    }

    /**
     * @param $questionId
     * @return array
     */
    public function getAnswerByQuestionId($questionId)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE question_id = {$questionId}";
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
    public function deleteAnswerByQuestionId($id)
    {
        $sql = "DELETE FROM {$this->getTableName()} WHERE question_id = {$id}";
        return mysqli_query($this->con, $sql);
    }

    /**
     * @param $questionId
     * @return array
     */
    public function getIsCorrect($questionId)
    {
        $sql = "SELECT answer_id FROM {$this->getTableName()} WHERE question_id = {$questionId} AND is_correct = 1";
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
}