<?php

class Login extends Controller {
  
  public function __construct(){
    parent::__construct();
    $this->view->renderLogins('login/index');
  }
  
  public function checkLogin(){
    if(isset($_POST['btnLogin'])){
      
      $user= $_POST['username'];
      $pass= $_POST['password'];
      
      $model= $this->loadLoginsModel('loginModel');
      $model->checkLogin($user, $pass);
			  
    } else {
      header('location: '.constant('URL').'login');
    }
  }
}

?>