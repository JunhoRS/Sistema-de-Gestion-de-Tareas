<?php

class UpdateModel extends Model {
  
  public function __construct(){
    parent::__construct();
  }

	public function completedTask($idProject, $id){
		try{
			$sql= 'UPDATE TASKS SET STATUS= "Completed" WHERE IDPROJECT= :IdProject AND ID= :Id';
			$query= $this->db->prepare($sql);
			$query->execute([ 
					':IdProject' => $idProject,
					':Id' => $id
				]);
		
		} catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
	}
	
	public function incompleteTask($idProject, $id){
		try{
			$sql= 'UPDATE TASKS SET STATUS= "Incomplete" WHERE IDPROJECT= :IdProject AND ID= :Id';
			$query= $this->db->prepare($sql);
			$query->execute([ 
					':IdProject' => $idProject,
					':Id' => $id
				]);
		
		} catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
	}
	
	public function updatePercent($percent, $id){
		try{
			$sql= 'UPDATE PROJECTS SET PERCENT= :Percent WHERE ID= :Id';
			$query= $this->db->prepare($sql);
			$query->execute([ 
					':Percent' => $percent,
					':Id' => $id
				]);
		
		} catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
	}
	
	public function completedProject($id){
		try{
			$sql= 'UPDATE PROJECTS SET STATUS= "Completed" WHERE ID= :Id AND STATUS= "pending"';
			$query= $this->db->prepare($sql);
			$query->execute([ ':Id' => $id ]);
		
		} catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
	}
	
	public function completedIncompleteProject($id){
		try{
			$sql= 'UPDATE PROJECTS SET STATUS= "Completed" WHERE ID= :Id';
			$query= $this->db->prepare($sql);
			$query->execute([ ':Id' => $id ]);
		
		} catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
	}
	
	public function incompleteProject($id){
		try{
			$sql= 'UPDATE PROJECTS SET STATUS= "Incomplete" WHERE ID= :Id AND STATUS= "pending"';
			$query= $this->db->prepare($sql);
			$query->execute([ ':Id' => $id ]);
		
		} catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
	}
	
	public function updateImageProfile($img, $user){
		try {
			$sql= 'UPDATE USERNAMES SET IMAGE= :Image WHERE USERNAME= :User';
			$query= $this->db->prepare($sql);
			$query->execute([ ':Image' => $img, ':User' => $user ]);
			
		} catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
	}
}