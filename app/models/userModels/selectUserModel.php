<?php

class SelectUserModel extends Model {
  
  public function __construct(){
    parent::__construct();
  }

  public function selectUser(){
    try {
    	$sql= 'SELECT * FROM USERNAMES WHERE USERNAME= "'.
      $_SESSION['SeUser'].'"';
      $data= null;
      
      if($query= $this->db->query($sql)){
       	while($row= $query->fetch(PDO::FETCH_ASSOC)){
         	$data[] = $row; 
       	}
      }
      return $data;
    	
    } catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
  }}

?>