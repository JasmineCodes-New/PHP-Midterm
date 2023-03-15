<?php
    class Category {
        private $conn;
        private $table = 'categories';

        public $id; 
        public $category;

    public function __construct($db){
        $this->conn = $db; //connection = db
    }
    public function read()
    {
        // Create query
        $query = 'SELECT
        id,
        category,
        
      FROM
         . $this->table . ';

        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }
    }