<!doctype html>
<html>
<head>
  <title>AJAX</title>
<script>
function cargarLista(){
  var xmlhttp;
  if( window.XMLHttpRequest ){
    xmlhttp = new XMLHttpRequest();
  }else if(window.ActiveXObject) {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }else{
    return false;
  }
 
  xmlhttp.open('GET', 'json.php');
 
  xmlhttp.onreadystatechange = function(){
    if( xmlhttp.readyState == 4 && xmlhttp.status == 200 ){
      var r = xmlhttp.responseText,
      //Convertimos la cadena a JSON
      json = eval('(' + r + ')'),
      ul = document.createElement( 'ul' );
 
      if( json.length ){
        for( var i in json ){
          var li = document.createElement('li');
          li.innerHTML = json[i];
          ul.appendChild(li);
        }
        document.getElementById('response').appendChild(ul);
      }
    }
  }
 
  xmlhttp.send( null );
}
</script>
</head>
<body>
<a href="javascript:;" onclick="cargarLista()">Cargar lista</a><br />
 
<div id="response">
</div>
</body>
</html>