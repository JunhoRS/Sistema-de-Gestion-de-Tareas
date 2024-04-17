<?php

class Iframe extends Controller {
  
  public function __construct(){
    parent::__construct();
  }
  
  public function view($param=null){
  	if($param!=null){
  		$idProject= $param[0];
  		$idTask= $param[1];
  		$id= $param[2];
  		
    	$model= $this->loadUserModel('selectModel');
    	$select= $model->selectFile($idProject, $idTask, $id);
    	$this->view->selectFile= $select;
    	$this->view->renderUsers('iframe/index');
  		
  	} else {
  		header('location: '.constant('URL'));
  	}
  }
}

?>