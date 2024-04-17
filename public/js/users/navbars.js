(function(){

  var navbar= document.getElementById("navbar");

  function mostocultNavDiv(){ 
    var menuId = document.getElementById("userNav");
    if(counter==0){
      menuId.classList.remove('floatNav');
      menuId.classList.add('floatNavBlock');
      counter++;
    } else if(counter==1){
      menuId.classList.remove('floatNavBlock');
      menuId.classList.add('floatNav');
      counter--;
    }
  }
  
  var btnMostOcultNav= document.getElementById("btnMostOcultNav");
  btnMostOcultNav.addEventListener("click", mostocultNavDiv);

  var counter = 0;

  const btnToggle = document.querySelector('.toggle-btn');

  btnToggle.addEventListener('click', function(){
    document.getElementById('sidebar').classList.toggle('active');
  });

  window.onload = function(){
    var loadDiv = document.getElementById("loadDiv");
  
    loadDiv.style.visibility = "hidden";
    loadDiv.style.opacity = "0";
  }
  

}());