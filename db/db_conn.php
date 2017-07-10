<?php
//$database = include_once ( __DIR__ . '\..\config.php' );


class db_conn {

    private $host;
    private $user;
    private $pass;
    private $name;
    private static $instance;
    private $connection;
    
    private $config;

    private function __construct() {
        
    }

    static function getInstance() {
        if( !self::$instance ) {
            self::$instance = new self();
        } 
        return self::$instance;
    }
    
    function connect (){
        $this->host = $config['host'];
        $this->user = $config['user'];
        $this->pass = $config['pass'];
        $this->name = $config['name'];
        
        $connection = new mysqli($host, $user, $pass, $name);
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
