<?php

/**
 * Class ResultMapping
 */
class ResultMapping extends DB
{
    const TABLE_NAME = 'result_mapping';

    /**
     * @param $resultId
     * @param $questionId
     * @param $selected
     * @return bool|mysqli_result
     */
    public function insert($resultId, $questionId, $selected)
    {
        $sql = "INSERT INTO {$this->getTableName()} (result_id, question_id, selected)
                VALUES ({$resultId}, {$questionId}, '{$selected}')";
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