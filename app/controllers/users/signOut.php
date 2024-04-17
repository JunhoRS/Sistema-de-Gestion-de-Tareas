<?php

class SignOut extends Controller {
  
  public function __construct(){
    parent::__construct();
    session_start();
    session_destroy();
    header('location: '.constant('URL'));
  }
  
}

?>