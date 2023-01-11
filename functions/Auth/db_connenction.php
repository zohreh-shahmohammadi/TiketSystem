<?php
class DbConnection
{

    private $host = '';
    private $username = '';
    private $password = '';
    private $database = '';

    protected $connection;

    public function __construct()
    {

        if (!isset($this->connection)) {

            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

            if (!$this->connection) {
                echo 'database connection is failed!';
                exit;
            }
        }

        return $this->connection;
    }
}