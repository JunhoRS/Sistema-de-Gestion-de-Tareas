<?php

class ImagesModel extends Model {
  
  public function __construct(){
    parent::__construct();
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
    
        move_uploaded_file($img['tmp_name'], $destin.$name);
        return $name;
      } else {
      	return false;
      }
    } else {
    	return false;
    }
  }
}