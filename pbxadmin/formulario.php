<?php
require_once("validar.php");
if($_POST[Salir]&&$_POST[Salir]=='Salir')
	header("Location: logout.process.php");
// comprobamos si el formulario
// ha sido enviado correctamente
if(isset($_GET['abrir']) && $_GET['abrir'] == 'Abrir'){
	if (!empty($_POST['archivo'])){
		$archivo = $_POST['archivo'];
		// creamos la variable de sesion
		$_SESSION['archivo'] = $archivo;
		// comprobamos que existe el archivo
		if (!file_exists($archivo) && !is_file($archivo)){
			$msg = "El archivo no existe";
		} else {
			if($archivo){
				// mediante file_get_contents
				// mostramos el contenido del archivo en forma de cadena
				$codigo = htmlentities(file_get_contents($archivo));
			}
			$msg = "Se ha abierto el archivo <b>$archivo</b>";
		}
	} else {
		$msg = "Debe seleccionar un archivo a editar";
	}
}

// vamos a editar el archivo
if(isset($_POST['editar']) && $_POST['editar'] == 'Guardar'){
	$archivo = $_SESSION['archivo'];
	$archivo_editado = $_POST['archivo_editado'];
	// comprobamos si podemos escribir en el
	if(is_writable($archivo)){
		if(!$gestor = fopen($archivo, 'w')){
			$msg = "No se puede abrir el archivo <b>$archivo</b>";
			exit;
		}
		// escribimos en el archivo
		// el contenido de $archivo_editado
		if(fwrite($gestor, html_entity_decode($archivo_editado)) === false){
			$msg = "No se puede escribir en el archivo $archivo";
		}
		// Exito...!
		$msg = "El archivo <b>$archivo</b> se edito con exito";
		if($archivo){
			// otra vez mostramos el contenido del archivo
			$codigo = htmlentities(file_get_contents($archivo));
		}
		fclose($gestor);
		for($i=0;$i<count($select_archivo);$i++){
			if($archivo==$select_archivo[$i][ruta]){
#				echo "se tuvo que hacer ".$select_archivo[$i][accion];
				exec($select_archivo[$i][accion]);
			}
		}
	}else{
		$msg = "No se peude escribir en el archivo <b>$archivo</b>";
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PBX ADMIN</title>
<link rel="stylesheet" href="css/formulario.css" type="text/css" />
</head>

<body>
<div id="formula"><br/><br/>
<img src="images/titulo.png" / alt="PBX ADMIN" title="PBX ADMIN" >


<!-- el formulario -->
<form action="<?php $_SERVER['PHP_SELF']; ?>" id="Formulario" method="POST">
		<p>Archivo :
        	 <select name="archivo" onChange="document.getElementById('Formulario').action='?abrir=Abrir';;document.getElementById('Formulario').submit();">
				<option value="">Seleccione Archivo</option>
                <?php 
					for($i=0;$i<count($select_archivo);$i++){
				?>
                <option value="<?php echo $select_archivo[$i][ruta]; ?>"<?php echo ($_POST[archivo]==$select_archivo[$i][ruta])?" selected='selected'":""; ?>><?php echo $select_archivo[$i][nombre]; ?></option>
                <?php } ?>
			</select>
			
			      <input type="submit" name="editar" value="Guardar" />
            <input type="reset" value="Restablecer" />
            <input type="submit" name="Salir" value="Salir">
			<a href="index.php"><input type="button" name="Inicio" value="Inicio"></a>
			</p>
			<?php /*?><?php echo "<p>".$msg."</p>"; ?><?php */?>
			<textarea name="archivo_editado" rows="25" cols="100"><?php
                // mostramos el codigo
                // o el texto del archivo a editar
                echo $codigo;
                ?></textarea>
		<p>
            <input type="submit" name="editar" value="Guardar" />
            <input type="reset" value="Restablecer" />
            <input type="submit" name="Salir" value="Salir">
			<a href="index.php"><input type="button" name="Inicio" value="Inicio"></a>

        </p>
</form>
<?php 
//echo md5("mario");
//echo "<br>";
//echo md5("ninguna");
?>
</div>
</body>
</html>
