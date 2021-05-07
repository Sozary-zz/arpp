<?php
define('HOST', '127.0.0.1:3307');
define('USER', 'root');
define('PASS', '');
define('DB', 'arpp');

$this->link = new mysqli(HOST, USER, PASS);

$sql = "DROP DATABASE " . DB . " IF EXIST";
