<?php

class RegisterModel extends Model {

  public function __construct(){
    parent::__construct();
  }
 
  public function checkUsernameModel($user){
    try {
      $sql= 'SELECT * FROM USERNAMES WHERE USERNAME= "'.$user.'"';
      $query= $this->db->query($sql);
      $rows= $query->rowCount();
      
      if($rows > 0){
        return 'false';
      } else {
        return 'true';
      }
      
    }catch(PDOException $e){
      echo $e->getLine();
      echo $e->getMessage();
    }
  }
  
  public function conInsert($dates, $image){
    try {
      $sql= 'INSERT INTO USERNAMES (USERNAME, NAME, SURNAME, 
           PASSWORD, IMAGE, FUNCTION, STATEMENT) VALUES 
           (:Username, :Name, :Surname, :Password, :Image,
            :Function, :Statement)';
      
      $contEncp= password_hash($dates['pass'], PASSWORD_DEFAULT);
      
      $consult= $this->db->prepare($sql);
      $consult->execute([
        ':Username' => $dates['username'],
        ':Name' => $dates['names'],
        ':Surname' => $dates['surnames'],
        ':Password' => $contEncp,
        ':Image' => $image,
        ':Function' => 'User',
        ':Statement' => 'Avaiable'
      ]);
      
      session_start();
      $_SESSION['SeUser'] = $dates['username'];
      $_SESSION['SeNames'] = $dates['names'];
      $_SESSION['SeSurnames'] = $dates['surnames'];
      $_SESSION['SeFunction'] = 'User';
      header('location: '.constant('URL'));
      
    }catch(PDOException $e){
      echo $e->getLine();
      echo $e->getMessage();
    }
  }

}

?>