<?php

/**
 * Class QuestionModel
 */
class QuestionModel extends DB
{
    const TABLE_NAME = 'question';

    /**
     * @param $name
     * @param $isMultiple
     * @param $fileImg
     * @param $level
     * @param $video
     * @return int|string
     */
    public function insert($name, $isMultiple, $fileImg, $level, $video)
    {
        $folder = $_SERVER['DOCUMENT_ROOT'].'/multiple-choice';
        $img_name = date('Y_m_d_H_i_s'). '_' .$fileImg['name'];
        $tmp_name = $fileImg['tmp_name'];
        $videoName = date('Y_m_d_H_i_s'). '_' .$video['name'];
        $id = $_SESSION['user_id'];
        if (!move_uploaded_file($tmp_name, $folder.'/uploads/images/'.$img_name)) {
            $img_name = '';
        }

        if (!move_uploaded_file($video['tmp_name'], $folder.'/uploads/videos/'.$videoName)) {
            $videoName = '';
        }

        $sql = "INSERT INTO {$this->getTableName()} (question_name, is_multiple, image, level, video, user_id) 
                VALUES ('{$name}', '{$isMultiple}', '{$img_name}', {$level}, '{$videoName}', {$id})";
        mysqli_query($this->con, $sql);
        return mysqli_insert_id($this->con);

    }

    /**
     * @return array
     */
    public function getList()
    {
        $sql = "SELECT a.*,b.fullname FROM {$this->getTableName()} a, admin_user b WHERE a.user_id = b.user_id";
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
        $sql = "SELECT * FROM {$this->getTableName()} WHERE question_id = {$id}";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }

    /**
     * @param $id
     * @param $name
     * @param $isMultiple
     * @param $level
     * @param $fileImg
     * @param $video
     * @return bool|mysqli_result
     */
    public function update($id, $name, $isMultiple, $level, $fileImg, $video)
    {
        $folder = $_SERVER['DOCUMENT_ROOT'].'/multiple-choice';
        $img_name = date('Y_m_d_H_i_s'). '_' .$fileImg['name'];
        $tmp_name = $fileImg['tmp_name'];
        $videoName = date('Y_m_d_H_i_s'). '_' .$video['name'];
        $sql = "UPDATE {$this->getTableName()} SET question_name = '{$name}', is_multiple = {$isMultiple}, level = {$level} ";
        if (move_uploaded_file($tmp_name, $folder.'/uploads/images/'.$img_name)) {
            $sql .= ", image = '{$img_name}'";
        }

        if (move_uploaded_file($video['tmp_name'], $folder.'/uploads/videos/'.$videoName)) {
            $sql .= ", video = '{$videoName}'";
        }
        $sql .= " WHERE question_id = {$id}";
        return mysqli_query($this->con, $sql);
    }

    /**
     * @return string
     */
    public function getTableName()
    {
        return self::TABLE_NAME;
    }

    /**
     * @param $id
     * @return bool|mysqli_result
     */
    public function deleteById($id)
    {
        $sql = "DELETE FROM {$this->getTableName()} WHERE question_id = {$id}";
        return mysqli_query($this->con, $sql);
    }
}