<?php

class NewProject extends Controller {
  
  public function __construct(){
    parent::__construct();
    $this->view->renderUsers('newProject/index');
  }
  
  public function addNew(){
    if(!isset($_POST['saveSubmit']) || empty($_POST['title'])){
      echo '<script> window.location.replace("'.
      constant('URL').'newProject") </script>';
    } else {
    
      $dates= [
        'title' => $_POST['title'],
        'desc' => $_POST['desc'],
        'year' => $_POST['year'],
        'month' => $_POST['month'],
        'day' => $_POST['day'],
      ];
      
      $model= $this->loadUserModel('insertModel');
      $model->addProject($dates);
    }
  }
  
}

?>