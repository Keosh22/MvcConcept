<?php
class Model {
    protected $db;

    public function __construct() {
        $this->db = new mysqli('localhost', 'username', 'password', 'database');
    }
}