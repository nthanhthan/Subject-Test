<?php

/**
 * Class Theme
 */
class ThemeModel extends DB
{
    const TABLE_NAME = 'theme';

    const LIMIT_PER_PAY = 16;

    /**
     * Insert new record.
     * @param $name
     * @param $description
     * @return bool|mysqli_result
     */
    public function insert($name, $description)
    {
        $id = $_SESSION['user_id'];
        $sql = "INSERT INTO {$this->getTableName()} (name, description, user_id) VALUES ('{$name}', '{$description}', {$id})";
        return mysqli_query($this->con, $sql);
    }

    /**
     * Update record.
     * @param $id
     * @param $name
     * @param $description
     * @return bool|mysqli_result
     */
    public function update($id, $name, $description)
    {
        $sql = "UPDATE {$this->getTableName()} SET name = '{$name}', description = '{$description}' WHERE theme_id = {$id}";
        return mysqli_query($this->con, $sql);
    }

    /**
     * Get table name.
     * @return string
     */
    public function getTableName()
    {
        return self::TABLE_NAME;
    }

    /**
     * Kiểm tra tên chủ đề đã tồn tại chưa.
     * Hàm sẽ trả về số dòng với tên chủ đề.
     * @param $name
     * @return int
     */
    public function checkNameExists($name)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE name = '{$name}'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_num_rows($result);
    }

    /**
     * Get record by id.
     * @param $id
     * @return string|string[]|null
     */
    public function getById($id)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE theme_id = {$id}";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }

    /**
     * Get list theme.
     * @return array|mixed|string
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
     * Delete record by id.
     * @param $id
     * @return bool|mysqli_result
     */
    public function deleteById($id)
    {
        $sql = "DELETE FROM {$this->getTableName()} WHERE theme_id = {$id}";
        return mysqli_query($this->con, $sql);
    }

    /**
     * @param $start
     * @return array
     */
    public function getListAndCountTest($start)
    {
        $limit = self::LIMIT_PER_PAY;
        $sql = "SELECT theme.*, COUNT(s.subject_id) AS test_number FROM theme
                LEFT JOIN subject s ON theme.theme_id = s.theme_id
                GROUP BY theme.theme_id LIMIT {$start}, {$limit}";
        $data = [];
        $result = mysqli_query($this->con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }

    /**
     * @return array
     */
    public function getSumTheme()
    {
        $sql = "SELECT COUNT(theme_id) AS theme_number FROM theme";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }

    /**
     * @return string[]|null
     */
    public function getNewThemes()
    {
        $sql = "SELECT theme.*, COUNT(s.subject_id) AS test_number FROM theme
                LEFT JOIN subject s ON theme.theme_id = s.theme_id
                GROUP BY theme.theme_id LIMIT 0, 5";
        $data = [];
        $result = mysqli_query($this->con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }

    /**
     * @return array
     */
    public function getListAndCountTestById($q)
    {
        $key = '%'.$q.'%';
        $sql = "SELECT theme.*, COUNT(s.subject_id) AS test_number FROM theme
                LEFT JOIN subject s ON theme.theme_id = s.theme_id WHERE theme.name LIKE '".$key."' GROUP BY theme.theme_id";
        $data = [];
        $result = mysqli_query($this->con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }
}
