<?php

class Controller {

  public function __construct(){
    $this->view= new View();
  }
  
  public function loadLoginsModel($model){
    require_once 'app/models/loginsModels/'.$model.'.php';
    $newModel= new $model;
    return $newModel;
  }
  
  public function loadUserModel($model){
    require_once 'app/models/userModels/'.$model.'.php';
    $newModel= new $model;
    return $newModel;
  }

}

?>