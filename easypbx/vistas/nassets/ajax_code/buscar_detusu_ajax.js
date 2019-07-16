function BuscarRegistroDetusu(inicio, cantidad, pagina, fecha1, fecha2, extencion, estado) {
    
    thedate = fecha1;
    thedate1 = fecha2;
    n_extencion = extencion;
    n_estado = estado;   
    registro_ini = inicio;     //registro de inicio para busqueda de la base de datos.
    paginacion_cant = cantidad;   //constante de la cantidad de registros a mostrar.
    pagina_act = pagina;     //variable de la pagina actual.
    
    ajax = objetoAjax();
    ajax.open("POST", "../modelos/mod_registros_buscar_detusu.php", true);
    ajax.onreadystatechange = function ()
    {
        if (ajax.readyState == 4 && ajax.status == 200)
        {
            
            var array = JSON.parse(ajax.responseText);
            var i;
            var out = "<html>";
            out += "<tr class='info'>\n\
                        <th>#</th>\n\
                        <th>Fecha</th>\n\
                        <th>Origen</th>\n\
                        <th>Destino</th>\n\
                        <th>Duraciòn (Minutos)</th>\n\
                        <th>Resultado</th>\n\
                        <th Grabaciones</th>\n\
                    </tr>";

            for (i = 0; i < array.length - 1; i++) {
                out += "<tr class='info'>\n\
                        <td style='padding:5px'>" + array[i].id + "</td>\n\
                        <td style='padding:5px'>" + array[i].calldate + "</td>\n\
                        <td style='padding:5px'>" + array[i].src + "</td>\n\
                        <td style='padding:5px'>" + array[i].dst + "</td>\n\
                        <td style='padding:5px'>" + seg_min(array[i].duration) + "</td>";
                if(array[i].disposition=="ANSWERED"){                   
                    out += "<td style='padding:5px'>CONTESTADA</td>";
                }else if(array[i].disposition=="NO ANSWER"){
                    out += "<td style='padding:5px'>NO CONTESTADA</td>";
                }else if(array[i].disposition=="BUSY") {    
                    out += "<td style='padding:5px'>OCUPADA</td>";
                }else if (array[i].disposition == "FAILED") {
                    out += "<td style='padding:5px'>FALLIDA</td>";
                }  
                    out += "<td style='padding:5px'><audio controls><source src='"+ array[i].userfield + "'></audio></td>\n\
                    </tr>";
            }
            out += '</html>';
        }

        if (i > 0) {
            var total_registros = array[i].cantidad;
        }

        total_paginas = Math.ceil(total_registros / paginacion_cant);
        inicio_pagfin = (paginacion_cant * (total_paginas - 1));
        ver_paginado = 5;
        
        var paginar = '<ul class="pagination">';
            paginar += '<li class="page-item">\n\
                                <a class="page-link" id="anterior" onclick="BuscarRegistroDetusu(0, 20, 1,thedate,thedate1, n_extencion, n_estado);">Inicial</a>\n\
                           </li>';
            paginar += '<li class="page-item"><a class="page-link" onclick="anterior_bs_detusu();">&lsaquo;&lsaquo;</a></li>';
        if (pagina_act > ver_paginado) {
            if (pagina_act == 1) {
                paginar += '<li class="page-item active"><a class="page-link" href="#">&nbsp;' + 1 + ' </a></li>';
            } else {
                paginar += '<li class="page-item"><a class="page-link" onclick="paginar_bs_detusu(1);">&nbsp;' + 1 + ' </a></li>';
            }
            paginar += '<li class="page-item"><a class="page-link" href="#">&nbsp;' + '...' + ' </a></li>';
        } else if (pagina_act <= ver_paginado) {
            if (pagina_act == 1) {
                paginar += '<li class="page-item active"><a class="page-link" href="#">&nbsp;' + 1 + ' </a></li>';
            } else {
                paginar += '<li class="page-item"><a class="page-link" onclick="paginar_bs_detusu(1);">&nbsp;' + 1 + ' </a></li>';
            }            
        }
        control = pagina_act+4;
        
        if(control > total_paginas){              
            control = total_paginas;
        }
        
        if(total_paginas <= control){
        
            for (i = pagina_act; i < total_paginas; i++) {                           
                 paginar += '<li class="page-item"><a class="page-link" onclick="paginar_bs_detusu(' + (i+1) + ');">&nbsp;' + (i+1) + ' </a></li>';                
            }
        
        }else{
       
            for (i = pagina_act; i < control; i++) {                           
                if(pagina_act == 1){               
                    paginar += '<li class="page-item"><a class="page-link" onclick="paginar_bs_detusu(' + (i+1) + ');">&nbsp;' + (i+1) + ' </a></li>';
                }else if(pagina_act > 1 && pagina_act < total_paginas){                
                    if (i == pagina_act) {
                        paginar += '<li class="page-item active"><a class="page-link" href="#">&nbsp;' + i + ' </a></li>';
                    } else {
                        paginar += '<li class="page-item"><a class="page-link" onclick="paginar_bs_detusu(' + i + ');">&nbsp;' + i + ' </a></li>';
                    }               
                }else if(pagina_act == total_paginas){
                    paginar += '<li class="page-item"><a class="page-link" onclick="paginar_bs_detusu(' + (total_paginas-1) + ');">&nbsp;' + (total_paginas-1) + ' </a></li>';              
                }
            }
        }
        
        if (pagina_act < (total_paginas - (ver_paginado - 1))) {
            paginar += '<li class="page-item"><a class="page-link" href="#">&nbsp;' + '...' + ' </a></li>'; //coloca ... antes de la pagina final.
            if (pagina_act == total_paginas) {
                paginar += '<li class="page-item active"><a class="page-link" href="#">&nbsp;' + total_paginas + ' </a></li>';
            } else if(pagina_act == total_paginas && pagina_act == 1 ){
                paginar += '<li class="page-item"></li>';
            }else{
                paginar += '<li class="page-item"><a class="page-link" onclick="paginar_bs_detusu(' + total_paginas + ');">&nbsp;' + total_paginas + ' </a></li>';
            }
        } else if (pagina_act >= (total_paginas - (ver_paginado - 1))) {
            if (pagina_act == total_paginas && pagina_act != 1 ) {
                paginar += '<li class="page-item active"><a class="page-link" href="#">&nbsp;' + total_paginas + ' </a></li>';
            } else if(pagina_act == total_paginas && pagina_act == 1 ){
                paginar += '<li class="page-item"></li>';    
            } else {
                paginar += '<li class="page-item"><a class="page-link" onclick="paginar_bs_detusu(' + total_paginas + ');">&nbsp;' + total_paginas + ' </a></li>';
            }
        }        
        paginar += '<li class="page-item"><a class="page-link" onclick="siguiente_bs_detusu();">&rsaquo;&rsaquo;</a></li>';
        paginar += '<li class="page-item">\n\
                            <a class="page-link" class="page-link" id="siguiente" onclick="BuscarRegistroDetusu(inicio_pagfin, 20, total_paginas, thedate, thedate1, n_extencion, n_estado);">Final</a>\n\
                    </li></ul>';
        if(pagina_act < total_paginas){
            var regcantidad = "Resultado - " + parseInt(registro_ini + 1) + " al " + parseInt(registro_ini + paginacion_cant) + " de " + total_registros + " Registros - Pagina No " + pagina_act + " de " + Math.ceil(total_registros / paginacion_cant);
        } else if (pagina_act == total_paginas){
            var regcantidad = "Resultado - " + parseInt(registro_ini + 1) + " al " + parseInt(total_registros) + " de " + total_registros + " Registros - Pagina No " + pagina_act + " de " + Math.ceil(total_registros / paginacion_cant);
        }
        
        document.getElementById("paginacion_infusu").innerHTML = paginar;
        document.getElementById("regcantidad_infusu").innerHTML = regcantidad;
        document.getElementById("tablacontactos_infusu").innerHTML = out;
        tot_reg = total_registros;
    }
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send("thedate=" + thedate + "&thedate1=" + thedate1 + "&extencion=" + n_extencion + "&estado=" + n_estado + "&ini_reg=" + registro_ini + "&can_reg=" + paginacion_cant);
//VER.1.1 - REVISADO OPTIMIZADO Y PROBADO ----- 30-MAY-2018 ------ PROY. EasyPBX.    
}

