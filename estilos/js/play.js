// copied from bootsnipps and edited

var divHeight = $('.affix-row').height(); 
$('#sidenav01').css('min-height', divHeight+'px');
$(window).on('resize', function(){

var divHeight = $('.affix-row').height(); 
$('#sidenav01').css('min-height', divHeight+'px');
});



$(function(){
		traer_album();
		audio=$('audio');
		current=0;

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
				current=link.parents("div.cancionnow").index();
				runaudio(link,source);
				//return false;

			})
		
		};

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
               		alert("La cancion ya existe en la playlist o cola de reproduccion");
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

	var $tonewpl = $('.tonewpl');
	        $tonewpl.click(function(event){
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
	
	$('.cancion > li > div').click(function(){

			alert($(this).attr('data-idc'));
		});
	
	

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
                        
                    //    $a = $('<div class="contmenu1"><a class="add-btn" href="#" data-idpl="'+ data[i].id + '" >' + data[i].nom + '</a></div>');
                    	$div = $('<div class="cancion"></div>');
                       	$li = $('<li></li>');
                        $a = $('<a href="#">'+data[i].nom+'</a><div class="btn-cancion" data-idc="'+data[i].id+'" data-idca="'+data[i].idca+'"><span class="glyphicon glyphicon-option-horizontal"></span></div>');
                        $li.append($a);
                        $div.append($li);
                        $('#playlist').append($div);
             			
                        
                        //hasta aca agrego los li con la info de las playlist del usuario
                    }
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
                    for (var i = 0; i < data.length; i++) {
                        $li = $('<li></li>');
                        $a = $('<div class="contmenu1"><a class="add-pl" href="#" data-idpl="'+ data[i].id + '" >' + data[i].nom + '</a></div>');
                        $li.append($a);
                        $('#menu1pl').append($li);
                   
                        //hasta aca agrego los li con la info de las playlist del usuario
                    }
                       	   
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
                            carga_btn_pl();


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
            //   	console.log("add-pl funcion");
              // 	alert("pinto empezar a mandar a la playlist"+$id_cancion+$idca_cancion+$id_playlist);
                  $.post( "/front_logica/addplaylist.php", { "idc":$id_cancion, "idca":$idca_cancion, "idpl": $id_playlist }, null, "json" )
                     .done(function(data, textStatus, jqXHR) {
                		if (data.ok == "True") {
                				console.log('dentro del if');
                		}else{
                			alert("La canción ya existe en la playlist seleccionada.");
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
                $container = $('<div class="col-sm-2 col-md-3 affix-content"><div class="container"></div></div>');
                $('#izquierda').append($container);
                $buscador = $('<span class="glyphicon glyphicon-search lupa"></span><input id="s_album" class="search_album" type="text">');
                $container.append($buscador);
                $album = $('<ul id="album"></ul>');
                $container.append($album);
                for (var i = 0; i < result.length; i++) {
                    $li = $('<li><a href="#" data-id='+ result[i].id +'>'+ result[i].nom +'</li>');
                    $('#album').append($li);
                    }
                    reload_album();

				 });
		
   		}

});
