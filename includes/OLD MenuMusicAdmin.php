<?php
if ($rol == "SuperAdmin" ){
?>
<script language="javascript">
	$(document).ready(function(){
			$('#target').show(); //muestro mediante id
			$('.target').show(); //muestro mediante clase
	});
</script>
<?php
}elseif ($rol == "MusicAdmin" ){
?>
<script language="javascript">
	$(document).ready(function(){
			$('#menumusicadashboard').show(); //muestro mediante id
			$('#menusuperdashboard').hide(); //muestro mediante clase
			$('#menuplaylistdashboard').hide();
			$('#menuticketdashboard').hide();
			$('#menumusica').show();
			$('#menualbum').show();
			$('#menugenero').show();
			$('#menuinterprete').show();
			$('#menuasocia').show();
	});
</script>
<?php
}elseif ($rol == "PlaylAdmin" ){
?>
<script language="javascript">
	$(document).ready(function(){
		$("#mostrar").on( "click", function() {
			$('#target').show(); //muestro mediante id
			$('.target').show(); //muestro mediante clase
		 });
		$("#ocultar").on( "click", function() {
			$('#target').hide(); //oculto mediante id
			$('.target').hide(); //muestro mediante clase
		});
	});
</script>
<?php
}elseif ($rol == "TicketAdmin" ){
?>
<script language="javascript">
	$(document).ready(function(){
		$("#mostrar").on( "click", function() {
			$('#target').show(); //muestro mediante id
			$('.target').show(); //muestro mediante clase
		 });
		$("#ocultar").on( "click", function() {
			$('#target').hide(); //oculto mediante id
			$('.target').hide(); //muestro mediante clase
		});
	});
</script>
<?php
}else{
?>
	//ACA OCULTO TODOS LOS LI
	<script language="javascript"> 
	$(document).ready(function(){
		$("#mostrar").on( "click", function() {
			$('#target').show(); //muestro mediante id
			$('.target').show(); //muestro mediante clase
		 });
		$("#ocultar").on( "click", function() {
			$('#target').hide(); //oculto mediante id
			$('.target').hide(); //muestro mediante clase
		});
	});
	</script>
<?php
}
	
?>
	        <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li id="menumusicadashboard">
                        <a href="#" id="musicdash"><i class="fa fa-fw fa-dashboard"></i> Music Dashboard</a>
                    </li>
                    <li id="menusuperdashboard">
                        <a href="#" id="musicdash"><i class="fa fa-fw fa-dashboard"></i> Super Admin Dashboard</a>
                    </li>					
                    <li id="menuplaylistdashboard">
                        <a href="#" id="musicdash"><i class="fa fa-fw fa-dashboard"></i> Playlist Dashboard</a>
                    </li>
                    <li id="menuticketdashboard">
                        <a href="#" id="musicdash"><i class="fa fa-fw fa-dashboard"></i> Ticket Dashboard</a>
                    </li>
					
                    <li id="menumusica">
                        <a href="javascript:;" data-toggle="collapse" data-target="#musica"><i class="fa fa-fw fa-arrows-v"></i> Canciones <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="musica" class="collapse">
							<li>
								<a href="#" id="altamusica"><i class="fa fa-fw fa-edit"></i> Alta Musica</a>
							</li>
							<li>
								<a href="#" id="bajamusica"><i class="fa fa-fw fa-edit"></i> Baja Musica</a>
							</li>
                        </ul>
                    </li>

                    <li id="menualbum">
                        <a href="javascript:;" data-toggle="collapse" data-target="#album"><i class="fa fa-fw fa-arrows-v"></i> Álbums <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="album" class="collapse">
							<li>
								<a href="#" id="altaalbum"><i class="fa fa-fw fa-table"></i> Alta Álbum</a>
							</li>
							<li>
								<a href="#" id="bajaalbum"><i class="fa fa-fw fa-edit"></i> Baja Álbum</a>
							</li>
                        </ul>
                    </li>					

                    <li id="menugenero">
                        <a href="javascript:;" data-toggle="collapse" data-target="#genero"><i class="fa fa-fw fa-arrows-v"></i> Géneros <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="genero" class="collapse">
							<li>
								<a href="#" id="altagenero"><i class="fa fa-fw fa-bar-chart-o"></i> Alta Género</a>
							</li>
							<li>
								<a href="#" id="bajagenero"><i class="fa fa-fw fa-edit"></i> Baja Género</a>
							</li>
                        </ul>
                    </li>

					
                    <li id="menuinterprete">
                        <a href="javascript:;" data-toggle="collapse" data-target="#interprete"><i class="fa fa-fw fa-arrows-v"></i> Intérpretes <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="interprete" class="collapse">
							<li>
								<a href="#" id="altainterprete"><i class="fa fa-fw fa-bar-chart-o"></i> Alta Intérprete</a>
							</li>
							<li>
								<a href="#" id="bajainterprete"><i class="fa fa-fw fa-edit"></i> Baja Intérprete</a>
							</li>
                        </ul>
                    </li>					
					
					
                    <li id="menuasocia">
                        <a href="javascript:;" data-toggle="collapse" data-target="#asocia"><i class="fa fa-fw fa-arrows-v"></i> Asociaciones <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="asocia" class="collapse">
							<li>
								<a href="#" id="asociainterprete"><i class="fa fa-fw fa-bar-chart-o"></i> Canción - Interprete</a>
							</li>
							<li>
								<a href="#" id="asociaalbum"><i class="fa fa-fw fa-edit"></i> Canción - Álbum</a>
							</li>
                        </ul>
                    </li>
					
 <!--                   <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                    </li>
					
                    <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                    </li>

                    <li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
					
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                    </li>
					
-->	
	
                </ul>
            </div>	
        </nav>
		
<script src="/estilos/js/jsmusicadmin.js"></script>	