function seg_min(segundos){
    var minutes = Math.floor( segundos / 60 );
    var seconds = segundos % 60; 
    //Anteponiendo un 0 a los minutos si son menos de 10 
    minutes = minutes < 10 ? '0' + minutes : minutes;
    //Anteponiendo un 0 a los segundos si son menos de 10 
    seconds = seconds < 10 ? '0' + seconds : seconds;
    var result = minutes + ":" + seconds;  // 161:30
    return result;
}

function paginar_bs_detusu(i) {
    var inicio = ((paginacion_cant * i) - paginacion_cant);
    var cantidad = paginacion_cant;
    var pagina = i;
    BuscarRegistroDetusu(inicio, cantidad, pagina, thedate, thedate1, n_extencion, n_estado);
}

function anterior_bs_detusu() {
    if (parseInt(pagina_act - 1) > 0) {
        s_control = 1;
        s_pagina = pagina_act - 1;
        s_cantidad = paginacion_cant;
        s_inicio = (registro_ini - s_cantidad);
        BuscarRegistroDetusu(s_inicio, s_cantidad, s_pagina, thedate, thedate1, n_extencion, n_estado);
    } else {
        swal({
            type: 'warning',
            title: 'FINAL DE REGISTROS',
            text: 'No existen mas registros..!',
            showConfirmButton: false,
            timer: 3000
        })
    }
}

function siguiente_bs_detusu() {
    s_pag_fin = Math.ceil(tot_reg / paginacion_cant);

    if (pagina_act <= s_pag_fin - 1) {
        s_pagina = pagina_act + 1;
        s_cantidad = paginacion_cant;
        s_inicio = (registro_ini + s_cantidad);
        BuscarRegistroDetusu(s_inicio, s_cantidad, s_pagina, thedate, thedate1, n_extencion, n_estado);
    } else {
        swal({
            type: 'warning',
            title: 'FINAL DE REGISTROS',
            text: 'No existen mas registros..!',
            showConfirmButton: false,
            timer: 3000
        })
    }
}    
