<?php
$path = 'lib/';

if(substr(BASE_PATH, -6) == 'admin/'){
    $path = '../' . $path;
}

include $path . 'pass.php';

class DataBase{
    public $pdo = '';

    const DB_DEBUG = false;

    public function __construct($dataBaseUser, $whichDataBasePassword, $dataBaseName){
        $this->pdo = null;

        include 'pass.php';
        $DataBasePassword = '';

        switch ($whichDataBasePassword){
            case 'r':
                $DataBasePassword = $dbReader;
                break;
            case 'w':
                $DataBasePassword = $dbWriter;
                break;
        }

        $query = NULL;

        $dsn = 'mysql:host=webdb.uvm.edu;dbname=';

        if(self::DB_DEBUG){
            print "<p>Try connecting with phpMyAdmin with these credentials.</p>";
            print '<p>Username: ' . $dataBaseUser;
            print '<p>DSN: ' . $dsn . $dataBaseName;
            print '<p>Password: ' . $DataBasePassword;
        }

        try{
            $this->pdo = new PDO($dsn . $dataBaseName, $dataBaseUser, $DataBasePassword);

            if (!$this->pdo){
                if(self::DB_DEBUG) print '<p>You are NOT connected to the database!</p>';
                return 0;
            }else{
                if(self::DB_DEBUG) print '<p>You are connected to the database!</p>';
                return $this->pdo;
            }
        }catch (PDOException $e){
            $error_message = $e->getMessage();
            if (self::DB_DEBUG) print "<p>An error occurred while connecting to the database: $error_message </p>";
        }
    }
    //=======Insert Record into Database========
    public function insert($query, $values = ''){
        $status = false;
        $statement = $this->pdo->prepare($query);

        if (is_array($values)){
            if($statement->execute($values)){
                print '<p>Record was saved</p>';
            }else{
                print '<p>Record was NOT saved</p>';
            }
        }else{
            $status = $statement->execute();
        }
        
        return $status;
    }
    //=======Update Record in Database========
    public function update($query, $values = ''){
        $status = false;
        $statement = $this->pdo->prepare($query);

        if (is_array($values)){
            if($statement->execute($values)){
            }else{
                print '<p>Record was NOT updated</p>';
            }
        }else{
            $status = $statement->execute();
        }
        
        return $status;
    }

    //=======Delete Record from Database========
    public function delete($query, $values = ''){
        $status = false;
        $statement = $this->pdo->prepare($query);

        if (is_array($values)){
            if($statement->execute($values)){
            }else{
                print '<p>Record was NOT deleted</p>';
            }
        }else{
            $status = $statement->execute();
        }
        
        return $status;
    }

    public function select($query, $values = ''){

        $statement = $this->pdo->prepare($query);

        if (is_array($values)){
            $statement->execute($values);
        }else{
            $statement->execute();
        }

        $recordSet = $statement->fetchAll(PDO::FETCH_ASSOC);

        $statement->closeCursor();
        
        return $recordSet;
    }
    //Testing function
    function displayQuery($query, $values = '') {
        if ($values != '') {
            $needle = '?';
            $haystack = $query;
            foreach ($values as $value) {
                $pos = strpos($haystack, $needle);
                if ($pos !== false) {
                    
                    $haystack = substr_replace($haystack, '"' . $value . '"', $pos, strlen($needle));
                }
            }
            $query = $haystack;
        }
        return $query;
        
    }
}
//Ends constructor
?>