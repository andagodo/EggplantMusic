<?php

$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$posision = explode('/', $path);
if ( count($posision) == 4 ) {$pagina = $posision[3];}else{$pagina = $posision[2];}

	if ($rol == "SuperAdmin" ){
		?>
			
	
	        <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="<?php if ($pagina=="cargaMenu.php") {echo "active"; } else  {echo "noactive";}?>">
                        <a href="/presentacion/cargaMenu.php"><i class="fa fa-fw fa-dashboard"></i> SuperAdmin Dashboard</a>
                    </li>
                    <li class="<?php if ($pagina=="AltaAdmin.php") {echo "active"; } else  {echo "noactive";}?>">
                        <a href="/includes/SAdmin/AltaAdmin.php"><i class="fa fa-fw fa-file"></i> Alta Administradores</a>
                    </li>
                    <li class="<?php if ($pagina=="BajaAdmin.php") {echo "active"; } else  {echo "noactive";}?>">
                        <a href="/includes/SAdmin/BajaAdmin.php"><i class="fa fa-fw fa-edit"></i> Baja Administradores</a>
                    </li>
					
                   <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#musica"><i class="fa fa-fw fa-arrows-v"></i> Canciones <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="musica" class="collapse">
							<li class="<?php if ($pagina=="AltaMusica.php") {echo "active"; } else  {echo "noactive";}?>">
								<a href="/includes/MusicAdmin/AltaMusica.php"><i class="fa fa-fw fa-edit"></i> Alta Musica</a>
							</li>
							<li class="<?php if ($pagina=="AltaMusica.php") {echo "active"; } else  {echo "noactive";}?>">
								<a href="/includes/MusicAdmin/BajaMusica.php"><i class="fa fa-fw fa-edit"></i> Baja Musica</a>
							</li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#album"><i class="fa fa-fw fa-arrows-v"></i> Álbums <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="album" class="collapse">
							<li class="<?php if ($pagina=="AltaAlbum.php") {echo "active"; } else  {echo "noactive";}?>">
								<a href="/includes/MusicAdmin/AltaAlbum.php"><i class="fa fa-fw fa-table"></i> Alta Álbum</a>
							</li>
							<li class="<?php if ($pagina=="BajaAlbum.php") {echo "active"; } else  {echo "noactive";}?>">
								<a href="/includes/MusicAdmin/BajaAlbum.php"><i class="fa fa-fw fa-edit"></i> Baja Álbum</a>
							</li>
                        </ul>
                    </li>					

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#genero"><i class="fa fa-fw fa-arrows-v"></i> Géneros <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="genero" class="collapse">
							<li class="<?php if ($pagina=="AltaGenero.php") {echo "active"; } else  {echo "noactive";}?>">
								<a href="/includes/MusicAdmin/AltaGenero.php"><i class="fa fa-fw fa-bar-chart-o"></i> Alta Género</a>
							</li>
							<li class="<?php if ($pagina=="BajaGenero.php") {echo "active"; } else  {echo "noactive";}?>">
								<a href="/includes/MusicAdmin/BajaGenero.php"><i class="fa fa-fw fa-edit"></i> Baja Género</a>
							</li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#asocia"><i class="fa fa-fw fa-arrows-v"></i> Asociaciones <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="asocia" class="collapse">
							<li class="<?php if ($pagina=="AsociaInterprete.php") {echo "active"; } else  {echo "noactive";}?>">
								<a href="/includes/MusicAdmin/AsociaInterprete.php"><i class="fa fa-fw fa-bar-chart-o"></i> Canción - Interprete</a>
							</li>
							<li class="<?php if ($pagina=="AsociaAlbum.php") {echo "active"; } else  {echo "noactive";}?>">
								<a href="/includes/MusicAdmin/AsociaAlbum.php"><i class="fa fa-fw fa-edit"></i> Canción - Álbum</a>
							</li>
                        </ul>
                    </li>
					
					<li class="<?php if ($pagina=="AltaPlaylist.php") {echo "active"; } else  {echo "noactive";}?>">
                        <a href="/includes/PlaylistAdmin/AltaPlaylist.php"><i class="fa fa-fw fa-edit"></i> Alta Playlist</a>
                    </li>
					
                    <li class="<?php if ($pagina=="BajaPlaylist.php") {echo "active"; } else  {echo "noactive";}?>">
                        <a href="/includes/PlaylistAdmin/BajaPlaylist.php"><i class="fa fa-fw fa-file"></i> Baja Playlist</a>
                    </li>
					
                    <li class="<?php if ($pagina=="ModificaPlaylist.php") {echo "active"; } else  {echo "noactive";}?>">
                        <a href="/includes/PlaylistAdmin/ModificaPlaylist.php"><i class="fa fa-fw fa-table"></i> Modificar Playlist</a>
                    </li>						

                    <li class="<?php if ($pagina=="EstadisticaPlaylist.php") {echo "active"; } else  {echo "noactive";}?>">
                        <a href="/includes/PlaylistAdmin/EstadisticaPlaylist.php"><i class="fa fa-fw fa-bar-chart-o"></i> Estadisticas</a>
                    </li>
					
                    <li class="<?php if ($pagina=="RespondeTicket.php") {echo "active"; } else  {echo "noactive";}?>">
                        <a href="/includes/TicketAdmin/RespondeTicket.php"><i class="fa fa-fw fa-edit"></i> Responder Ticket</a>
                    </li>
					
                    <li class="<?php if ($pagina=="BajaTicket.php") {echo "active"; } else  {echo "noactive";}?>">
                        <a href="/includes/TicketAdmin/BajaTicket.php"><i class="fa fa-fw fa-file"></i> Baja Ticket</a>
                    </li>		
					
                </ul>
            </div>	
        </nav>
		

<script src="/estilos/js/jssadmin.js"></script>	