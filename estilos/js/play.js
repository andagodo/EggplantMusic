// copied from bootsnipps and edited

var divHeight = $('.affix-row').height(); 
$('#sidenav01').css('min-height', divHeight+'px');
$(window).on('resize', function(){

var divHeight = $('.affix-row').height(); 
$('#sidenav01').css('min-height', divHeight+'px');
});

$(function(){

		var $add = $('.add-btn');

        //cuando hago en el boton con dicha clase agrego a la cola de reproduccion
        $add.click(function(event) {
     		event.preventDefault();
     		$out = "";
     		//capturo ID de cancion
               $id_cancion = $( this ).attr('data-idc');
            //le paso el id al php que trae la cancion de l BD por JSON
				$.post( "../front_logica/add-now.php", { "idc" : $id_cancion }, null, "json" )
				.done(function( data, textStatus, jqXHR ) {
					$div = $('<div class="cancionnow" ></div>')
					$li = $('<li></li>');
					$a = $('<a href="' + data.ruta + '"data-idc="'+ data.id + '" >' + data.nombre + '</a>');
					$li.append($a);
					$div.append($li);
					$("#playerul").append($div);
					initaudio2();
					if ( console && console.log ) {
				   	console.log( "La solicitud se ha completado correctamente." );
				}
				})
				.fail(function( jqXHR, textStatus, errorThrown ) {
				  	if ( console && console.log ) {
				    console.log( "La solicitud a fallado: " +  textStatus);
				}
				});
				$("#menu1").fadeOut("slow");
				});

	audio=$('audio');
	current=0;

	function initaudio2(){

		playlist=$('#playerul');
		tracks=playlist.find('li a');
		console.log(tracks);
		audio[0].volume=1;
		len = tracks.length;
		tracks.click(function(e){
			e.preventDefault();
			

			source = audio.find('source');
			link=$(this);
			current=link.parents("div.cancionnow").index();
			console.log("Canciones cantidad numero:", len);
			console.log("Canciones current numero:", current);
			runaudio($(link),source)
		})
		}

	audio[0].addEventListener('ended',function(e){
				console.log("largo", len);
				console.log("current", current);	
		current++;
				
		if(current>len){
			current=1;
			link=playlist.find('li a')[current-1];	
		}
		else{
			link=playlist.find('li a')[current-1];
		}

		runaudio($(link),source)
							
	})


	function runaudio(link1,player){
	audio.get(0).pause();
	player.attr("src", link1.attr('href'));
	console.log("hola entraste a runaudio");
	par=link1.parents('.cancionnow');
	par.addClass('active').siblings().removeClass('active');
	audio.get(0).load();
	audio.get(0).play();
	}

	$("#menu1").mouseleave(
		function(e){
	   $(this).fadeOut('slow');

					}
		); 

        $(".addplaylist").click(function(event) {
            event.preventDefault();

            $.post( "../front_logica/consplaylist.php", { "idu" : IdUsr }, null, "json" )
				.done(function( data, textStatus, jqXHR ) {
					
					for (var i = 0; i < data.length; i++) {
   						console.log(data[i].id);
   						$li = $('<li></li>');
   						$a = $('<a class="add-btn" href="#" data-idpl="'+ data[i].id + '" >' + data[i].nom + '</a>');
   						$li.append($a);
   						$('#menu2').find("ul").append($li);
   						//hasta aca agrego los li con la info de las playlist del usuario
					}
				alert($('#menu2').find("li").length);
				//con este alert muestro cuantas li tengo, tengo que controlar tener mas de dos (dos son las fijas) y 
				//luego en el if si tiene mas borrar y recargar( o ver posible mejora.)
					
					if ( console && console.log ) {
				   	console.log( "La solicitud se ha completado correctamente." );
													}
				})
				.fail(function( jqXHR, textStatus, errorThrown ) {
				  	if ( console && console.log ) {console.log( "La solicitud a fallado: " +  textStatus);}
			});
				



            var x=event.clientX;
            var y=event.clientY;
            //console.log(y);
            //console.log(x);
            var menu2=document.getElementById('menu2');
            menu2.style.top = y+"px";
            menu2.style.left = x+"px";
            menu2.style.display = "block";
            // obtengo el id de la cancion
        	});

	$("#menu2").mouseleave(function(e){$(this).fadeOut('slow');}); 

});
