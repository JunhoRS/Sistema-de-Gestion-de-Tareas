  var body = document.body,
    html = document.documentElement;

  var varHeight = Math.max( body.scrollHeight, body.offsetHeight, 
    html.clientHeight, html.scrollHeight, html.offsetHeight );
  
  var iframe= document.querySelector("iframe");
  var iframeSize= varHeight - 60;

  iframe.style.height= iframeSize + "px";