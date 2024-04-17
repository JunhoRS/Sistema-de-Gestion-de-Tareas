<?php

class ImagesModel extends Model {

  public function __construct(){
    parent::__construct();
  }
  
  public function loadImage($img){
    $name= $img['name'];
    $type= $img['type'];  
    $size= $img['size'];
    
    if($size<=3400000){
      if($type=='image/jpeg' || $type=='image/jpg' || 
         $type=='image/png' || $type=='image/gif'){
       
        $folder= constant('FOLDER'). 'drafts/';
        $destin= $_SERVER['DOCUMENT_ROOT']. $folder;
        //move_uploaded_file($img['tmp_name'], $destin.$img['name']);
        copy($img['tmp_name'], $destin. $name);
    
        echo constant('PUBLIC').'images/drafts/'.$img["name"];
        
      } else {
        echo 'falseType';
      }
    } else {
      echo 'falseSize';
    }
  }
  
  public function checkImage($img){
    $name= $img['name'];
    $type= $img['type'];  
    $size= $img['size'];
  
    if($size<=3400000){
      if($type=='image/jpeg' || $type=='image/jpg' || 
         $type=='image/png' || $type=='image/gif'){
       
        $folder= constant('FOLDER'). 'profiles/';
        $destin= $_SERVER['DOCUMENT_ROOT']. $folder;
    
        move_uploaded_file($img['tmp_name'],                            
                         $destin. $name);
        return $name;
        
      } else {
        header('location: '.constant('URL').'register');
      }
    } else {
      header('location: '.constant('URL').'register');
    }
  }

}

?>