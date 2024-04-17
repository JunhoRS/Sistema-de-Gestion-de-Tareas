<?php

class addFiles extends Controller {
  
  public function __construct(){
    parent::__construct();
  }
  
  public function view($param=null){
    if($param!=null){
    	$idProject= $param[0];
    	$id= $param[1];
    	$model= $this->loadUserModel('selectModel');
  		$selectTask= $model->selectTask($id);
    	$selectFiles= $model->selectFilesAll($id);
    	$this->view->selectFiles= $selectFiles;
    	$this->view->idProject= $idProject;
    	$this->view->idTask= $id;
    	$this->view->selectTask= $selectTask;
    	$this->view->renderUsers('editTask/index');
  
    } else {
    	header('location: '.constant('URL'));
    }
  }
  
  public function insertFileAjax($param=null){
  	if(isset($_FILES) && $param!=null){
  		$idProject= $param[0];
  		$idTask= $param[1];
  		
  		$filename = $_FILES['inputFile']['name'];
      if($_FILES["inputFile"]["size"] <= 3000000){
        	
        $folder= $_SERVER['DOCUMENT_ROOT'].constant('PUBLIC').'files/';
       	move_uploaded_file($_FILES['inputFile']['tmp_name'], $folder.$filename);
      		
    		$model= $this->loadUserModel('insertModel');
    		$model->addFile($idProject, $idTask, $filename);
        	
      } else {
        echo "false";
      }
  	}
  }
  
}

?>