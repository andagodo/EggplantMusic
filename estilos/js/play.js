// copied from bootsnipps and edited

var divHeight = $('.affix-row').height(); 
$('#sidenav01').css('min-height', divHeight+'px');
$(window).on('resize', function(){

var divHeight = $('.affix-row').height(); 
$('#sidenav01').css('min-height', divHeight+'px');
});



$(function(){

	function datos_usr(){
				    $.post( "/front_logica/cuentaUsr.php", { "idu": IdUsr }, null, "json" )
					.done(function( data, textStatus, jqXHR ) {
						$cuenta_id = data[0].id;
						$cuenta_Tipo = data[0].Tipo;
						$cuenta_Cant_PlaylistxC = data[0].Cant_PlaylistxC;
						$cuenta_Precio = data[0].Precio;
							if ( console && console.log ) {
							   	console.log( "La solicitud se ha completado correctamente." );
							}
					})
					.fail(function( jqXHR, textStatus, errorThrown ) {
							if ( console && console.log ) {
							    console.log( "La solicitud a fallado: " +  textStatus);
							}
					});
	}

	datos_usr();

		traer_album();
		audio=$('audio');
		current=1;

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
				current=link.parents(".cancionnow").index();
				console.log(current);
				runaudio(link,source);

				//return false;

			})
		
		}

	//#### Funcion encargada de agregar cancion a lista de reproduccion 
			var $add = $('.add-btn');
       		 //cuando hago en el boton con dicha clase agrego a la cola de reproduccion
       		$add.click(function(event) {
     			event.preventDefault();
				$out = "";
     			//capturo ID de cancion
               	$id_cancion = $(this).attr('data-idc');
               	$idca_cancion = $(this).attr('data-idca');
               	console.log("add-btn funcion");
               	num = $('#playerul > div').find('[data-idc='+$id_cancion+']').length;
             	//  alert(num);
               	if (num === 1) {
               		$.alert("La cancion ya existe en la playlist o cola de reproduccion");
               		//$(".alert").alert();
               	}
               	else
               	{
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

               		};
           			 //le paso el id al php que trae la cancion de l BD por JSON
				$("#menu1").fadeOut("slow");
			});
	//####



		function runaudio(link,player){

		console.log("Inicia Runaudio");
		//player.attr("src", link1.attr('href'));
		$.post( "/front_logica/cargabase64.php", {"ruta": '../audio/'+link.attr('href')}, null)

		.done(function( data, textStatus, jqXHR ) {
			if (data) {
					audio.get(0).pause();
					player.attr("src", 'data:audio/mp3;base64,'+data);	
					//player.attr("src", link.attr('href'));
					par=link.parents('.cancionnow');
					par.addClass('active').siblings().removeClass('active');
					audio.get(0).load();
					audio.get(0).play();
					$idc = par.attr('data-idc');
					$.post( "/front_logica/logica_logs.php", {"consulta": 'RPC', "idc" :$idc, "idu":IdUsr }, null)

				
			}else{
				alert('Error en reproducción');
			}

					
				})

		}


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
	 $('#mventana1').click(function(){
	 	  $.post( "/front_logica/consplaylist.php", { "idu" : IdUsr }, null, "json" )
          .done(function( data, textStatus, jqXHR ) {
          	console.log(data.playlist.length);
          	console.log($cuenta_Cant_PlaylistxC);
          	cant_canc = $("#playerul .cancionnow li .btn-cancioncola").length;
          	if ($cuenta_Tipo == 'Premium') {
          		console.log('Premium');
          		if (cant_canc == '0') {
						$.alert('Agrega una o mas canción para poder crear la playlist ');

					}else{
						$('#ventana1').modal('show');
					}

          	}else{

          	if (data.playlist.length<$cuenta_Cant_PlaylistxC){
          		
					if (cant_canc == '0') {
						$.alert('Agrega una o mas canción para poder crear la playlist ');

					}else{
						$('#ventana1').modal('show');
					}
          	}else{
          		$.alert('Llegaste al máximo de playlist que permite esta membresía.<br> Tipo de membresía: '+$cuenta_Tipo+'');
          	}

          	}

	 })
		
	      

    });

	var $tonewpl = $('.tonewpl');
	        $tonewpl.click(function(event){
     		event.preventDefault();
     		$out = "";
     		var $vent = $("#ventana1");
            var $npl = $("#ventana1").find(".form-control").val();
		            if ( $npl === '') {
		            	//alert("pone algo");
		            	$('.modal_red').show();
		            	} else {

		            		var c = [];
							$( "#playerul .cancionnow li .btn-cancioncola" ).each(function(index) {
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
		initaudio2();
		$("#menu3").fadeOut('slow');

	});

	$("#ventana1").on('hidden.bs.modal', function (e) {
  		$("#ventana1").find(".form-control").val("");
  		$('.modal_red').hide();
	});
	$("#menu1").fadeOut("slow");
	

	

	///////////
	/////////////////////////////////////////////////////////////////////
	function reload_album() {
		$('#album > li > a').click(function(){
			$ss = $(this).attr('data-id');
			  $.post( "/front_logica/playlist_album.php", { "idalbum" : $ss }, null, "json" )
	                .done(function( data, textStatus, jqXHR ) {
	                    $('#central').empty();
	                    $container = $('<div class="col-sm-2 col-md-3 affix-content"><div class="container"><ul id="playlist"></ul></div></div>');
	                    $('#central').append($container);
	                    for (var i = 0; i < data.length; i++) {
	                    	$div = $('<div class="cancion"></div>');
	                       	$li = $('<li></li>');
	                        $a = $('<a href="#">'+data[i].nom+'</a><div class="btn-cancion" data-idc="'+data[i].id+'" data-idca="'+data[i].idca+'"><span class="glyphicon glyphicon-option-horizontal"></span></div>');
	                        $li.append($a);
	                        $div.append($li);
	                        $('#playlist').append($div);

	                        $.post( "/front_logica/logica_logs.php", {"consulta": 'LBA', "ida" :$ss, "idu":IdUsr }, null)
	                    }
	                    cargaplaylistjs();
	                    if ( console && console.log ) {
	                    console.log( "La solicitud se ha completado correctamente." );
	                                                    }
	                })
	                .fail(function( jqXHR, textStatus, errorThrown ) {
	                    if ( console && console.log ) {console.log( "La solicitud a fallado: " +  textStatus);}
	            });
			});
		}
		
        // Esto abre el menu 1 de la cancion dentro del album
	    function cargaplaylistjs(){
			console.log("inciada la funcion");
			cancion=$("div.btn-cancion");
	        cancion.click(function(event){
	            event.preventDefault();
	            $id_cancion = $( this ).attr('data-idc');
                $idca_cancion = $( this ).attr('data-idca');
	              $.post( "/front_logica/consplaylist.php", { "idu" : IdUsr }, null, "json" )
                .done(function( data, textStatus, jqXHR ) {
                    $('#menu1pl').empty();
                    if (data.confirm === "true") {
                    		$('#menu1pl').empty();
                    		$('.titmenu1').show();
                    		$('#menu1pl').append('<li class="divider"></li>');
                    	for (var i = 0; i < data.playlist.length; i++) {
                    		$('#menu1 > ul').append('')
	                        $li = $('<li></li>');
	                        $a = $('<div class="contmenu1"><a class="add-pl" href="#" data-idpl="'+ data.playlist[i].id + '" >' + data.playlist[i].nom + '</a></div>');
	                        $li.append($a);
	                        $('#menu1pl').append($li);
                    	}
                    }else{
                    	$('.titmenu1').hide();
                    	$('#menu1pl').empty();
                        } 
                           var x=event.clientX;
                            var y=event.clientY;
                            var menu1=document.getElementById('menu1');
                            menu1.style.top = y+"px";
                            menu1.style.left = x+"px";
                            menu1.style.display = "block";
                            $("#menu1").find("a").attr("data-idc", $id_cancion);
                            $("#menu1").find("a").attr("data-idca", $idca_cancion);
                            carga_btn_pl();
                    
                    if ( console && console.log ) {
                    console.log( "La solicitud se ha completado correctamente." );
                                                    }
                })
                .fail(function( jqXHR, textStatus, errorThrown ) {
                    if ( console && console.log ) {console.log( "La solicitud a fallado: " +  textStatus);}
            });

			});
		}

		function carga_btn_pl(){
				var $addpl = $('.add-pl');
       		 //cuando hago en el boton con dicha clase agrego a la cola de reproduccion
       		$addpl.click(function(event) {
     			event.preventDefault();
     			//capturo ID de cancion
               	$id_cancion = $(this).attr('data-idc');
               	$idca_cancion = $(this).attr('data-idca');
               	$id_playlist = $(this).attr('data-idpl');
                  $.post( "/front_logica/addplaylist.php", { "idc":$id_cancion, "idca":$idca_cancion, "idpl": $id_playlist }, null, "json" )
                     .done(function(data, textStatus, jqXHR) {
                		if (data.ok == "True") {
                				console.log('dentro del if');
                		}else{
                			$.alert("La canción ya existe en la playlist seleccionada.");
                		}


                    if ( console && console.log ) {
                    console.log( "La solicitud se ha completado correctamente." );
                                                    }
                })
                .fail(function( jqXHR, textStatus, errorThrown ) {
                    if ( console && console.log ) {console.log( "La solicitud a fallado: " +  textStatus);}
            });
		});
		}
		function buscador_a(){
	    $('#s_album').keyup(function () {
 
                    var rex = new RegExp($(this).val(), 'i');
                    $('#album li').hide();
                    $('#album li').filter(function () {
                        return rex.test($(this).text());
                    }).show();
 
                })
	    }

	    function traer_album(){
	    $.getJSON("/front_logica/album.php", function(result){
   				$('#izquierda').empty();
   				$('#central').empty();
                $container = $('<div class="col-sm-3 col-md-4 affix-content"><div class="container"><ul id="album"></ul></div></div>');
                $('#izquierda').append($container);
                $buscador = $('<span class="glyphicon glyphicon-search lupa"></span><input id="s_album" type="text">');
                $('#album').append($buscador);
                for (var i = 0; i < result.length; i++) {
                    $li = $('<li><a href="#" data-id='+ result[i].id +'>'+ result[i].nom +'</li>');
                    $('#album').append($li);
                    }
                    reload_album();
                    buscador_a();

				 });
		}
		function efecto_playlist(){
			$( '#playlist_usr > li' )
  				.mouseover(function() {
    			$( this ).find( ".btns" ).css('display', 'inline-block');
			  		})
  					.mouseout(function() {
  					$( this ).find( ".btns" ).css('display', 'none');
				  	});
		}

		function traer_playlist(){
			$.post( "/front_logica/playlist.php", { "idu" : IdUsr }, null, "json" )
               			.done(function( data, textStatus, jqXHR ) {
           					$('#izquierda').empty();
			   				$('#central').empty();
				   				if (data.confirmpu === "true") {

				   					$container = $('<div class="col-sm-3 col-md-4 affix-content"><div class="container"><ul id="playlist_usr"> </ul></div></div>');
					                $('#izquierda').append($container);
					                $buscador = $('<span class="glyphicon glyphicon-search lupa"></span><input id="s_playlist"  type="text">');
					                $('#playlist_usr').append($buscador);
					                $tit = $('<div class="tit_playlist"> Mis Playlist.. </div>');
	                   				$('#playlist_usr').append($tit);

					                		for (var i = 0; i < data.playlistusr.length; i++) {
						                    $li = $('<li><a href="#" data-id='+ data.playlistusr[i].id +'>'+ data.playlistusr[i].nom +' </a><div class="btns pull-right"><span class="glyphicon glyphicon-play-circle"></span><span class="glyphicon glyphicon-minus"></span></div></li>');
						                    $('#playlist_usr').append($li);
			                  			 	}
			                   }else{
			                   		$container = $('<div class="col-sm-3 col-md-4 affix-content"><div class="container"><ul id="playlist_usr"><div class="tit_playlist">No tienes playlist propias creadas...</div></ul></div></div>');
			                   		$('#izquierda').append($container);
	                   			}
	                   			if (data.confirmps === "true") {
	                   				$tit = $('<div class="tit_playlist"> Playlist EggPlantMusic <span class="glyphicon glyphicon-music"></span></div>')
	                   				$('#playlist_usr').append($tit);
	                   				for (var i = 0; i < data.playlistsys.length; i++) {
	                   					$li = $('<li><a href="#" data-id='+ data.playlistsys[i].id +'>'+ data.playlistsys[i].nom +' </a><div class="btns pull-right"><span class="glyphicon glyphicon-play-circle"></span></div></li>')
	                   				  	$('#playlist_usr').append($li);
	                   				}

	                   			}

     						if ( console && console.log ) {console.log( "La solicitud se ha completado correctamente." );}
     						reload_playlist();
     						efecto_playlist();
                		})
                		.fail(function( jqXHR, textStatus, errorThrown ) {

                    		if ( console && console.log ) {console.log( "La solicitud a fallado: " +  textStatus);}
         				});
		}

		$('#mmplaylist').click(function(){
			traer_playlist()
			});

		$('#malbum').click(function(){
			traer_album();
          });

		function reload_playlist(){
		$( '#playlist_usr > li > a' ).click(function(){

			$idp = $(this).attr('data-id');
		 	$.post( "/front_logica/playlist_cancion.php", { "idp" : $idp }, null, "json" )
                .done(function( data, textStatus, jqXHR ) {

                    $('#central').empty();
                    $container = $('<div class="col-sm-2 col-md-3 affix-content"><div class="container"><ul id="playlist"></ul></div></div>');
                    $('#central').append($container);
                    for (var i = 0; i < data.length; i++) {
                        
                    
                    	$div = $('<div class="cancion"></div>');
                       	$li = $('<li></li>');
                        $a = $('<a href="#">'+data[i].nom+'</a><div class="btn-cancion" data-idc="'+data[i].id+'" data-idca="'+data[i].idca+'"><span class="glyphicon glyphicon-option-horizontal"></span></div>');
                        $li.append($a);
                        $div.append($li);
                        $('#playlist').append($div);
             			
                        
                        //hasta aca agrego los li con la info de las playlist del usuario
                    }
                    $.post( "/front_logica/logica_logs.php", {"consulta": 'LBP', "idp" :$idp, "idu":IdUsr }, null)
                    cargaplaylistjs();
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
			});

		$( '#playlist_usr > li > .btns > .glyphicon-minus' ).click(function(){
			$li = $(this).parents('li');
			$idpl = $li.find('a').attr('data-id');
			//codigo para boton de borrado de playlist (simbolo de menos rojo)
			$.confirm({
			    title: 'Cuidado!',
			    content: '¿ Seguro desea eliminar esta Playlist ?',
			    buttons: {
			    	Confirmar: {
			    	btnClass: 'btn-red',
			        action: function () {
			        	//	$idpl= $( '#playlist_usr > li > a' ).attr('data-id');
							$.post( "/front_logica/elimina_playlist.php", { "idpl" : $idpl }, null, "json" )
							.done(function(data, textStatus, jqXHR){
								$.alert('La playlist fue borrada!');
								traer_playlist();
							})
			        }
			        },
			        Cancelar: function () {
			        },
			    }
			});
		

		});

		$( '#playlist_usr > li > .btns > .glyphicon-play-circle' ).click(

			function(event){

			event.preventDefault;

				$li = $(this).parents('li');
				$idp = $li.find('a').attr('data-id');
			 	$.post( "/front_logica/playlist_cancion.php", {"idp" : $idp }, null, "json")
                .done(function( data, textStatus, jqXHR ) {                 
                $("#playerul").empty();
                    for (var i = 0; i < data.length; i++) {

                    	$div = $('<div class="cancionnow" data-idc='+data[i].id+' ></div>')
						$li = $('<li></li>');
						$a = $('<a class="play1" href="' + data[i].ruta + '" >' + data[i].nom + '</a><div class="btn-cancioncola" data-idc="' + data[i].id + '" data-idca="' +data[i].idca+'"><span class="glyphicon glyphicon-option-horizontal"></span></div>');
						$li.append($a);
						$div.append($li);
						$("#playerul").append($div);

						
                    }
                    $.post( "/front_logica/logica_logs.php", {"consulta": 'LRP', "idp" :$idp, "idu":IdUsr }, null)
                    initaudio2();
					menucola();
						link = $('.cancionnow:first a');
						source = audio.find('source');
						current=1;
						runaudio(link,source);
		
					})

		});
}
});



