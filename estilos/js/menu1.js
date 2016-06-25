//muestro menu de cancion de forma dinamica
function mostrarMenu1(event){

	event.preventDefault();
	var x=event.clientX;
 	var y=event.clientY;

	//console.log(y);
	//console.log(x);

	var menu1=document.getElementById('menu1');
	menu1.style.top = y+"px";
	menu1.style.left = x+"px";
	menu1.style.display = "block";


}