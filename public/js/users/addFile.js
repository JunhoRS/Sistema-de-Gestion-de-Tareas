(function(){
  
  const idinputfile = document.querySelector("#idinputfile");
  idinputfile.addEventListener("change", function(){
    var form= document.querySelector("#taskForm");
    var errorLine= taskForm.querySelector("#errorLine");
    var url= document.getElementById('getUrl').value;
    var idProject= document.getElementById('idProject').value;
    var idTask= document.getElementById('idTask').value;
    
    var xml = new XMLHttpRequest();
    var phpPage= url+ 'addFiles/insertFileAjax/' +
    	+ idProject + '/' + idTask;
    var formData= new FormData(form);
    
    xml.onreadystatechange = function() {
      if(xml.readyState === 4 & xml.status === 200) {
        window.location.reload();
      }
    }
    xml.open("post", phpPage, true);
    xml.send(formData);
  });

  var fileDivs= document.getElementsByClassName("fileDiv");
  function loadFileInput(){
    for(var i=0; i<fileDivs.length; i++){
      var fileName = fileDivs[i].children[2].innerHTML;
      var fileExtension = fileName.split('.').pop();
      var icon= fileDivs[i].children[0];
      var fileInfo= fileDivs[i].children[1];

      icon.innerHTML = '<i class="far fa-file"></i>';
      fileInfo.innerHTML= fileExtension.toUpperCase();
    }
  }
  loadFileInput();
}());