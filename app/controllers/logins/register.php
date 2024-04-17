<?php

class Register extends Controller {
  
  public function __construct(){
    parent::__construct();
    $this->view->renderLogins('register/index');
    $this->cancelBtn();
  }
  
  public function cancelBtn(){
    if(isset($_POST['cancelBtn'])){
      header('location: '.constant('URL').'register');
    }
  }
  
  
  /*
  public function echoo($param= null){
    echo 'PARAMM'.$param[1];
  }
  
  public function addUser(){
    if($_POST['checkAccessPost']!='TRUE'){
      header('location: '.constant('URL').'register');
      return false;
    }
    
    $names= $_POST['names'];
    $surnames= $_POST['surnames'];
    $username= $_POST['username'];
    $pass= $_POST['password'];
    $dates= [
      'names' => $names,
      'surnames' => $surnames,
      'username' => $username,
      'pass' => $pass
    ];
    
    $model= $this->loadLoginsModel('registerModel');
    $model->conInsert($dates);
  }*/
}

?>