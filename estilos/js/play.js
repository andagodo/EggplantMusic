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
               $idca_cancion = $(this).attr('data-idca');
            //le paso el id al php que trae la cancion de l BD por JSON
				$.post( "/front_logica/add-now.php", {"idca": $idca_cancion, "idc": $id_cancion }, null, "json" )

				.done(function( data, textStatus, jqXHR ) {
					$div = $('<div class="cancionnow" ></div>')
					$li = $('<li></li>');
					$a = $('<a href="data:audio/mp3;base64,' + data.ruta + '"data-idc="'+ data.id + '" data-idca="' +data.idca+ '" >' + data.nombre + '</a><div class="btn-cancioncola"><span class="glyphicon glyphicon-option-horizontal"></span></div>');
					$li.append($a);
					$div.append($li);
					$("#playerul").append($div);
					initaudio2();
					menucola();

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
							
	});


		function runaudio(link1,player){
		audio.get(0).pause();
		player.attr("src", link1.attr('href'));
		console.log("hola entraste a runaudio");

		//llamar php para devolver archivo completo BASE64
		par=link1.parents('.cancionnow');
		par.addClass('active').siblings().removeClass('active');
		audio.get(0).load();
		audio.get(0).play();
		}

			//probando menu3
        // Intento de abrir el menu 3 en el boton de la cancion dentro de la cola de reproduccion 
    
        function menucola(){
        	cancion1=$('.btn-cancioncola');
        	cancion1.click(function(event) {
            event.preventDefault();
    		console.log("holaaaaaaaaaaaaaaaaaaaaaaa");
            //
            //$id_cancion = $( this ).attr('data-idc');
            //$idca_cancion = $( this ).attr('data-idca');
              //  var x=event.clientX;
               // var y=event.clientY;
                //console.log(y);
                //console.log(x);
                //var menu1=document.getElementById('menu3');
                //menu1.style.top = y+"px";
                //menu1.style.left = x-350;
                //menu1.style.display = "block";
                //$("#menu3").find("a").attr("data-idc", $id_cancion);
                //$("#menu3").find("a").attr("data-idca", $idca_cancion);
            // obtengo el id de la cancion
        });
		//probando menu3 fin 
	



        }
    
	
	$("#menu1").mouseleave(function(e){
		$(this).fadeOut('slow');

	}); 

    $(".addplaylist").click(function(event){
            event.preventDefault();

            $.post( "/front_logica/consplaylist.php", { "idu" : IdUsr }, null, "json" )
				.done(function( data, textStatus, jqXHR ) {
					$('#menu2pl').empty();
					for (var i = 0; i < data.length; i++) {
   						console.log(data[i].id);
   						$li = $('<li></li>');
   						$a = $('<div class="menu2selector"><a class="add-btn" href="#" data-idpl="'+ data[i].id + '" >' + data[i].nom + '</a></div>');
   						$li.append($a);
   						
   						$('#menu2pl').append($li);
   						//hasta aca agrego los li con la info de las playlist del usuario
					}
				//alert($('#menu2').find("li").length);
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

	$("#menu2").mouseleave(function(e){
		$(this).fadeOut('slow');
	}); 

	// Click para crear playlist nueva no se utiliza este codigo por ahora
	// $('#mventana1').click(function(){
	 //	alert('hola');
     //   $('#ventana1').modal('show');
    //});

	var $addpl = $('.tonewpl');
	        $addpl.click(function(event){
     		event.preventDefault();
     		$out = "";
     		var $vent = $("#ventana1");
            var $npl = $("#ventana1").find(".form-control").val();
		            if ( $npl === '') {
		            	//alert("pone algo");
		            	$('.modal_red').show();
		            	} 
		            	else {

		            		var c = [];
							$( "#playerul .cancionnow li a" ).each(function(index) {
								c.push($(this).attr('data-idca'));
							});
							var cJSON = JSON.stringify(c);
							$.post( "/front_logica/playcanc.php", { "idu" : IdUsr, c : cJSON, npl : $npl}, null , "json");
							$vent.modal('hide');
							
					}
				});
	$("#ventana1").on('hidden.bs.modal', function (e) {
  	$("#ventana1").find(".form-control").val("");
  	$('.modal_red').hide();
	});
	$("#menu1").fadeOut("slow");
	
	
});
