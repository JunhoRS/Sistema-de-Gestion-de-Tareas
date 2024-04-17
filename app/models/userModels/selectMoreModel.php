<?php

class SelectMoreModel extends Model {
  
  public function __construct(){
    parent::__construct();
  }
  
  public function totalNumTasks($idProject){
    try {
    	$sql= 'SELECT * FROM TASKS WHERE IDPROJECT= 
    	"'.$idProject.'"';
    	$query= $this->db->query($sql);
    	$getNum= $query->rowCount();
    	return $getNum;
    	
    } catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
  }
  
  public function completedNumTasks($idProject){
    try {
    	$sql= 'SELECT * FROM TASKS WHERE IDPROJECT= "'.$idProject.'" AND STATUS= "Completed"';
    	$query= $this->db->query($sql);
    	$getNum= $query->rowCount();
    	return $getNum;
    	
    } catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
  }
}