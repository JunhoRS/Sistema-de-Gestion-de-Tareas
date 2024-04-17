<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="public/css/logins/login.css">
    <script src="public/js/icons.js"></script>

    <title>Sign In - Projects App</title>
  </head>
  <body>

    <section id="main">
      <div class="loginDiv">
        <div class="links-div">
          <p class="linkActived">Sign In</p>
          <a href="<?php echo constant('URL').'register';?>"
          class="link">Sign Up</a>
        </div>
        <form action="<?php echo constant('URL').'login/checkLogin';?>"
        method="post" class="formDiv">
          <div class="input-div">
            <input type="text" class="inputLogin" 
            name="username" placeholder="Username">
          </div>

          <div class="input-div">
            <input type="password" class="inputLogin" 
            name="password" placeholder="Password">
          </div>

          <div class="input-div">
            <input type="submit" class="submitLogin" 
            name="btnLogin" placeholder="Password" value="Login">
          </div>
        </form>
      </div>
    </section>
  
  </body>
</html>