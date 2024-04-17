<?php

class LoginModel extends Model {

  public function __construct(){
    parent::__construct();
  }
 
  public function checkLogin($user, $pass){
    try {
			  $sql= 'SELECT * FROM USERNAMES WHERE USERNAME = :User';
			  $query= $this->db->prepare($sql);
			  $query->execute([ ':User' => $user ]);
			  $rows= $query->rowCount();
			  
			  if($rows>0){
			    
			    while($row= $query->fetch(PDO::FETCH_ASSOC)){
			      if(password_verify($pass, $row['PASSWORD'])){
            session_start();
            $_SESSION['SeUser'] = $row['USERNAME'];
            $_SESSION['SeNames'] = $row['NAMES'];
            $_SESSION['SeSurnames'] = $row['SURNAMES'];
            $_SESSION['SeFunction'] = $row['FUNCTION'];
            
      		    header('location: '.constant('URL'));
          } else {
            header('location: '.constant('URL').'login');
          }
        }
        
        echo $_SESSION['SeUser'];
        
      } else {
      		header('location: '.constant('URL').'login');
      }
			}catch(PDOException $e){
      echo $e->getLine();
      echo $e->getMessage();
    }
  }
  

}

?>