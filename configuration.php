<?php
session_start();
class config
{
    private $server     = "localhost";
    private $user       = "root";
    private $pass       = "";
    private $database   = "ukk";
    protected $db;

    function __construct()
    {
        $this->connect_database();
    }

    protected function connect_database()
    {
        $this->db = new mysqli($this->server, $this->user, $this->pass, $this->database);

        if (!$this->db) {
            die('gagal terkonek ke database ' . $this->db->connect_error());
        }
    }
}
