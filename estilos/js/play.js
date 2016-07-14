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
					$a = $('<a href="' + data.ruta + '">' + data.nombre + '</a>');
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
		len = tracks.length-1;
		tracks.click(function(e){
			e.preventDefault();
			

			source = audio.find('source');
			link=$(this);
			current=link.parents("div.cancionnow").index();
			console.log("Canciones cantidad numero:", len);

			runaudio($(link),source)
		})
		}

	audio[0].addEventListener('ended',function(e){
				console.log("largo", len);
				console.log("current", current);	
		current++;
				
		if(current>len){
			current=0;
			link=playlist.find('a')[0];	
		}
		else{
			link=playlist.find('a')[current];
		}

		runaudio($(link),source)
							
	})


	function runaudio(link,player){
	audio.get(0).pause();
	player.attr("src", link.attr('href'));
	console.log("hola entraste a runaudio");
	par=link.parents('.cancionnow');
	par.addClass('active').siblings().removeClass('active');
	audio.get(0).load();
	audio.get(0).play();

	}
$("#menu1").mouseleave(
	function(e){
   $(this).fadeOut('slow');
}); 
});
