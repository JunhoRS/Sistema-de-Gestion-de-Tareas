<?php

class Url {
  
  public function getUrl(){  
    $url= isset($_GET['url']) ? $_GET['url']: null;
    $url= rtrim($url, '/');
    $url= explode('/', $url);
    
    return $url;
  }
  
}

?>