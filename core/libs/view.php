<?php

class View {

  public function renderLogins($name){
    require_once 'app/views/loginsViews/'.$name.'.php';
  }
  
  public function renderAdmins($name){
    require_once 'app/views/adminViews/'.$name.'.php';
  }
  
  public function renderUsers($name){
    require_once 'app/views/userViews/'.$name.'.php';
  }

}

?>