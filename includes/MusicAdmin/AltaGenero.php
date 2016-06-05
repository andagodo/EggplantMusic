<?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/MenuMusicAdmin.php"; ?>


		<div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Alta de Género
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/presentacion/cargaMenu.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Alta de Género
                            </li>
                        </ol>
                    </div>
                </div>
				
            </div>
			
			<div class="row">
                <div class="col-lg-6">
					<form role="form" action='/logica/NuevaGenero.php' method="POST">

					
					    <div class="form-group">
                            <label>Nombre Género:</label>
                            <input class="form-control" placeholder="Ejemplo: Reggae." name='nomg' required/>
                        </div>

						<div class="form-group">
							<label>Descripción:</label>
								<input type="text" class="form-control" name='desc' required/>
						</div>
						</br>
						<button type="submit" class="btn btn-default">Alta Género</button>
						
						</div>

					</form>

			</div>

		</div>
	</div>


 <?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"; ?>