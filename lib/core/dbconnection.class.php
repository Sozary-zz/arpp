<?php

define('HOST', '127.0.0.1:3307');
define('USER', 'root');
define('PASS', '');
define('DB', 'arpp');

class dbconnection
{
    private $link, $error;

    public function __construct()
    {
        $this->link = null;
        $this->error = null;
        try {
            $this->link = new mysqli(HOST, USER, PASS, DB);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function get()
    {
        return $this->link;
    }

    public function __destruct()
    {
        $this->link = null;
    }
}
