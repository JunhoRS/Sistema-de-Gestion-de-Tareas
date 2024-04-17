<?php

class Select extends Controller {
  
  public function __construct(){
    parent::__construct();
  }
  
  public function view($param= null){
  	if($param != null){
  	  $id= $param[0];
  		$model= $this->loadUserModel('selectModel');
  		
  		$selectAll= $model->selectProjects();
  		$selectTasks= $model->selectPendingTasks($id);
    	$selectProject= $model->selectProject($id);
    	$this->view->model= $model;
    	$this->view->selectAll= $selectAll;
  		$this->view->selectTasks= $selectTasks;
  		$this->view->selectProject= $selectProject;
  		$this->view->renderUsers('select-project/index');
  			
  	} else {
  		header('location: '.constant('URL'));
  	}
  }
  
  public function viewTasks($param= null){
  	if($param != null){
  	  $id= $param[0];
  		$model= $this->loadUserModel('selectModel');
  		
  		$selectPendingTasks= $model->selectPendingTasks($id);
  		$selectCompletedTasks= $model->selectCompletedTasks($id);
  		$selectIncompleteTasks= $model->selectIncompleteTasks($id);
    	$selectProject= $model->selectProject($id);
    	$this->view->model= $model;
    	$this->view->selectPending= $selectPendingTasks;
    	$this->view->selectCompleted= $selectCompletedTasks;
    	$this->view->selectIncomplete= $selectIncompleteTasks;
  		$this->view->selectProject= $selectProject;
  		$this->view->renderUsers('tasksList/index');
  			
  	} else {
  		header('location: '.constant('URL'));
  	}
  }
  
  public function addTask($param=null){
  	if(isset($_POST)){
  		$title= $_POST['title'];
  		$desc= $_POST['desc'];
  		$idProject= $param[0];
  		
      $model= $this->loadUserModel('insertModel');
      $model->addTask($title, $desc, $idProject);
  	}
  }
  
  public function completedTask($param=null){
  	if($param[0]!=null || $param[1]!=null){
  		$idProject= $param[0];
  		$id= $param[1];
  		
  		$modelUpdate= $this->loadUserModel('updateModel');
  		$modelSelect= $this->loadUserModel('selectMoreModel');
  		$modelUpdate->completedTask($idProject, $id);
  		$completedNum= $modelSelect->completedNumTasks($idProject);
  		$totalNum= $modelSelect->totalNumTasks($idProject);
  		$percent= round(($completedNum/$totalNum)*100);
  		$modelUpdate->updatePercent($percent, $idProject);
  		if($percent==100){
  			$modelUpdate->completedProject($idProject);
  		}
  		header('location: '.constant('URL'));
  		
  	} else {
  		header('location: '.constant('URL'));
  	}
  }
  
    public function completedProject($param=null){
  	if($param!=null){
  		$id= $param[0];
  		
  		$modelUpdate= $this->loadUserModel('updateModel');
  		$modelUpdate->completedIncompleteProject($id);
  		header('location: '.constant('URL'));
  		
  	} else {
  		header('location: '.constant('URL'));
  	}
  }
  
  public function delete($param= null){
  	if($param != null){
  		$id= $param[0];
  		$model= $this->loadUserModel('deleteModel');
  		$model->deleteProject($id);
  		header('location: '.constant('URL'));
  		
  	} else {
  		header('location: '.constant('URL'));
  	}
  }
}
?>