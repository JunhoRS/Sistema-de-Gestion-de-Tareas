<?php

class Home extends Controller {
  
  public function __construct(){
    parent::__construct();
    $model= $this->loadUserModel('selectModel');
    $selectAll= $model->selectProjects();
    $this->view->selectProjects= $selectAll;
    $this->view->renderUsers('home/index');
    $this->verifProjectsByDate($selectAll, $model);
  }
  
  public function verifProjectsByDate($selectAll, $model){
    $modelUpdate= $this->loadUserModel('updateModel');
    $thisDate= date('Y-m-d');
	if(!empty($selectAll)){
  	  foreach($selectAll as $row){
  		if($thisDate> $row['DELIVDATE']){
  			$modelUpdate->incompleteProject($row['ID']);
  			$tasks= $model->selectTasksAll($row['ID']);
    		//$tasks= $model->selectTasksAll($row['ID']);
    		if(!empty($tasks)){
    			foreach($tasks as $task){
  					$modelUpdate->incompleteTask($row['ID'], $task['ID']);
    			}
    		}
    	}
  	  }
	}
  }
}
?>