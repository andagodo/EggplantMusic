<?php

include $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php";

//////////////////////// MENU DE SUPER ADMINISTRADOR////////////////////////
if ($rol == "SuperAdmin" ){
?>
<script language="javascript">
	$(document).ready(function(){
			$('#menumusicadashboard').hide();
			$('#menusuperdashboard').show();
			$('#menuplaylistdashboard').hide();
			$('#menuticketdashboard').hide();
			$('#menusadmin').show();
			$('#menumusica').show();
			$('#menualbum').show();
			$('#menugenero').show();
			$('#menuinterprete').show();
			$('#menuasocia').show();
			$('#menuplaylist').show();
			$('#menuticket').show();			
	});
</script>
<?php

/////////////////////// MENU DE MUSIC ADMIN /////////////////////////////
}elseif ($rol == "MusicAdmin" ){
?>
<script language="javascript">
	$(document).ready(function(){
			$('#menumusicadashboard').show();
			$('#menusuperdashboard').hide();
			$('#menuplaylistdashboard').hide();
			$('#menuticketdashboard').hide();
			$('#menusadmin').hide();
			$('#menumusica').show();
			$('#menualbum').show();
			$('#menugenero').show();
			$('#menuinterprete').show();
			$('#menuasocia').show();
			$('#menuplaylist').hide();
			$('#menuticket').hide();
	});
</script>
<?php

/////////////////////// MENU DE PLAYLIST ADMIN /////////////////////////////
}elseif ($rol == "PlaylAdmin" ){
?>
<script language="javascript">
	$(document).ready(function(){
			$('#menumusicadashboard').hide();
			$('#menusuperdashboard').hide();
			$('#menuplaylistdashboard').show();
			$('#menuticketdashboard').hide();
			$('#menusadmin').hide();
			$('#menumusica').hide();
			$('#menualbum').hide();
			$('#menugenero').hide();
			$('#menuinterprete').hide();
			$('#menuasocia').hide();
			$('#menuplaylist').show();
			$('#menuticket').hide();	
	});
</script>
<?php

/////////////////////// MENU DE TICKET ADMIN /////////////////////////////
}elseif ($rol == "TicketAdmin" ){
?>
<script language="javascript">
	$(document).ready(function(){
			$('#menumusicadashboard').hide();
			$('#menusuperdashboard').hide();
			$('#menuplaylistdashboard').hide();
			$('#menuticketdashboard').show();
			$('#menusadmin').hide();
			$('#menumusica').hide();
			$('#menualbum').hide();
			$('#menugenero').hide();
			$('#menuinterprete').hide();
			$('#menuasocia').hide();
			$('#menuplaylist').hide();
			$('#menuticket').show();
	});
</script>
<?php

/////////////////////// OCULTAR TODOS LOS LI /////////////////////////////
}else{
?>
	<script language="javascript"> 
	$(document).ready(function(){
			$('#menumusicadashboard').hide();
			$('#menusuperdashboard').hide();
			$('#menuplaylistdashboard').hide();
			$('#menuticketdashboard').hide();
			$('#menusadmin').hide();
			$('#menumusica').hide();
			$('#menualbum').hide();
			$('#menugenero').hide();
			$('#menuinterprete').hide();
			$('#menuasocia').hide();
			$('#menuplaylist').hide();
			$('#menuticket').hide();
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
					
                    <li id="menusadmin">
                        <a href="javascript:;" data-toggle="collapse" data-target="#sadmin"><i class="fa fa-fw fa-arrows-v"></i> Administradores <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="sadmin" class="collapse">
							<li>
								<a href="#" id="altaadmin"><i class="fa fa-fw fa-edit"></i> Alta Admin</a>
							</li>
							<li>
								<a href="#" id="bajaadmin"><i class="fa fa-fw fa-edit"></i> Baja Admin</a>
							</li>
                        </ul>
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
					
					
                    <li id="menuplaylist">
                        <a href="javascript:;" data-toggle="collapse" data-target="#playlist"><i class="fa fa-fw fa-arrows-v"></i> Playlists <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="playlist" class="collapse">
							<li>
								<a href="#" id="altaplaylist"><i class="fa fa-fw fa-bar-chart-o"></i> Alta Playlist</a>
							</li>
							<li>
								<a href="#" id="bajaplaylist"><i class="fa fa-fw fa-edit"></i>Baja Playlist</a>
							</li>
							<li>
								<a href="#" id="modificaplaylist"><i class="fa fa-fw fa-bar-chart-o"></i>Modifica Playlist</a>
							</li>
							<li>
								<a href="#" id="estadisticas"><i class="fa fa-fw fa-edit"></i>Estadisticas</a>
							</li>
                        </ul>
                    </li>					
					
                    <li id="menuticket">
                        <a href="javascript:;" data-toggle="collapse" data-target="#ticket"><i class="fa fa-fw fa-arrows-v"></i> Tickets <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="ticket" class="collapse">
							<li>
								<a href="#" id="respticket"><i class="fa fa-fw fa-bar-chart-o"></i>Responder Ticket</a>
							</li>
							<li>
								<a href="#" id="bajaticket"><i class="fa fa-fw fa-edit"></i>Eliminar Ticket</a>
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

<script src="../estilos/js/jsmenu.js"></script>
		
<?php
if ($rol == "SuperAdmin" ){
	include $_SERVER['DOCUMENT_ROOT'] . "../includes/SAdmin/dashSAdmin.php";
}elseif ($rol == "MusicAdmin" ){
	include $_SERVER['DOCUMENT_ROOT'] . "../includes/MusicAdmin/dashMusicAdmin.php";
}elseif ($rol == "PlaylAdmin" ){
	include $_SERVER['DOCUMENT_ROOT'] . "/includes/PlaylistAdmin/dashPlaylistAdmin.php";
}elseif ($rol == "TicketAdmin" ){
	include $_SERVER['DOCUMENT_ROOT'] . "/includes/TicketAdmin/dashTicketAdmin.php";
}
include $_SERVER['DOCUMENT_ROOT'] . "../includes/footer.php"; 
?>