/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function startTime() {
    var today=new Date();
    var d=today.getDay();
    var D=today.getDate()
    var M=today.getMonth();
    var y=today.getFullYear();
    var h=today.getHours();
    var m=today.getMinutes();
    var s=today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    
    switch(d){
        case 0:
            d='Domingo'
            break;
        case 1:
            d='Lunes'
            break;
        case 2:
            d='Martes'
            break;
        case 3:
            d='Miércoles'
            break;
        case 4:
            d='Jueves'
            break;
        case 5:
            d='Viernes'
            break;
        case 6:
            d='Sábado'
            break;
    }
    
    switch(M){
        case 0:
            M='Enero'
            break;
        case 1:
            M='Febrero'
            break;
        case 2:
            M='Marzo'
            break;
        case 3:
            M='Abril'
            break;
        case 4:
            M='Mayo'
            break;
        case 5:
            M='Junio'
            break;
        case 6:
            M='Julio'
            break;
        case 7:
            M='Agosto'
            break;
        case 8:
            M='Septiembre'
            break;
        case 9:
            M='Octubre'
            break;
        case 10:
            M='Noviembre'
            break;
        case 11:
            M='Diciembre'
            break;
    }
    document.getElementById('dt').innerHTML = '<i class="fa fa-calendar-o fa-fw"></i> '+d+' '+D+' de '+M+' de '+y;
    document.getElementById('tm').innerHTML = '<i class="fa fa-clock-o fa-fw"></i> '+h+':'+m+':'+s;
    var t = setTimeout(function(){startTime()},500);
}
function checkTime(i) {
    if (i<10) {i = '0' + i};  // add zero in front of numbers < 10
    return i;
}