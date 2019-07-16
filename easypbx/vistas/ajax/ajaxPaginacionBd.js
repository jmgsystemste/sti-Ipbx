function Paginacion_Contactos_Internos(inicio, cantidad, pagina) {
    limpiar_pagina();

    registro_ini = inicio;     //registro de inicio para busqueda de la base de datos.
    paginacion_cant = cantidad;   //constante de la cantidad de registros a mostrar.
    pagina_act = pagina;     //variable de la pagina actual.

    ajax = objetoAjax();

    ajax.open("POST", "../modelos/mod_paginacion_bd.php", true);

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
                if (array[i].disposition == "ANSWERED") {
                    out += "<td style='padding:5px'>CONTESTADA</td>";
                } else if (array[i].disposition == "NO ANSWER") {
                    out += "<td style='padding:5px'>NO CONTESTADA</td>";
                } else if (array[i].disposition == "BUSY") {
                    out += "<td style='padding:5px'>OCUPADA</td>";
                } else if (array[i].disposition == "FAILED") {
                    out += "<td style='padding:5px'>FALLIDA</td>";
                }                
                out += "<td style='padding:5px'><audio controls><source src='" + array[i].userfield + "'></audio></td>\n\
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
                            <a class="page-link" id="anterior" onclick="Paginacion_Contactos_Internos(0, 20, 1);">Inicial</a>\n\
                       </li>';
        paginar += '<li class="page-item"><a class="page-link" onclick="anterior();">&lsaquo;&lsaquo;</a></li>';
        if (pagina_act > ver_paginado) {
            if (pagina_act == 1) {
                paginar += '<li class="page-item active"><a class="page-link" href="#">&nbsp;' + 1 + ' </a></li>';
            } else {
                paginar += '<li class="page-item"><a class="page-link" onclick="paginar(1);">&nbsp;' + 1 + ' </a></li>';
            }
            paginar += '<li class="page-item"><a class="page-link" href="#">&nbsp;' + '...' + ' </a></li>';
        } else if (pagina_act <= ver_paginado) {
            if (pagina_act == 1) {
                paginar += '<li class="page-item active"><a class="page-link" href="#">&nbsp;' + 1 + ' </a></li>';
            } else {
                paginar += '<li class="page-item"><a class="page-link" onclick="paginar(1);">&nbsp;' + 1 + ' </a></li>';
            }
        }
        control = pagina_act + 4;
        for (i = pagina_act; i < control; i++) {
            if (control > total_paginas) {
                control = total_paginas;
            }
            if (pagina_act == 1) {
                paginar += '<li class="page-item"><a class="page-link" onclick="paginar(' + (i + 1) + ');">&nbsp;' + (i + 1) + ' </a></li>';
            } else if (pagina_act > 1 && pagina_act < total_paginas) {
                if (i == pagina_act) {
                    paginar += '<li class="page-item active"><a class="page-link" href="#">&nbsp;' + i + ' </a></li>';
                } else {
                    paginar += '<li class="page-item"><a class="page-link" onclick="paginar(' + i + ');">&nbsp;' + i + ' </a></li>';
                }
            } else if (pagina_act == total_paginas) {
                paginar += '<li class="page-item"><a class="page-link" onclick="paginar(' + (total_paginas - 1) + ');">&nbsp;' + (total_paginas - 1) + ' </a></li>';
            }
        }
        if (pagina_act < (total_paginas - (ver_paginado - 1))) {
            paginar += '<li class="page-item"><a class="page-link" href="#">&nbsp;' + '...' + ' </a></li>';
            if (pagina_act == total_paginas) {
                paginar += '<li class="page-item active"><a class="page-link" href="#">&nbsp;' + total_paginas + ' </a></li>';
            } else {
                paginar += '<li class="page-item"><a class="page-link" onclick="paginar(' + total_paginas + ');">&nbsp;' + total_paginas + ' </a></li>';
            }
        } else if (pagina_act >= (total_paginas - (ver_paginado - 1))) {
            if (pagina_act == total_paginas) {
                paginar += '<li class="page-item active"><a class="page-link" href="#">&nbsp;' + total_paginas + ' </a></li>';
            } else {
                paginar += '<li class="page-item"><a class="page-link" onclick="paginar(' + total_paginas + ');">&nbsp;' + total_paginas + ' </a></li>';
            }
        }
        paginar += '<li class="page-item"><a class="page-link" onclick="siguiente();">&rsaquo;&rsaquo;</a></li>';
        paginar += '<li class="page-item">\n\
                            <a class="page-link" class="page-link" id="siguiente" onclick="Paginacion_Contactos_Internos(inicio_pagfin, 20, total_paginas);">Final</a>\n\
                        </li></ul>';
        if (pagina_act < total_paginas) {
            var regcantidad = "Resultado - " + parseInt(registro_ini + 1) + " al " + parseInt(registro_ini + paginacion_cant) + " de " + total_registros + " Registros - Pagina No " + pagina_act + " de " + Math.ceil(total_registros / paginacion_cant);
        } else if (pagina_act == total_paginas) {
            var regcantidad = "Resultado - " + parseInt(registro_ini + 1) + " al " + parseInt(total_registros) + " de " + total_registros + " Registros - Pagina No " + pagina_act + " de " + Math.ceil(total_registros / paginacion_cant);
        }

        document.getElementById("paginacion").innerHTML = paginar;
        document.getElementById("regcantidad").innerHTML = regcantidad;
        document.getElementById("tablacontactos").innerHTML = out;
        tot_reg = total_registros;
    }
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send("ini_reg=" + registro_ini + "&can_reg=" + paginacion_cant);
}

