<?php
    class Author {
        private $conn; 
        private $table = 'authors';

        //Properties of the Post table
        public $id; 
        public $author; 

        public function __construct($db) {
            $this->conn = $db; //connection = db
        }

        //GET
    public function read()
    {
        // Create query
        $query = 'SELECT
        id,
        author,
        
      FROM
         . $this->table . ';

        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    public function read_single(){
    // Create query
    $query = 'SELECT
          id,
          author
        FROM
          ' . $this->table . '
      WHERE id = ?
      LIMIT 0,1';

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->id);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set properties
        $this->id = $row['id'];
        $this->author = $row['author'];
    }

    // Create
    public function create()
    {
        // Create Query
        $query = 'INSERT INTO ' .
            $this->table . '
        SET
            author = :author';

        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->author = htmlspecialchars(strip_tags($this->author));

        // Bind data
        $stmt->bindParam(':author', $this->author);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: $e.\n", $stmt->error);

        return false;
    }

// Update Category
  public function update() {
    // Create Query
    $query = 'UPDATE ' .
      $this->table . '
    SET
      name = :name
      WHERE
      id = :id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->author = htmlspecialchars(strip_tags($this->author));
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind data
    $stmt-> bindParam(':name', $this->author);
    $stmt-> bindParam(':id', $this->id);

    // Execute query
    if($stmt->execute()) {
        return true;
    }

    // Print error if something goes wrong
    printf("Error: $e.\n", $stmt->error);

    return false;
  }

  // Delete Category
  public function delete() {
    // Create query
    $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // clean data
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind Data
    $stmt-> bindParam(':id', $this->id);

    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: $e.\n", $stmt->error);

    return false;
    }
  }
