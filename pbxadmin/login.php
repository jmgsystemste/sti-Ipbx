<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EasyPBX</title>
<link rel="stylesheet" href="css/login.css" type="text/css" />
</head>

<body>
<div id="contenedor">
<div id="logo"><img src="images/titulo.png" / alt="PBX ADMIN" title="PBX DMIN" align="center"><br/>
w w w . s t i v o i p . c o m
</div>
<div id="login">
<form action="login.process.php" method="post">
	<table>
    	<tr>
            <td><input type="text" name="usuario" / class="cuadro" value="Nombre de Usuario" onclick=    "if(this.value=='Nombre de Usuario'){this.value='';}" onfocus=    "if(this.value=='Nombre de Usuario'){this.value='';}"

onblur=     "if(this.value==''){this.value='Nombre de Usuario';}"/></td>
        </tr>
    	<tr>
    
            <td><input type="password" name="clave" class="cuadro" value="pass" onclick=    "if(this.value==pass'){this.value='';}" onfocus=    "if(this.value=='pass'){this.value='';}"

onblur=     "if(this.value==''){this.value='pass';}"/></td>
        </tr>
    	<tr>
        	
            <td><input type="submit" value="Ingresar >"  class="boton"/></td>
        </tr>                
    </table>
</form>
</div>
</div>
</body>
</html>
