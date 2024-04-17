<?php

class AjaxController extends Controller {
  
  public function __construct(){
    parent::__construct();
  }
  
  public function loadImage(){
    if(!empty($_FILES)){
      $img= $_FILES["image"];
      
      $model= $this->loadLoginsModel('imagesModel');
      $routeReturn= $model->loadImage($img);
      echo $routeReturn;
    }
  }
  
  public function register(){
    if(isset($_POST)){
      $names= $_POST["names"];
      $surnames= $_POST["surnames"];
      $username= $_POST["username"];
      $pass= $_POST["pass"];
      
      include 'app/views/loginsViews/register/validation.php';
    }
  }
  
  public function checkUsername(){
    if(isset($_POST['username'])){
      $username= $_POST['username'];
      
      $model= $this->loadLoginsModel('registerModel');
      $checkReturn= $model->checkUsernameModel($username);
      echo $checkReturn;
    }
  }
  
}

?>