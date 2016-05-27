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
                        <a href="forms.html"><i class="fa fa-fw fa-bar-chart-o"></i> Forms</a>
                    </li>
                    <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-table"></i> Bootstrap Elements</a>
                    </li>
                    <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                    </li>
                </ul>
            </div>	
        </nav>
		

 
<?php

	}