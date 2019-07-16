<?php
require_once("validar.php");
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	   <title>PBX ADMIN</title>
	   <link rel="stylesheet" href="css/template.css" type="text/css" />
	</head>

	<body>

		<div id="contenedor">
		    <a href="logout.process.php">
		    	<div class="cerrar">
		    		X
		    	</div>
		    </a>
		    <br/>
		    <center>
		    	<img src="images/titulo.png" / alt="PBX ADMIN" title="PBX ADMIN" align="center">
		    </center>
		    <div class="cuadros">
		        <a href="<?php echo $ruta_panel; ?>" target="_blank">
		         	<div class="cuadro_deshabilitado">
		           		<center>
		           			<img border="0" src="images/panel.png" alt="Vista del Panel" title="Vista del Panel"/>
		           		</center>
		            	<h2>Panel</h2>
		        	</div>
		    	</a>

	      	<?php if($_SESSION[perfil]<3){ ?>
		   		<a href="<?php echo $ruta_grabaciones; ?>" target="_blank">
			       	<div class="cuadro">
			       		<center>
			       			<img border="0" src="images/rec.png" alt="Cdr/ Grabación" title="Cdr/ Grabación"/>
			       		</center>
			            <h2>Cdr/ Grabación</h2>
			        </div>
			    </a>
			<?php }else{ ?>
				<div class="cuadro_deshabilitado">
					<center>
						<img border="0" src="images/rec.png" alt="Cdr/ Grabación" title="Cdr/ Grabación"/>
					</center>
					<h2>Cdr/ Grabación</h2>
				</div>
			<?php } ?>
			<?php if($_SESSION[perfil]<2){ ?>
				<a href="<?php echo $ruta_configuracion; ?>">
					<div class="cuadro">
						<center>
							<img border="0" src="images/configuracion.png" alt="Configuración" title="Configuración"/>
						</center>
						<h2>Configuración</h2>
					</div>
				</a>
			<?php } else { ?>
				<div class="cuadro_deshabilitado">
					<center>
						<img border="0" src="images/configuracion.png" alt="Configuración" title="Configuración"/>
					</center>
					<h2>Configuración</h2>
				</div>
			<?php } ?>
			</div>
		</div>
	</body>
</html>
