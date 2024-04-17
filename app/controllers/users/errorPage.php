<?php

class ErrorPage extends Controller {
  
  public function __construct(){
    parent::__construct();
    $this->view->renderUsers('errorPage/index');
  }
  
}

?>