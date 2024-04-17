<?php

class Profile extends Controller {
  
  public function __construct(){
    parent::__construct();
    $this->view->renderLogins('imgRegister/index');
    
    if($_POST['checkAccess']!='TRUE' && 
     $_POST['checkAccessPost']!='TRUE'){
      header('location: '.constant('URL').'register');
      return false;
    }
  }
  
  public function getDates(){
    $names= $_POST['namesPost'];
    $surnames= $_POST['surnamesPost'];
    $username= $_POST['usernamePost'];
    $pass= $_POST['passPost'];
    $dates= [
      'names' => $names,
      'surnames' => $surnames,
      'username' => $username,
      'pass' => $pass
    ];
    return $dates;
  }
  
  public function sendImage(){
    $dates= $this->getDates();
    
    if(isset($_POST['skip'])){
      $this->skipImage($dates);
      
    } else if(isset($_POST['send'])){
      if(empty($_FILES['image']['name'])){
        $this->skipImage($dates);
      } else {
        $this->registerImage($dates);
      }
    }    
  }
  
  public function skipImage($dates){
    $imgName= 'default.jpg';
    
    $model= $this->loadLoginsModel('registerModel');
    $model->conInsert($dates, $imgName);
  }
  
  public function registerImage($dates){
    $img= $_FILES['image'];
    $imageModel= $this->loadLoginsModel('imagesModel');
    $image= $imageModel->checkImage($img);
    
    $model= $this->loadLoginsModel('registerModel');
    $model->conInsert($dates, $image);
  }
  
  
}

?>