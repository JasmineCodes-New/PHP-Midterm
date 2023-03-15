<?php
    class Quotes {

        private $conn;
        private $table = 'quotes'; 

        //Properties of the Quote table
        public $id; 
        public $quote; 
        public $author_id; 
        public $category_id;

    public function __construct($db){
        $this->conn = $db;
    }

    //GET
    public function read() {
        
    }
    }