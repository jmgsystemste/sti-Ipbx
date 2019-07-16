<div class="tab-pane fade show active" id="reg_cdr" role="tabpanel" aria-labelledby="home-tab" style="padding: 0">
    <div class="container-fluid text-center" >
        <h2 class="col" style="font-family: goodtime; font-size: 25px; font-weight: bold; margin-top: 20px">Registros de Llamadas (CDR)</h2>
        <hr class="separador">
    </div>
    <div class="container-fluid" >
        <div class="container-fluid">                                        
            <h2 class="text-center" style="font-family: arial; font-size: 19px">Gestor de Reportes Generales EasyPBX</h2>
        </div>
        <p></p>
        <!--- SELECTOR DE FECHAS----->
        <div class="thumbnail" style="margin-bottom: 20px">
            <div class="caption">
                <form role="form" action="" name="frmreportes">
                    <div class="row">
                        <div class="input-group col-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Fecha Inicio :  </span>
                            </div>                                         
                            <input class="form-control" type="text" value="<?php echo $datofecha; ?>" name="theDate" readonly  required>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <a onclick="displayCalendar(document.forms[0].theDate, 'yyyy/mm/dd', this)" class="fa fa-calendar" style="font-size:18px"></a>
                                </span>
                            </div>
                        </div>                           
                        <div class="input-group col-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Fecha Final :  </span>
                            </div>
                            <input class="form-control" type="text" value="<?php echo $datofecha; ?>" name="theDate1" readonly required>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <a onclick="displayCalendar(document.forms[0].theDate1, 'yyyy/mm/dd', this)" class="fa fa-calendar" style="font-size:18px"></a>
                                </span>
                            </div>                                                                  
                        </div>
                        <div class="input-group col-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"> Número de la Extención :  </span>
                            </div>                                           
                            <input class="form-control" type="text" name="extencion">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <a class="fa fa-phone" style="font-size:22px; padding-bottom: 0px"></a>
                                </span>
                            </div>    
                        </div>                           
                    </div>
                    <br>                               
                    <div class="text-center">
                        <button type="button" onclick="BuscarRegistro(0, 20, 1);" class="btn btn-primary">Generar Consultas</button>
                        <button type="button" onclick="" class="btn btn-primary">Generar Excel &nbsp;<i class="fa fa-file-excel-o" aria-hidden="true"></i>
</button> 
		   </div>
                </form>
            </div>
        </div>
        <!--- FIN DE SELECTOR DE FECHAS -->                                    
    </div>
    <!-- control de paginacion de la tabla -->
    <nav aria-label="Page navigation example" id="paginacion">

    </nav>
    <!-- control de paginacion de la tabla -->
    <!-- control de paginacion de la tabla -->
    <div class="container-fluid" style="margin-bottom: 10px" id="regcantidad">

    </div>
    <!-- control de paginacion de la tabla -->
    <!-- div contenedor de la tabla -->
    <div class="table-responsive">                                                                       
        <!-- INICIO TABLA INFO CDR -->
        <table id="tablacontactos" class="table table-striped table-hover table-bordered text-center">

        </table>
        <!-- FIN TABLA INFO CDR -->
    </div>
    <!-- div contenedor de la tabla -->
</div>
