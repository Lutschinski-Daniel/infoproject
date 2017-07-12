<?php

class db_conn {

    private $host;
    private $user;
    private $pass;
    private $name;
    private static $instance;
    private $connection;
    private $config = null;

    private function __construct() {
        $json = json_decode(file_get_contents(__DIR__ . '\..\config.json'));
        $this->config = $json;
        $this->host = $this->config->{'host'};
        $this->user = $this->config->{'user'};
        $this->name = $this->config->{'name'};
        $this->pass = $this->config->{'pass'};
        
        $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->name);
    }

    static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Get object from db with query
    // Return value 0 or objectS!
    public function get($query) {
        return mysqli_query($this->connection, $query);
    }

    // Save object to db
    // Return value TRUE (success) or FALSE (fail)
    public function set($query) { 
        return mysqli_query($this->connection, $query); 
    }
}
