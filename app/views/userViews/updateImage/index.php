<?php include 'app/views/userViews/headerTop.php'; ?>
<link rel="stylesheet" type='text/css' href="<?php echo constant('PUBLIC');?>css/users/updateImage1.css">
<?php include 'app/views/userViews/headerBottom.php';
	 		include "app/views/userViews/navbars.php"; ?>
	 		
    <div class="main">
      <div class="profileDiv">
        <h2 class="headerTitle">Username</h2>
        <div class="headerContent">
          
          <form action="<?php echo constant('URL');?>updateImage/update" method="post" enctype="multipart/form-data">
          	<?php
  					foreach($selUser as $row){
  					?>
            <div class="imageDiv">
              <img id="profileImage" name="imageFile"
               src="<?php echo constant('PUBLIC');?>images/profiles/<?php echo $row['IMAGE'];?>"
               alt="Profile Image">
            </div>

            <h2 class="names"><?php echo $row['NAME'];?></h2>
            <h3 class="surnames"><?php echo $row['SURNAME'];?></h3>

            <div class='inputDiv'>
              <input type='file' id='idinputfile' name="inputfile"
               accept="image/*">
              <label for='idinputfile' class='fileLabel'>
                <i class="fas fa-upload"></i>
              </label>
              <span id="fileName">My image</span>
            </div>
            <p id='errorLine'></p>
          
            <div class="inputDiv">
              <input type="submit" id="sendImageBtn"
              value="Send" name='updateImageBtn'>
            </div>
            <?php
  					}
            ?>
          </form>
          

        </div>
      </div>
    </div>

  
  </body>
  <script src="<?php echo constant('PUBLIC');?>js/users/navbars.js"></script>
  <script src="<?php echo constant('PUBLIC');?>js/users/updateImage0.js"></script>
</html>