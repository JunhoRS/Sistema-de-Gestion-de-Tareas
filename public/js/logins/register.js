(function(){
  var registerBtn= document.getElementById("registerBtn");
  var passInput= document.getElementById("pass");
  var passVerif = "";
  var usernameVerif = "";
  var url = document.getElementById('getUrl').value;
  
  registerBtn.addEventListener("click", function(){
    validRegister();
  });

  passInput.addEventListener("click", function(){
    validPassword();
  });

  passInput.addEventListener('focus', (event) => {
    var errorLines= document.getElementById("errorLines");
    errorLines.style.display = 'block';
  });

  function validRegister(){
    var names= document.getElementById('names').value;
    var surnames= document.getElementById('surnames').value;
    var username= document.getElementById('username').value;
    var pass= document.getElementById('pass').value;
    var confirmPass= document.getElementById('confirmPass').value;  
       
    var errorLine1= document.getElementById("errorLine1");
    var errorLine2= document.getElementById("errorLine2");
  
    checkUsername(username);

    var validUsernameDB= function(){
      if(usernameVerif !== "true"){  
        errorLine1.innerHTML= "This user has been used!";
        document.getElementById('username').classList.add("errorInput");
        return false;

      } else {
        document.getElementById('username').classList.remove("errorInput");
        return true;
      }
    }

    var validNames= function(){
      if(names.length < 3){
        errorLine1.innerHTML= "Minimum 3 leters in names";
        document.getElementById('names').classList.add("errorInputNames");
        return false;     
      } else if(names.length > 35){
        errorLine1.innerHTML= "Maximum 20 leters in names";
        document.getElementById('names').classList.add("errorInputNames");
        return false;
      } else if(names.search(/[^a-zA-Z]+/) !== -1){
        errorLine1.innerHTML= "Only letters can be entered";
        document.getElementById('names').classList.add("errorInputNames");
        return false;
      } else {
        document.getElementById('names').classList.remove("errorInputNames");
      }
      return true;
    }

    var validSurnames= function(){
      if(surnames.length < 5){
        errorLine1.innerHTML= "Minimum 5 leters in surnames";
        document.getElementById('surnames').classList.add("errorInputNames");
        return false;     
      } else if(surnames.length > 25){
        errorLine1.innerHTML= "Maximum 25 leters in surnames";
        document.getElementById('surnames').classList.add("errorInputNames");
        return false;
      } else if(surnames.search(/[^a-zA-Z]+/) !== -1){
        errorLine1.innerHTML= "Only letters can be entered";
        document.getElementById('surnames').classList.add("errorInputNames");
        return false;
      } else {
        document.getElementById('surnames').classList.remove("errorInputNames");
      }
      return true;
    }

    var validUsername= function(){
      if(username.length < 5){
        errorLine1.innerHTML= "Minimum 5 caracters in username";
        document.getElementById('username').classList.add("errorInput");
        return false;     
      } else if(username.length > 25){
        errorLine1.innerHTML= "Maximum 25 caracters in username";
        document.getElementById('username').classList.add("errorInput");
        return false;
      } else {
        document.getElementById('username').classList.remove("errorInput");
      }
      return true;
    }

    var validConfirmPass= function(){
      if(pass !== confirmPass){
        errorLine2.innerHTML= "The passwords does not match";
        document.getElementById('pass').classList.add("errorInput");
        document.getElementById('confirmPass').classList.add("errorInput");
        return false;
      } else {
        document.getElementById('pass').classList.remove("errorInput");
        document.getElementById('confirmPass').classList.remove("errorInput");
        return true;
      }
    }

    if(validNames() && validConfirmPass() && validUsername() 
     && validSurnames() && passVerif==="true" && validUsernameDB()){
      registerPhp(names, surnames, username, pass);
      checkRegister();
    } else {
      return false;
    }
    
  }

  function validPassword(){
    var mayus = new RegExp("^(?=.*[A-Z])");
    var special = new RegExp("^(?=.*[!@#$%&*])");
    var numbers = new RegExp("^(?=.*[0-9])");
    var lower = new RegExp("^(?=.*[a-z])");
    var len = new RegExp("^(?=.{8,})");

    var mayusId= document.getElementById("mayus");
    var specialId= document.getElementById("special");
    var numbersId= document.getElementById("numbers");
    var lowerId= document.getElementById("lower");
    var lenId= document.getElementById("len");

    var regExp = [mayus,special,numbers,lower,len];
    var elements = [mayusId,specialId,numbersId,lowerId,lenId];

    document.getElementById('pass').addEventListener("keyup", function(){
      var counter= 0;
      for(var i=0; i<5; i++){
        if(regExp[i].test(document.getElementById('pass').value)){
          elements[i].style.display = 'none';
          counter++;
        }else{
          elements[i].style.display = 'block';
        }
      }
      if(counter == 5){
        passVerif= "true";
        document.getElementById('pass').classList.remove("errorInput");
      } else if(counter == 0){
        passVerif= "false";
        document.getElementById('pass').classList.add("errorInput");
        document.getElementById('errorLine2').innerHTML="Invalid Password";
      } else {
        passVerif= "false";
        document.getElementById('pass').classList.add("errorInput");
      }
    });
  }
  
  function checkRegister(){
    var validRegisterDiv= document.querySelector("#validRegisterDiv");
    var checkRegisterDiv= document.querySelector("#checkRegisterDiv");

    validRegisterDiv.style.display= "none";
    checkRegisterDiv.style.display= "block";
  }

  function checkUsername(username){
    var xml = new XMLHttpRequest();
    var phpPage= url+ 'ajaxController/checkUsername';
    var header = "username=" + username;

    xml.open('POST', phpPage, true);
    xml.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xml.onreadystatechange = function() {
      if(xml.readyState === 4 & xml.status === 200) {
        usernameVerif = xml.responseText;
      }
    }

    xml.send(header);
  }

  function registerPhp(names, surnames, username, pass){
    var xml = new XMLHttpRequest();
    var phpPage= url+ 'ajaxController/register';
    var header = "names=" + names + "&surnames=" + 
    surnames + "&username=" + username + "&pass=" + pass;

    xml.open('POST', phpPage, true);
    xml.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xml.onreadystatechange = function() {
      if(xml.readyState === 4 & xml.status === 200) {
        document.getElementById("resultsOfValidForm").innerHTML = 
        xml.responseText;
      }
    }   

    xml.send(header);
  }

}());