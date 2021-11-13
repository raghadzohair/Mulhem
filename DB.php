<?php


class DB{
    private $con;
   private $servername = "localhost";
   private $username = "root";
   private $password = "mysql";
   private $dbname = "MulhemDB";
    
   public function __construct(){

$dsn="mysql:servername=".$this->servername.";dbname=".
$this->dbname;


try{ 
    $this->con = new PDO ($dsn, $this->username, $this->password);
    $this->con->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e){
echo "Connection failed: ". $e->getMessage();
   } 

}
    public function searchData($name){
        $query3="select name from tutor_db where name LIKE :name";
        $stmt=$this->con->prepare($query3);
        $stmt->execute(["name" => "%".$name."%"]);
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
?>