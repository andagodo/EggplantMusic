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
					$div = $('<div class="cancionnow" data-idc='+data.id+' ></div>')
					$li = $('<li></li>');
					$a = $('<a class="play1" href="' + data.ruta + '" >' + data.nombre + '</a><div class="btn-cancioncola" data-idc="' + data.id + '" data-idca="' +data.idca+'"><span class="glyphicon glyphicon-option-horizontal"></span></div>');
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
		console.log("Inicia initaudio2");
		playlist=$('#playerul');
		tracks=playlist.find('a');
		console.log(tracks);
		audio[0].volume=1;
		len = tracks.length;

		
		//$(".play1").on('click', function(e){


		$(".play1").unbind("click").click(function (e){
			//alert("click en una cancion");
			e.preventDefault();
			source = audio.find('source');
			link=$(this);
			current=link.parents("div.cancionnow").index();
			runaudio(link,source);
			//return false;

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


		function runaudio(link,player){

		console.log("Inicia Runaudio");
		//player.attr("src", link1.attr('href'));
		$.post( "/front_logica/cargabase64.php", {"ruta": link.attr('href')}, null)

		.done(function( data, textStatus, jqXHR ) {
					audio.get(0).pause();
					player.attr("src", 'data:audio/mp3;base64,'+data);	
					//player.attr("src", link.attr('href'));
					par=link.parents('.cancionnow');
					par.addClass('active').siblings().removeClass('active');
					audio.get(0).load();
					audio.get(0).play();
				})

		};


        function menucola(){
        	cancion1=$('.btn-cancioncola');
        	cancion1.click(function(event) {
            event.preventDefault();
            $id_cancion = $( this ).attr('data-idc');
            $idca_cancion = $( this ).attr('data-idca');
                var x=event.clientX;
                var y=event.clientY;
                var menu3=document.getElementById('menu3');
                menu3.style.top = y+"px";
                menu3.style.left = x-250;
                menu3.style.display = "block";
                $("#menu3").find(".rm-btn").attr("data-idc", $id_cancion);
                $("#menu3").find(".rm-btn").attr("data-idca", $idca_cancion);
        });

        }
	
	$("#menu1").mouseleave(function(e){
		$(this).fadeOut('slow');

	}); 
	$("#menu3").mouseleave(function(e){
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
				//con este alert muestro cuantas li tengo, tengo que controlar tener gmas de dos (dos son las fijas) y 
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

	var rm_btn=$('.rm-btn');
	rm_btn.click(function(event) {

		//$aborrar = ('playerul').find($(this).attr('data-idc'));
		$idcrm = $(this).attr('data-idc');
		console.log($idcrm);
		$('#playerul').find('[data-idc='+$idcrm+']').remove();
		console.log($bt);
		//$("#playlist").remove();
		//console.log($ww);
		//parents('.cancionnow').remove();


	});
	$("#ventana1").on('hidden.bs.modal', function (e) {
  		$("#ventana1").find(".form-control").val("");
  		$('.modal_red').hide();
	});
	$("#menu1").fadeOut("slow");
	
	
});
