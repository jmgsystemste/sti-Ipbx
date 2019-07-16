<?php
    date_default_timezone_set('America/Bogota');
    $hoy = getdate();
    $datofecha = $hoy['year'] . '/' . sprintf("%02d", $hoy['mon']) . '/' . sprintf("%02d", $hoy['mday']);
    echo '<html lang="es">';
    include 'plantillas/head.php';
    echo '<body>';
    include 'plantillas/nav.php';
    echo '<div class="container-fluid" id="contenedor" style="margin-top: 50px; padding: 30px; border:double grey; border-radius: 15px; background-color: transparent">
    <div class="img-thumbnail" >
        <!-- Inicio div caption -->
        <div class="caption"> '; 
    include 'plantillas/ulnavtab.php';
?>
            <!-- inicio contenedor general de informacion de pestañas -->
            <div class="tab-content" id="myTabContent">
                <!-- inicio panel del CDR -->
                <?php 
                include 'plantillas/tabpanecdr.php';
                ?>                
                <!-- fin panel del CDR -->
                <!-- ************************************************************************-->
                <!-- inicio panel del detallado por General -->
                <?php 
                include 'plantillas/tabpaneinfgen.php';
                ?> 
                
                <!-- fin panel del detallado General -->           
                <!-- ************************************************************************-->

                <!-- inicio panel del detallado por usuario -->
                <?php 
                include 'plantillas/tabpaneinfusu.php';
                ?> 
                
                <!-- fin panel del detallado por usuario -->
            </div>
            <!-- fin contenedor general de informacion de pestañas -->
        </div>
    </div>
</div>
<!-- AdminLTE App -->
<script src="nassets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="nassets/dist/js/demo.js"></script>
<script type="text/javascript" src="nassets/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="nassets/bootstrap/jquery-3.2.1.slim.min.js"></script>
<script type="text/javascript" src="nassets/bootstrap/popper.min.js"></script>
</body>
<footer>
    <div class="container">
        <p style="color: white;">Todos los Derechos Reservados</p><a href="http://stivoip.com/" target="_blank">SOLUCIONES TÈCNOLOGICAS INTEGRADAS <br>www.stivoip.com</a>
    </div>
</footer>
<script src="nassets/js/jquery-3.3.1.js"></script>

<script>
                                            window.onload = function () {
                                                Paginacion_Contactos_Internos(0, 20, 1);
                                            };
</script>    
</html>
