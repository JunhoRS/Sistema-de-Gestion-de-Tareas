<?php

class UpdateImage extends Controller {
  
  public function __construct(){
    parent::__construct();
  }
  
  public function view(){
    $this->view->renderUsers('updateImage/index');
  }
  
  public function update(){
  	if(isset($_POST['updateImageBtn'])){
  		$user= $_SESSION['SeUser'];
  		$image= $_FILES['inputfile'];
  		$modelImg= $this->loadUserModel('imagesModel');
  		$modelUpdate= $this->loadUserModel('updateModel');
  		$img= $modelImg->checkImage($image);
  		if($img){
  			$modelUpdate->updateImageProfile($img, $user);
  		}
  		header('location: '.constant('URL').'updateImage/view');
  		
  	} else {
  		header('location: '.constant('URL').'signOut');
  	}
  }
  
  public function selectDraft(){
  	if(isset($_FILES)){
  	$img= $_FILES['inputfile'];
  	$name= $img['name'];
    $type= $img['type'];  
    $size= $img['size'];
    
    if($size<=3400000){
      if($type=='image/jpeg' || $type=='image/jpg' || 
         $type=='image/png' || $type=='image/gif'){
       
        $folder= constant('FOLDER'). 'drafts/';
        $destin= $_SERVER['DOCUMENT_ROOT']. $folder;
        copy($img['tmp_name'], $destin. $name);
    
        echo constant('PUBLIC').'images/drafts/'.$img["name"];
        
      } else {
        echo 'falseType';
      }
    } else {
      echo 'falseSize';
    }
  	}
  }
}