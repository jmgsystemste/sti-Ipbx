function InformeGeneralDetallado() {
    limpiar_pagina();
    thedatedet = document.frmreportdet.theDateDet.value;
    thedate1det = document.frmreportdet.theDate1Det.value;
    estado = document.frmreportdet.estado.value;
       
    ajax = objetoAjax();
    ajax.open("POST", "../modelos/mod_informe_gendet.php", true);
    ajax.onreadystatechange = function ()
    {
        if (ajax.readyState == 4 && ajax.status == 200)
        {
            
            var array = JSON.parse(ajax.responseText);
            var i;
                  
            document.frminfogensal.fech_ini_gensal.value = thedatedet;
            document.frminfogensal.fech_fin_gensal.value = thedate1det;
            document.frminfogensal.tot_llam_gensal.value = number_format(array[0].tot_llam,0);
            document.frminfogensal.tot_min_gensal.value = hor_min_seg(array[1].tot_minu);
            document.frminfogensal.pro_min_gensal.value = promedio(array[0].tot_llam, array[1].tot_minu);
            document.frminfogensal.con_gensal.value = number_format(array[2].tot_contes,0);
            document.frminfogensal.nocon_gensal.value = number_format(array[3].tot_no_contes,0);
            document.frminfogensal.ocu_gensal.value = number_format(array[4].tot_ocup,0);
            document.frminfogensal.fal_gensal.value = number_format(array[5].tot_fall,0);          
            
            graficar(array[2].tot_contes, array[3].tot_no_contes, array[4].tot_ocup, array[5].tot_fall);
            BuscarRegistroDetallado(0, 20, 1, thedatedet, thedate1det, estado);
        }
    }
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send("thedate=" + thedatedet + "&thedate1=" + thedate1det);
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

function graficar(cont, nocont, ocup, falla){
    var ctxsal = document.getElementById("myChartSal");
        
    Chart.defaults.global.defaultFontFamily = "Lato";
    Chart.defaults.global.defaultFontSize = 14;
        
    var datasal = {
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
    var myChartSal = new Chart(ctxsal, {
        type: 'doughnut',
        data: datasal
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

