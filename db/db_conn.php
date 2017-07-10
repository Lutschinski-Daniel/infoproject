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
        
    }

    static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function connect() {
        $json = json_decode(file_get_contents(__DIR__ . '\..\config.json'));
        $this->config = $json;
        $this->host = $this->config->{'host'};
        $this->user = $this->config->{'user'};
        $this->name = $this->config->{'name'};
        $this->pass = $this->config->{'pass'};

        $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->name);
    }

    // Get object from db with query
    // Return value NULL or object!
    function get($query) {
        
    }

    // Save object to db
    // Return value TRUE or FALSE
    function set($object) {
        
    }
}
