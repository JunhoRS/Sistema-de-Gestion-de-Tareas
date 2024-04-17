<?php

class Router extends Url {
  
  protected $controller;
  protected $method;
  protected $url;
  
  public function __construct(){  
    $urlClass= new Url();
    $url= $urlClass->getUrl();
    $session= new Sessions();
    
    $this->url= $url;
    $this->controller= $url[0];
    if(!empty($url[1])){
		$this->method= $url[1];
    }
    $this->getController($session);
  }
  
  public function getController($sess){
    if(empty($this->controller)){
      $sess->verifySessionEmpty();
      return false;
    }
    $fileController= $sess->verifySessionFile($this->controller);
    
    if(file_exists($fileController)){
      require $fileController;
      $controller= new $this->controller;
      
      $this->getUrlMethod($controller);
      
    } else {
    	$sess->errorPage();
    }
  }
  
  public function getUrlMethod($controller){
    $nparam= sizeof($this->url);
    
    if($nparam > 1){
      if($nparam > 2){
        //$controller->{$this->method}($this->param);
        $param= [];
        for($i=2; $i<$nparam; $i++){
          array_push($param, $this->url[$i]);
        }
        $controller->{$this->method}($param);
      } else {
        $controller->{$this->method}();
      }
    }
  }
  
}

?>