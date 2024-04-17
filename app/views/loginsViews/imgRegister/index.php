<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="public/css/logins/profileImg.css">
    <script src="public/js/icons.js"></script>

    <title>Sign Up - Projects App</title>
  </head>
  <body>

    <!--i class="fas fa-arrow-up"></i-->
    <section id="main">
      <div class="registerDiv">
        <form method="post" enctype="multipart/form-data"
        action="<?php echo constant('URL').'profile/sendImage';?>">
          <h1>Upload a profile image</h1> 
          <p><b>This process is optional. </b>
            If you don't want to have a profile image, click Skip.
          </p>
          <div class="imageDiv">
            <img id="profileImage" name="imageFile"
             src="public/images/profiles/default.jpg"
             alt="Profile Image">
          </div>
          <div class='inputDiv'>
            <input type='file' id='idinputfile' name="image"
             accept="image/*">
            <label for='idinputfile' class='fileLabel'>
              <i class="fas fa-upload"></i>
            </label>
            <span id="fileName">Default image</span>
          </div>
          <p id='errorLine'></p>
          
          
          <input type='hidden' name='checkAccessPost' value='TRUE'>
          <input type='hidden' name='namesPost' 
          value='<?php echo $_POST['names'];?>'>
          <input type='hidden' name='surnamesPost' 
          value='<?php echo $_POST['surnames'];?>'>
          <input type='hidden' name='usernamePost' 
          value='<?php echo $_POST['username'];?>'>
          <input type='hidden' name='passPost' 
          value='<?php echo $_POST['password'];?>'>
          
          <div class="inputDiv">
            <input type="submit" class="inputBtnSkip" 
            id='skipImageBtn' name='skip' value="Skip">
            <input type="submit" class="inputBtnSend" 
            id="sendImageBtn" name='send' value="Send">
          </div>
        </form>
        <input type="hidden" value="<?php echo constant('URL');
        ?>" id='getUrl'>
        
        <div>
          <button class="inputBtnLink">
          <a href="<?php echo constant('URL').'login';?>" 
          class="link">Sign In</a>
          </button>
        </div>
      </div>
    </section>

    <script src="public/js/logins/imageRegister.js"></script>    
  </body>
</html>