<?php

/**
 * Class PrintModel
 */
class PrintModel extends DB
{
    public function getData($resultId)
    {
        $sql = "SELECT r.*,s.*,c.name FROM result r, student s, subject c 
        WHERE r.student_id = s.student_id AND c.subject_id = r.subject_id AND r.result_id = {$resultId}";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }
}