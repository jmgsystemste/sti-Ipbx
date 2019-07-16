function InformeUsuarioDetallado() {
    limpiar_pagina();
    
    thedatedet = document.frmreportdetusu.theDateDetusu.value;
    thedate1det = document.frmreportdetusu.theDate1Detusu.value;
    extencion = document.frmreportdetusu.extendetusu.value;
    estado = document.frmreportdetusu.estadousu.value;
       
    ajax = objetoAjax();
    ajax.open("POST", "../modelos/mod_informe_usudet.php", true);
    ajax.onreadystatechange = function ()
    {
        if (ajax.readyState == 4 && ajax.status == 200)
        {
            
            var array = JSON.parse(ajax.responseText);
            
            if(array[0].tot_llam_sal>0){
	        document.getElementById('ext01').innerHTML = extencion;
                document.getElementById('ext02').innerHTML = extencion;
                document.frminfoususal.fech_ini_ususal.value = thedatedet;
                document.frminfoususal.fech_fin_ususal.value = thedate1det;
                document.frminfoususal.exten_ususal.value = extencion;            
                document.frminfoususal.tot_min_ususal.value = hor_min_seg(array[1].tot_mint_sal);
                document.frminfoususal.pro_min_ususal.value = promedio(array[0].tot_llam_sal, array[1].tot_mint_sal);
                document.frminfoususal.tot_llam_ususal.value = number_format(array[0].tot_llam_sal);
                document.frminfoususal.con_ususal.value = number_format(array[2].tot_contes_sal);
                document.frminfoususal.nocon_ususal.value = number_format(array[3].tot_nocontes_sal);
                document.frminfoususal.ocu_ususal.value = number_format(array[4].tot_ocup_sal);
                document.frminfoususal.fall_ususal.value = number_format(array[5].tot_fall_sal);
            
                     
                document.getElementById('ext03').innerHTML = extencion;
                document.getElementById('ext04').innerHTML = extencion;
                document.frminfousuent.fech_ini_usuent.value = thedatedet;
                document.frminfousuent.fech_fin_usuent.value = thedate1det;
                document.frminfousuent.exten_usuent.value = extencion;            
                document.frminfousuent.tot_min_usuent.value = hor_min_seg(array[7].tot_mint_ent);
                document.frminfousuent.pro_min_usuent.value = promedio(array[6].tot_llam_ent, array[7].tot_mint_ent);
                document.frminfousuent.tot_llam_usuent.value = number_format(array[6].tot_llam_ent);
                document.frminfousuent.con_usuent.value = number_format(array[8].tot_contes_ent);
                document.frminfousuent.nocon_usuent.value = number_format(array[9].tot_nocontes_ent);
                document.frminfousuent.ocu_usuent.value = number_format(array[10].tot_ocup_ent);
                document.frminfousuent.fall_usuent.value = number_format(array[11].tot_fall_ent);
            
                graficar_salusu(array[2].tot_contes_sal, array[3].tot_nocontes_sal, array[4].tot_ocup_sal, array[5].tot_fall_sal);
                graficar_entusu(array[8].tot_contes_ent, array[9].tot_nocontes_ent, array[10].tot_ocup_ent, array[11].tot_fall_ent);
            
               BuscarRegistroDetusu(0, 20, 1, thedatedet, thedate1det, extencion, estado);
         
            }else if(array[0].tot_llam_sal==0){
                swal({
                    type: 'warning',
                    title: 'NO SE ENCONTRARON REGISTROS ',
                    text: '¡O ERROR EN LOS DATOS INGRESADOS..!',
                    showConfirmButton: false,
                    timer: 3000
                });                
            } 
          
        }
    }
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send("thedate=" + thedatedet + "&thedate1=" + thedate1det + "&extencion=" + extencion + "&estado=" + estado);
//VER.1.1 - REVISADO OPTIMIZADO Y PROBADO ----- 30-MAY-2018 ------ PROY. EasyPBX.    
}

function promedio(tot_llam, tot_min){
    var promedio = Math.round(tot_min/tot_llam);    
    return seg_min(promedio);   
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

function hor_min_seg(segundos){
var hours = Math.floor( segundos / 3600 );  
var minutes = Math.floor( (segundos % 3600) / 60 );
var seconds = segundos % 60;
 
//Anteponiendo un 0 a los minutos si son menos de 10 
minutes = minutes < 10 ? '0' + minutes : minutes;
 
//Anteponiendo un 0 a los segundos si son menos de 10 
seconds = seconds < 10 ? '0' + seconds : seconds;
 
var result = hours + ":" + minutes + ":" + seconds;  // 2:41:30

return result;
}

function graficar_salusu(cont, nocont, ocup, falla){
    var ctxsalusu = document.getElementById("myChartSalusu");
    Chart.defaults.global.defaultFontFamily = "Lato";
    Chart.defaults.global.defaultFontSize = 14;
        
    var datasalusu = {
        labels: [
            " Contestadas",
            " No Contestadas",
            " Ocupadas",
            " Falladas"                
        ],
        datasets: [
            {
                data: [cont, nocont, ocup, falla],
                backgroundColor: [
                    "#00c0ef",
                    "#3c8dbc",
                    "#f56954",
                    "#088A08"
                ]
            }]
    };            
        
    var myChartSalusu = new Chart(ctxsalusu, {
        type: 'doughnut',
        data: datasalusu
    });   
}

function graficar_entusu(cont, nocont, ocup, falla){
    var ctxentusu = document.getElementById("myChartEntusu");
        
    Chart.defaults.global.defaultFontFamily = "Lato";
    Chart.defaults.global.defaultFontSize = 14;
        
    var dataentusu = {
        labels: [
           " Contestadas",
            " No Contestadas",
            " Ocupadas",
            " Falladas"                    
        ],
        datasets: [
            {
                data: [cont, nocont, ocup, falla],
                backgroundColor: [
                   "#00c0ef",
                    "#3c8dbc",
                    "#f56954",
                    "#088A08"
                ]
            }]
    };
        
    var myChartEntusu = new Chart(ctxentusu, {
        type: 'doughnut',
        data: dataentusu
    });   
    
}

function number_format(amount, decimals) {

    amount += ''; // por si pasan un numero en vez de un string
    amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

    decimals = decimals || 0; // por si la variable no fue fue pasada

    // si no es un numero o es igual a cero retorno el mismo cero
    if (isNaN(amount) || amount === 0) 
        return parseFloat(0).toFixed(decimals);

    // si es mayor o menor que cero retorno el valor formateado como numero
    amount = '' + amount.toFixed(decimals);

    var amount_parts = amount.split('.'),
        regexp = /(\d+)(\d{3})/;

    while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + '.' + '$2');

    return amount_parts.join('.');
}

