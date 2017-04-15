//muestro menu de cancion de forma dinamica
/*
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


$(function(){
    
        var $cancion = $("div.btn-cancion");

        // Esto abre el menu 1 de la cancion dentro del album
        $cancion.click(function(event) {
            event.preventDefault();
            alert("hola")
              $('#menu1pl').append($li);
                         $id_cancion = $( this ).attr('data-idc');
                        $idca_cancion = $( this ).attr('data-idca');
                           var x=event.clientX;
                            var y=event.clientY;
                            //console.log(y);
                            //console.log(x);
                            var menu1=document.getElementById('menu1');
                            menu1.style.top = y+"px";
                            menu1.style.left = x+"px";
                            menu1.style.display = "block";
                            $("#menu1").find("a").attr("data-idc", $id_cancion);
                            $("#menu1").find("a").attr("data-idca", $idca_cancion);
            
                $.post( "/front_logica/consplaylist.php", { "idu" : IdUsr }, null, "json" )
                .done(function( data, textStatus, jqXHR ) {
                    $('#menu1pl').empty();
                    for (var i = 0; i < data.length; i++) {
                        console.log(data[i].id);
                        $li = $('<li></li>');
                        $a = $('<div class="contmenu1"><a class="add-btn" href="#" data-idpl="'+ data[i].id + '" >' + data[i].nom + '</a></div>');
                        $li.append($a);
                        
                      
                        //hasta aca agrego los li con la info de las playlist del usuario
                    }
                //alert($('#menu2').find("li").length);
                //con este alert muestro cuantas li tengo, tengo que controlar tener gmas de dos (dos son las fijas) y 
                //luego en el if si tiene mas borrar y recargar( o ver posible mejora.)
                    
                    if ( console && console.log ) {
                    console.log( "La solicitud se ha completado correctamente." );
                                                    }
                })
                .fail(function( jqXHR, textStatus, errorThrown ) {
                    if ( console && console.log ) {console.log( "La solicitud a fallado: " +  textStatus);}
            });
           
            // obtengo el id de la cancion
            console.log($id_cancion);

        });

    });






*/



