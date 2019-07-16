<div role="tabpanel" class="tab-pane fade" id="inf_usu" role="tabpanel" aria-labelledby="profile-tab" style="padding: 0">
    <div class="container-fluid text-center" >
        <h2 class="col" style="font-family: goodtime; font-size: 25px; font-weight: bold; margin-top: 20px">Informe Detallado Usuario</h2>
        <hr class="separador">
    </div>
    <!-- inicio contenedor de cabezera detallado por usuario -->
    <div class="container-fluid" >
        <div class="container-fluid">                                        
            <h2 class="text-center" style="font-family: arial; font-size: 19px">Gestor de Reporte Detallado por Usuario</h2>
        </div>
        <p></p>
        <!--- SELECTOR DE FECHAS detallado por usuario----->
        <div class="thumbnail" style="margin-bottom: 20px">
            <div class="caption">
                <form role="form" action="" name="frmreportdetusu">
                    <div class="row">
                        <div class="input-group col-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Fecha Inicio:</span>
                            </div>                            
                            <input class="form-control" type="text" value="<?php echo $datofecha; ?>" name="theDateDetusu" readonly  required>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <a onclick="displayCalendar(document.forms[3].theDateDetusu, 'yyyy/mm/dd', this)" class="fa fa-calendar" style="font-size:18px"></a>
                                </span>
                            </div>
                        </div>                           
                        <div class="input-group col-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Fecha Final:</span>
                            </div>
                            <input class="form-control" type="text" value="<?php echo $datofecha; ?>" name="theDate1Detusu" readonly required>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <a onclick="displayCalendar(document.forms[3].theDate1Detusu, 'yyyy/mm/dd', this)" class="fa fa-calendar" style="font-size:18px"></a>
                                </span>
                            </div>
                        </div>
                        <div class="input-group col-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Extención:</span>
                            </div>
                            <input class="form-control" type="text" name="extendetusu" required>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <a class="fa fa-phone" style="font-size:22px; padding-bottom: 0px"></a>
                                </span>
                            </div>
                        </div>
                        <div class="input-group col-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Estado de Llamada:</span>
                            </div>
                            <select class="custom-select" name="estadousu">
                                <option value="ANSWERED" selected>Contestada</option>
                                <option value="NO ANSWER">No Contestada</option>
                                <option value="BUSY">Ocupada</option>
                                <option value="FAILED">Fallida</option>                                                        
                            </select>
                        </div>
                    </div>
                    <br>                               
                    <div class="text-center">
                        <button type="button" onclick="InformeUsuarioDetallado();" class="btn btn-primary">Generar Consultas</button>
                    </div>
                </form>
            </div>
        </div>
        <!--- FIN DE SELECTOR DE FECHAS detallado por usuario -->                                    
    </div>
    <!-- fin contenedor de cabezera detallado por usuario -->
    <!-- inicio de contenedor principal de informe detallado por usuario -->
    <div class="container-fluid" style="margin-bottom: 10px" id="regcantidad01usu">
        <!-- inicio row uno informe detallado -->
        <div class="row">
            <!-- inicio contendor informe salientes-->
            <div class="col-md-6">
                <div class="box box-primary" style="background-color: #ecedee; height: 440px">
                    <div class="box-header with-border">
                        <h3 class="box-title">Llamadas Salientes - Extencion <strong id="ext01"></strong></h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <form role="form" name="frminfoususal">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Fecha Inicial:</label>
                                    <input type="text" class="form-control form-control-sm" name="fech_ini_ususal" placeholder="" required readonly>
                                </div>
                                <div class="col-md-6">
                                    <label>Fecha Final:</label>
                                    <input type="text" class="form-control form-control-sm" name="fech_fin_ususal" placeholder="" required readonly>
                                    <p>
                                </div>
                            </div>
                            <hr style="background-color: #3c8dbc">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Extención Número:</label>
                                    <input type="text" class="form-control form-control-sm" name="exten_ususal" placeholder="" required readonly>
                                </div>
                                <div class="col-md-4">
                                    <label>Total de Minutos:</label>
                                    <input type="text" class="form-control form-control-sm" name="tot_min_ususal" placeholder="" required readonly>
                                </div>
                                <div class="col-md-4">
                                    <label>Promedio de Minutos:</label>
                                    <input type="text" class="form-control form-control-sm" name="pro_min_ususal" placeholder="" required readonly>
                                    <p>
                                </div>                                                
                            </div>
                            <hr style="background-color: #3c8dbc">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Total de Llamadas:</label>
                                    <input type="text" class="form-control form-control-sm" name="tot_llam_ususal" placeholder="" required readonly>
                                    <p>
                                </div>                                                    
                            </div>                                                
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Contestadas:</label>
                                    <input type="text" class="form-control form-control-sm" name="con_ususal" placeholder="" required readonly>
                                </div>
                                <div class="col-md-3">
                                    <label>No Contestadas:</label>
                                    <input type="text" class="form-control form-control-sm" name="nocon_ususal" placeholder="" required readonly>

                                </div>
                                <div class="col-md-3">
                                    <label>Ocupadas:</label>
                                    <input type="text" class="form-control form-control-sm" name="ocu_ususal" placeholder="" required readonly>
                                    <p>
                                </div>
                                <div class="col-md-3">
                                    <label>Falladas:</label>
                                    <input type="text" class="form-control form-control-sm" name="fall_ususal" placeholder="" required readonly>
                                    <p>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </form>    
                </div>
                <!-- /.box -->
            </div>
            <!-- fin contendor informe salientes-->
            <!-- inicio contenedor grafico salientes-->
            <div class="col-md-6">
                <!-- DONUT CHART -->
                <div class="box box-primary" style="background-color: #ecedee; height: 440px">
                    <div class="box-header with-border">
                        <h3 class="box-title">Llamadas Salientes - Extencion <strong id="ext02"></strong></h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <canvas id="myChartSalusu" style="height:250px; margin-top: 30px"></canvas>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- fin contenedor grafico salientes -->
        </div> 
        <!-- fin row uno informe detallado salientes-->
        <!-- inicio row dos informe detallado entrantes-->
        <div class="row">
            <!-- inicio contendor informe entrantes -->
            <div class="col-md-6">
                <div class="box box-primary" style="background-color: #ecedee; height: 440px">
                    <div class="box-header with-border">
                        <h3 class="box-title">Llamadas Entrantes - Extencion <strong id="ext03"></strong></h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <form role="form" name="frminfousuent">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Fecha Inicial:</label>
                                    <input type="text" class="form-control form-control-sm" name="fech_ini_usuent" placeholder="" required readonly>
                                </div>
                                <div class="col-md-6">
                                    <label>Fecha Final:</label>
                                    <input type="text" class="form-control form-control-sm" name="fech_fin_usuent" placeholder="" required readonly>
                                    <p>
                                </div>
                            </div>
                            <hr style="background-color: #3c8dbc">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Extención Número:</label>
                                    <input type="text" class="form-control form-control-sm" name="exten_usuent" placeholder="" required readonly>
                                </div>
                                <div class="col-md-4">
                                    <label>Total de Minutos:</label>
                                    <input type="text" class="form-control form-control-sm" name="tot_min_usuent" placeholder="" required readonly>
                                </div>
                                <div class="col-md-4">
                                    <label>Promedio de Minutos:</label>
                                    <input type="text" class="form-control form-control-sm" name="pro_min_usuent" placeholder="" required readonly>
                                    <p>
                                </div>                                                
                            </div>
                            <hr style="background-color: #3c8dbc">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Total de Llamadas:</label>
                                    <input type="text" class="form-control form-control-sm" name="tot_llam_usuent" placeholder="" required readonly>
                                    <p>
                                </div>                                                    
                            </div>                                                
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Contestadas:</label>
                                    <input type="text" class="form-control form-control-sm" name="con_usuent" placeholder="" required readonly>
                                </div>
                                <div class="col-md-3">
                                    <label>No Contestadas:</label>
                                    <input type="text" class="form-control form-control-sm" name="nocon_usuent" placeholder="" required readonly>

                                </div>
                                <div class="col-md-3">
                                    <label>Ocupadas:</label>
                                    <input type="text" class="form-control form-control-sm" name="ocu_usuent" placeholder="" required readonly>
                                </div>
                                <div class="col-md-3">
                                    <label>Falladas:</label>
                                    <input type="text" class="form-control form-control-sm" name="fall_usuent" placeholder="" required readonly>
                                    <p>
                                </div> 
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </form>    
                </div>
                <!-- /.box -->
            </div>
            <!-- fin contendor informe entrantes -->
            <!-- inicio contenedor grafico entrantes -->
            <div class="col-md-6">
                <!-- DONUT CHART -->
                <div class="box box-primary" style="background-color: #ecedee; height: 440px">
                    <div class="box-header with-border">
                        <h3 class="box-title">Llamadas Entrantes - Extencion <strong id="ext04"></strong></h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <canvas id="myChartEntusu" style="height:250px; margin-top: 30px"></canvas>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- fin contenedor grafico entrantes -->
        </div> 
        <!-- fin row dos informe detallado entrantes -->
        <!-- inicio div con la cdr detallado del informe usuario -->
        <div class="row">
            <!-- control de paginacion de la tabla -->
            <nav aria-label="Page navigation example" id="paginacion_infusu">

            </nav>
            <!-- control de paginacion de la tabla -->
            <!-- control de paginacion de la tabla -->
            <div class="container-fluid" style="margin-bottom: 10px" id="regcantidad_infusu">

            </div>
            <!-- control de paginacion de la tabla -->
            <!-- div contenedor de la tabla -->
            <div class="table-responsive">                                                                       
                <!-- INICIO TABLA INFO CDR -->
                <table id="tablacontactos_infusu" class="table table-striped table-hover table-bordered text-center">

                </table>
                <!-- FIN TABLA INFO CDR -->
            </div>
            <!-- div contenedor de la tabla -->
        </div>
        <!-- fin div con la cdr detallado del informe usuario -->        
    </div>
    <!-- fin de contenedor principal de informe detallado por usuario -->                            
</div>

