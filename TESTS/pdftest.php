<?php
    $dia = 12;
    $mes = 12;
    $anio= 1990;
?>
 
<style>
<!--
#encabezado {padding:10px 0; border-top: 1px solid; border-bottom: 1px solid; width:100%;}
#encabezado .fila #col_1 {width: 15%}
#encabezado .fila #col_2 {text-align:center; width: 55%}
#encabezado .fila #col_3 {width: 15%}
#encabezado .fila #col_4 {width: 15%}
 
#encabezado .fila td img {width:50%}
#encabezado .fila #col_2 #span1{font-size: 15px;}
#encabezado .fila #col_2 #span2{font-size: 12px; color: #4d9;}
 
#footer {padding-top:5px 0; border-top: 2px solid #46d; width:100%;}
#footer .fila td {text-align:center; width:100%;}
#footer .fila td span {font-size: 10px; color: #000;}
 
#fecha {margin-top:70px; width:100%;}
#fecha tr td {text-align: right; width:100%;}
-->
</style>
<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="20mm">
    <page_header>
        <table id="encabezado">
            <tr class="fila">
                <td id="col_1" >
                    <img src="../../images/img_izq.png">
                </td>
                <td id="col_2">
                    <span id="span1">Aquí pueden ir más span o divs según requiera el diseño</span>
                    <br>
                    <span id="span2">Este es otro span con otros estilos</span>
                </td>
                <td id="col_3">
                    <img  src="../../images/img_der_1.png">
                </td>
                <td id="col_4">
                    <img src="../../images/img_der_2.png">
                </td>
            </tr>
        </table>
    </page_header>
 
 <div class="row">
	<div class="col-lg-10">	
		<form role="form" method="POST" id="bajaadminid" name="bajaadminid">
			<h4><u>Reporte generado</u></h4>
			<div class="table-responsive">
				<table class="table table-hover table-striped">
					<div class="form-group">
						<thead>
							<tr>
								<th>Posición</th>
								<th>Cantidad</th>
								<th>Canción</th>
								<th>Intérprete</th>
								<th>Duración</th>
								<th>Género</th>
								<th>Álbum</th>
								<th>Activa</th>	
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $c?></td>
								<td><?php echo $Reporte[$i][0]?></td>
									<td><?php echo $Reporte[$i][1]?></td>
									<td><?php echo $Reporte[$i][2]?></td>
									<td><?php echo $Reporte[$i][3]?></td>
									<?php
							//	$hora = DateTime::createFromFormat('H:i:s.u', $DatosCancion[0][4])->format('H:i');
									?>
									<td><?php echo $Reporte[$i][4]?></td>
									<td><?php echo $Reporte[$i][5]?></td>
									<td><?php echo $Reporte[$i][6]?></td>
							</tr>
						</tbody>
					</div>	
				</table>
			</div>
		</form>
	</div>
</div>
 
    <page_footer>
        <table id="footer">
            <tr class="fila">
                <td>
                    <span>Este el footer y pueder ir con letra más pequeña por ejemplo poner una
                    dirección o algo así :P</span>
                </td>
            </tr>
        </table>
    </page_footer>
 
    <table id="fecha">
        <tr class="fila">
            <td>
                <?php echo "México D.F a ". $dia . " de ". $mes . " de " . $anio;?>
            </td>
        </tr>
    </table>
 
</page>