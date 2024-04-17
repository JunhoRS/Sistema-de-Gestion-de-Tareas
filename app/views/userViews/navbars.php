<?php
  require 'app/models/userModels/selectUserModel.php';
  $selAll= new SelectUserModel();
  $selUser= $selAll->selectUser();
  if(empty($selUser)){
  	header('location: '.constant('URL').'signOut');
  } else {
  	foreach($selUser as $row){
?>
    <div id="loadDiv">
      <div id="load"></div>
    </div>

    <nav id="navbar">
      <div class="navContent">
        <div class='leftNav'>
          <div class="toggle-btn">
            <i class="fas fa-bars"></i>
          </div>
          <p class="logo"><a href="">Projects App</a></p>
        </div>
        
        <div class='rightNav'>
          <button id="btnMostOcultNav">
            <img src='<?php echo constant("FOLDER")."profiles/".
            $row["IMAGE"];?>' alt='profile' class='imageProfileSmall'>
            <i class="fas fa-sort-up"></i>
          </button>
        </div>

        <div class="floatNav" id='userNav'>
          <a href="<?php echo constant('URL').'updateImage/view';?>">
            <img alt='profile' class='imageProfileBig'
            src='<?php echo constant("FOLDER")."profiles/".
            $row['IMAGE'];?>'>
            <button class="updateImageBtn">
            <i class="fas fa-id-badge"></i>
            Update image</button>
          </a>
          <a href="<?php echo constant('URL').'signOut';?>">
            <button class="logOutBtn">
            <i class="fas fa-sign-out-alt"></i>
            SignOut</button>
          </a>
        </div>
      </div>
    </nav>

    <div id="sidebar">
      <ul>
        <a href="<?php echo constant('URL').'home';?>">
        <li>Home</li></a>
        <a href="<?php echo constant('URL').'dashboard';?>">
        <li>Dashboard</li></a>
        <a href="<?php echo constant('URL').'newProject';?>">
        <li>New Project</li></a>
        <a href="<?php echo constant('URL');?>"><li>About</li></a>
        <a href="<?php echo constant('URL');?>"><li>Contact</li></a>
      </ul>
      <input type='hidden' id='getUrl' 
      value='<?php echo constant('URL');?>'>
    </div><hr>
<?php 
		}
  }
?>