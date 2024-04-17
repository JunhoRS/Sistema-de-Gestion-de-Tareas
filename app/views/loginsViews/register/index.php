<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="public/css/logins/register.css">
    <script src="public/js/icons.js"></script>

    <title>Sign Up - Projects App</title>
  </head>
  <body>

    <section id="main">
      <div class="registerDiv">
        
        <form action="" method="post" id="validRegisterDiv">
          <div class="formNames">
            <h2 class="h2">Insert a correct username</h2>
            <div class="name-surnameDiv">
              <input type="text" class="inputName" 
              id="names" placeholder="Name">
              <input type="text" class="inputSurname" 
              id="surnames" placeholder="Surname">
            </div>
            <div class="formDiv">
              <input type="text" class="inputForm" 
              id="username" placeholder="Username">
            </div>
            <div id="errorLine1" class="errorLine"></div>
          </div>

          <div class="formPasswords">
            <h2 class="h2">Insert a safe password</h2>
            <div class="formDiv">
              <input type="password" class="inputForm" 
              id="pass" placeholder="Password">
            </div>
            <div class="formDiv">
              <ul class="passLines" id="errorLines">
                <li id="mayus">Minimum 1 mayus</li>
                <li id="special">Minimum 1 special caracter</li>
                <li id="numbers">Minimum 1 number</li>
                <li id="lower">Minimum 1 lowercase</li>
                <li id="len">Minimum 8 caracters</li>
              </ul>
            </div>
            <div class="formDiv">
              <input type="password" class="inputForm" 
              id="confirmPass" placeholder="Confirm Password">
            </div>
            <div id="errorLine2" class="errorLine"></div>
          </div>

          <div>
            <input type="button" class="inputBtn" 
            id="registerBtn" value="Register">
          </div>
        </form>
        <input type="hidden" value="<?php echo constant('URL');
        ?>" id='getUrl'>
        
        <form action="<?php echo constant('URL').'profile'?>" 
        method="post" id="checkRegisterDiv">
          <div class="formDiv" id="resultsOfValidForm">
          </div>

          <div class="formDiv">
            <input type="submit" class="inputBtnSubmit"
            id="registerBtn" value="Register">
						    <input type='button' onclick='location.href="register"' 
            class='inputBtnCancel' value='Cancel'>
          </div>
        </form>
            
        <div class="inputDiv">
          <button class="inputBtnLink">
            <a href="<?php echo constant('URL').'login';?>" 
            class="link">Sign In</a>
          </button>
        </div>
      
      </div>
    </section>

    <script src="public/js/logins/register.js"></script>
  </body>
</html>