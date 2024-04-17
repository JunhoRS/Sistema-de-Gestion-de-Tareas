<?php
class Files {

  public function fileDefault($pag){
    $rute= 'app/controllers/'.$pag.'.php';
    return $rute;
  }
  
  public function fileLogin($pag){
    $rute= 'app/controllers/logins/'.$pag.'.php';
    return $rute;
  }
  
  public function fileUser($pag){
    $rute= 'app/controllers/users/'.$pag.'.php';
    return $rute;
  }
  
  public function fileAdmin($pag){
    $rute= 'app/controllers/admin/'.$pag.'.php';
    return $rute;
  }
  
}

?>