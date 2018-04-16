<?php

/**
 * Class ConnectionMySql
 */
class ConnectionMySql
{
    /**
     * @var mysqli
     */
    protected $connection;

    /**
     * ConnectionMySql constructor.
     */
    public function __construct()
    {
        $this->connection = mysqli_connect(ConfigApp::HOST, ConfigApp::USER,
            ConfigApp::PASS, ConfigApp::DB);
        if (!$this->connection) {
            exec('No connection with DataBase');
        }
    }

    /**
     * @return mysqli
     */
    public function getConnection()
    {
        return $this->connection;
    }
}