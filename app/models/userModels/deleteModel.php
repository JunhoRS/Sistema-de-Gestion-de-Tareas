<?php

class DeleteModel extends Model {
  
  public function __construct(){
    parent::__construct();
  }
  
  public function deleteProject($id){
  	try{
  		$sql= 'DELETE FROM PROJECTS WHERE ID= :Id';
  		$query= $this->db->prepare($sql);
  		$query->execute([ ':Id' => $id ]);
  		
  	} catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
  }
  
}