<?php
class MainClass {
    
private $mysqli;
    
function __construct($mysqli){
require_once 'lib/HTMLPurifier.auto.php';
$config = HTMLPurifier_Config::createDefault();
$purifier = new HTMLPurifier($config);
$this->mysqli = $mysqli;    
$this->test = 'This is working!';   
} 
  
  //DB CLASS  
    
//RUN ALL FORM INPUTS YOU CREATE THROUGH THIS FUNCTION OR RISK GETTING HACKED!
public function clean_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = mysqli_real_escape_string($this-mysqli, $data);  
  $data = $this->purifier->purify($data); 
  return $data;
}
     
    
    
    
//example of a public function.
    
public function getUserList(){
//SQL QUERY 
$selectors = '*';
$table = 'uc_users';
//Remember in the class functions (here) it is $this-> to call a function or variable
    //in the front end it's $main->    
 
//executes query
$result = $this->selectFromDb($selectors,$table);
    //loops through the results
    while($row = $result->fetch_assoc()) {
        //echoes the field from the db
        echo '<p>'.$row['display_name'].'</p>';
      
    }   
}    
    
    
//EXAMPLE OF GETTING DATA FOR JS
    public function getUsersForJs(){ 
        $mysqli = $this->mysqli;   
        $sql = "SELECT * FROM uc_users";   
        $result = mysqli_query($mysqli,$sql);
        $someArray = [];
  // Loop through query and push results into $someArray;
 while($row = $result->fetch_assoc()) {
    array_push($someArray, [
      'id'   => $row['id'],
      'display_name' => $row['display_name'],
      'title'   => $row['title'] 
    ]);
  }  
        return json_encode($someArray)  ; 
    }    
    
    
    
    /*SELECT*/
        public function selectFromDb($selectors,$table){
        $mysqli = $this->mysqli;
        $sql = "SELECT $selectors FROM $table";
        $result = $mysqli->query($sql);
        if (mysqli_num_rows($result) > 0) {
        return $result;
        }
        else {
        return "0 results";
        }
        }

        /*INSERT*/            
        public function insertIntoDb($selectors,$table,$values){
        $mysqli = $this->mysqli;
        $sql = "INSERT INTO $table ($selectors) VALUES ($values)";
        $result = $mysqli->query($sql);
        if (mysqli_num_rows($result) > 0) {
        return $result;
        }
        else {
        return 0;
        }
        }
    
        /*UPDATE*/
        public function updateDbWhere($selectors,$table,$updatevals,$field,$fieldval){
        $mysqli = $this->mysqli;
        $sql = "UPDATE $table SET $updatevals WHERE $field = $fieldval";
        $result = $mysqli->query($sql);
        if (mysqli_num_rows($result) > 0) {
        return $result;
        }else {
        return 0;
        }
        }
    
        /*DELETE*/
        public function deleteFromDB($table,$field,$fieldval){
        $mysqli = $this->mysqli;
        $sql = "DELETE FROM $table WHERE $field = $fieldval";
        $result = $mysqli->query($sql);
        if (mysqli_num_rows($result) > 0) {
        return $result;
        }else {
        return 0;
        }
        }   
    
        /*
        Usage: $result = $this->selectFromDbJoinOn('test','profiles','test.id=profiles.id','*');
        */ 
        public function selectFromDbJoinOn($table1,$table2,$equals,$selectors){
        $mysqli = $this->mysqli;
        $sql = "
        SELECT $selectors
        FROM $table1
        INNER JOIN $table2
        ON $equals 
        ";
        $result = $mysqli->query($sql);
        if (mysqli_num_rows($result) > 0) {
        return $result;
        }
        else {
        return 0;
        }
        }  
    
        /*SELECT SINGLE ITEM*/
        public function selectSingleFromDb($selectors,$table,$field,$fieldval){
        $mysqli = $this->mysqli;
        $result  = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT $selectors FROM $table WHERE $field = '$fieldval'"));
        return  $result ;
        //usage    
        //$userID = $result['userID'];
        }     
    
        }
?>