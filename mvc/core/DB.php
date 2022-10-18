<?php

/**
 * Class DB
 */
class DB
{
    public $con;

    protected $servername = "multiple-choice.mysql.database.azure.com";

    protected $username = "it19tclcdt3";

    protected $password = "CNTTDT3@";

    protected $dbname = "multi";

    public function __construct()
    {
        $this->con = mysqli_connect($this->servername, $this->username, $this->password);
        mysqli_select_db($this->con, $this->dbname);
        mysqli_query($this->con, "SET NAMES 'utf8'");
    }
}