function seg_min(segundos) {
    var minutes = Math.floor(segundos / 60);
    var seconds = segundos % 60;
    //Anteponiendo un 0 a los minutos si son menos de 10 
    minutes = minutes < 10 ? '0' + minutes : minutes;
    //Anteponiendo un 0 a los segundos si son menos de 10 
    seconds = seconds < 10 ? '0' + seconds : seconds;
    var result = minutes + ":" + seconds;  // 161:30
    return result;
}

function paginar(i) {
    var inicio = ((paginacion_cant * i) - paginacion_cant);
    var cantidad = paginacion_cant;
    var pagina = i;
    Paginacion_Contactos_Internos(inicio, cantidad, pagina);
}

function anterior() {
    if (parseInt(pagina_act - 1) > 0) {
        s_control = 1;
        s_pagina = pagina_act - 1;
        s_cantidad = paginacion_cant;
        s_inicio = (registro_ini - s_cantidad);
        Paginacion_Contactos_Internos(s_inicio, s_cantidad, s_pagina);
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

function siguiente() {
    s_pag_fin = Math.ceil(tot_reg / paginacion_cant);

    if (pagina_act <= s_pag_fin - 1) {
        s_pagina = pagina_act + 1;
        s_cantidad = paginacion_cant;
        s_inicio = (registro_ini + s_cantidad);
        Paginacion_Contactos_Internos(s_inicio, s_cantidad, s_pagina);
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
function limpiar_pagina() {
    document.frminfogensal.fech_ini_gensal.value = '';
    document.frminfogensal.fech_fin_gensal.value = '';
    document.frminfogensal.tot_llam_gensal.value = '';
    document.frminfogensal.tot_min_gensal.value = '';
    document.frminfogensal.pro_min_gensal.value = '';
    document.frminfogensal.con_gensal.value = '';
    document.frminfogensal.nocon_gensal.value = '';
    document.frminfogensal.ocu_gensal.value = '';
    document.frminfogensal.fal_gensal.value = '';

    document.getElementById('ext01').innerHTML = '';
    document.getElementById('ext02').innerHTML = '';
    document.frminfoususal.fech_ini_ususal.value = '';
    document.frminfoususal.fech_fin_ususal.value = '';
    document.frminfoususal.exten_ususal.value = '';
    document.frminfoususal.tot_min_ususal.value = '';
    document.frminfoususal.pro_min_ususal.value = '';
    document.frminfoususal.tot_llam_ususal.value = '';
    document.frminfoususal.con_ususal.value = '';
    document.frminfoususal.nocon_ususal.value = '';
    document.frminfoususal.ocu_ususal.value = '';
    document.frminfoususal.fall_ususal.value = '';


    document.getElementById('ext03').innerHTML = '';
    document.getElementById('ext04').innerHTML = '';
    document.frminfousuent.fech_ini_usuent.value = '';
    document.frminfousuent.fech_fin_usuent.value = '';
    document.frminfousuent.exten_usuent.value = '';
    document.frminfousuent.tot_min_usuent.value = '';
    document.frminfousuent.pro_min_usuent.value = '';
    document.frminfousuent.tot_llam_usuent.value = '';
    document.frminfousuent.con_usuent.value = '';
    document.frminfousuent.nocon_usuent.value = '';
    document.frminfousuent.ocu_usuent.value = '';
    document.frminfousuent.fall_usuent.value = '';
    return;

}
