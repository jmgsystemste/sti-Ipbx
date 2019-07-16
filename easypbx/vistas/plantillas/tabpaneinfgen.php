<div role="tabpanel" class="tab-pane fade" id="inf_gen" role="tabpanel" aria-labelledby="profile-tab" style="padding: 0">
    <div class="container-fluid text-center" >
        <h2 class="col" style="font-family: goodtime; font-size: 25px; font-weight: bold; margin-top: 20px">Informe Detallado General</h2>
        <hr class="separador">
    </div>
    <!-- inicio contenedor de cabezera detallado Generral -->
    <div class="container-fluid" >
        <div class="container-fluid">                                        
            <h2 class="text-center" style="font-family: arial; font-size: 19px">Gestor de Reporte Detallado General</h2>
        </div>
        <p></p>
        <!--- SELECTOR DE FECHAS detallado General -->
        <div class="thumbnail" style="margin-bottom: 20px">
            <div class="caption">
                <form role="form" action="" name="frmreportdet">
                    <div class="row">                                         
                        <div class="input-group col-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Fecha Inicio:</span>
                            </div>                            
                            <input class="form-control" type="text" value="<?php echo $datofecha; ?>" name="theDateDet" readonly  required>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <a onclick="displayCalendar(document.forms[1].theDateDet, 'yyyy/mm/dd', this)" class="fa fa-calendar" style="font-size:18px"></a>
                                </span>    
                            </div>
                        </div>    
                        <div class="input-group col-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Fecha Final:</span>
                            </div>
                            <input class="form-control" type="text" value="<?php echo $datofecha; ?>" name="theDate1Det" readonly required>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <a onclick="displayCalendar(document.forms[1].theDate1Det, 'yyyy/mm/dd', this)" class="fa fa-calendar" style="font-size:18px"></a>
                               </span>
                            </div>                      
                        </div>
                        <div class="input-group col-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Estado de Llamada:</span>
                            </div>
                            <select class="custom-select" name="estado">
                                <option value="ANSWERED" selected>Contestada</option>
                                <option value="NO ANSWER">No Contestada</option>
                                <option value="BUSY">Ocupada</option>
                                <option value="FAILED">Fallida</option>                                                        
                            </select>
                        </div>                        
                    </div>
                    <br>                               
                    <div class="text-center">
                        <button type="button" onclick="InformeGeneralDetallado();" class="btn btn-primary">Generar Consultas</button>
                    </div>
                </form>
            </div>
        </div>
        <!--- FIN DE SELECTOR DE FECHAS detallado General -->                                    
    </div>
    <!-- fin contenedor de cabezera detallado General -->
    <!-- inicio de contenedor principal de informe detallado General -->
    <div class="container-fluid" style="margin-bottom: 10px" id="regcantidad01">
        <!-- inicio row uno informe detallado -->
        <div class="row">
            <!-- inicio contendor informe salientes-->
            <div class="col-md-6">
                <div class="box box-primary" style="background-color: #ecedee; height: 440px">
                    <div class="box-header with-border">
                        <h3 class="box-title">Llamadas Salientes - General</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- inicio formulario infomacion general -->
                    <form role="form" name="frminfogensal">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Fecha Inicial:</label>
                                    <input type="text" class="form-control form-control-sm" name="fech_ini_gensal" placeholder="" required readonly>
                                </div>
                                <div class="col-md-6">
                                    <label>Fecha Final:</label>
                                    <input type="text" class="form-control form-control-sm" name="fech_fin_gensal" placeholder="" required readonly>
                                    <p>
                                </div>
                            </div>
                            <hr style="background-color: #3c8dbc">
                            <div class="row" style="margin: 40px 10px">
                                <div class="col-md-4">
                                    <label>Total de Llamadas:</label>
                                    <input type="text" class="form-control form-control-sm" name="tot_llam_gensal" placeholder="" required readonly>
                                </div> 
                                <div class="col-md-4">
                                    <label>Total (hh:mm:ss):</label>
                                    <input type="text" class="form-control form-control-sm" name="tot_min_gensal" placeholder="" required readonly>
                                </div>
                                <div class="col-md-4">
                                    <label>Promedio (mm:ss):</label>
                                    <input type="text" class="form-control form-control-sm" name="pro_min_gensal" placeholder="" required readonly>
                                    <p>
                                </div>                                                
                            </div>
                            <hr style="background-color: #3c8dbc">          
                            <div class="row" style="margin: 40px 10px">
                                <div class="col-md-3">
                                    <label>Contestadas:</label>
                                    <input type="text" class="form-control form-control-sm" name="con_gensal" placeholder="" required readonly>
                                </div>
                                <div class="col-md-3">
                                    <label>No Contestadas:</label>
                                    <input type="text" class="form-control form-control-sm" name="nocon_gensal" placeholder="" required readonly>

                                </div>
                                <div class="col-md-3">
                                    <label>Ocupadas:</label>
                                    <input type="text" class="form-control form-control-sm" name="ocu_gensal" placeholder="" required readonly>
                                </div>
                                <div class="col-md-3">
                                    <label>Falladas:</label>
                                    <input type="text" class="form-control form-control-sm" name="fal_gensal" placeholder="" required readonly>
                                </div>
                            </div>
                        </div>                             
                        <!-- /.box-body -->
                    </form>
                    <!-- fin formulario infomacion general -->
                </div>
                <!-- /.box -->
            </div>
            <!-- fin contendor informe salientes-->
            <!-- inicio contenedor grafico salientes-->
            <div class="col-md-6">
                <!-- DONUT CHART -->
                <div class="box box-primary" style="background-color: #ecedee; height: 440px">
                    <div class="box-header with-border">
                        <h3 class="box-title">Llamadas Salientes - General</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <canvas id="myChartSal" style="height:250px; margin-top: 30px"></canvas>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- fin contenedor grafico salientes -->
        </div> 
        <!-- fin row uno informe detallado salientes-->
        <!-- inicio div con la cdr detallado del informe -->
        <div class="row">
            <!-- control de paginacion de la tabla -->
            <nav aria-label="Page navigation example" id="paginacion_inf">

            </nav>
            <!-- control de paginacion de la tabla -->
            <!-- control de paginacion de la tabla -->
            <div class="container-fluid" style="margin-bottom: 10px" id="regcantidad_inf">

            </div>
            <!-- control de paginacion de la tabla -->
            <!-- div contenedor de la tabla -->
            <div class="table-responsive">                                                                       
                <!-- INICIO TABLA INFO CDR -->
                <table id="tablacontactos_inf" class="table table-striped table-hover table-bordered text-center">

                </table>
                <!-- FIN TABLA INFO CDR -->
            </div>
            <!-- div contenedor de la tabla -->
        </div>
        <!-- fin div con la cdr detallado del informe -->
    </div>
    <!-- fin de contenedor principal de informe detallado General -->                            
</div>