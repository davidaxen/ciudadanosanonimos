function reloj() {   
  //obtiene fecha y hora   
  var fecha = new Date();   
  var Anio = fecha.getFullYear();   
  var Mes = fecha.getMonth();   
  var DiaActual = fecha.getDate();   
  var Dia = fecha.getDay();   
  var horas = fecha.getHours();   
  var minutos = fecha.getMinutes();   
  var segundos = fecha.getSeconds();   
  
  //asigna p.m. o a.m. segun el caso   
  var cir = "";   
  var i = 12;   
  if(horas < i) {   
    cir = "a.m.";   
  } else if(horas >= i) {   
    cir = "p.m.";   
  }   
  
  //array nombres meses   
  var mes = new Array();   
  mes[0] = "Enero";   
  mes[1] = "Febrero";   
  mes[2] = "Marzo";   
  mes[3] = "Abril";   
  mes[4] = "Mayo";   
  mes[5] = "Junio";   
  mes[6] = "Julio";   
  mes[7] = "Agosto";   
  mes[8] = "Septiembre";   
  mes[9] = "Octubre";   
  mes[10] = "Noviembre";   
  mes[11] = "Diciembre";   
     
  //array nombres dias   
  var dia = new Array();   
  dia[0] = "Domingo";   
  dia[1] = "Lunes";   
  dia[2] = "Martes";   
  dia[3] = "Miércoles";   
  dia[4] = "Jueves";   
  dia[5] = "Viernes";   
  dia[6] = "Sábado";   
     
  //array horas   
  var hr = new Array();   
  hr[0] = "12";   
  hr[1] = "01";   
  hr[2] = "02";   
  hr[3] = "03";   
  hr[4] = "04";   
  hr[5] = "05";   
  hr[6] = "06";   
  hr[7] = "07";   
  hr[8] = "08";   
  hr[9] = "09";   
  hr[10] = "10";   
  hr[11] = "11";   
  hr[12] = "12";   
  hr[13] = "01";   
  hr[14] = "02";   
  hr[15] = "03";   
  hr[16] = "04";   
  hr[17] = "05";   
  hr[18] = "06";   
  hr[19] = "07";   
  hr[20] = "08";   
  hr[21] = "09";   
  hr[22] = "10";   
  hr[23] = "11";   
     
  //obtiene nombre mes   
  //mas faci: Mes = mes[Mes];   
  if(Mes==0){Mes = mes[0];}   
  if(Mes==1){Mes = mes[1];}   
  if(Mes==2){Mes = mes[2];}   
  if(Mes==3){Mes = mes[3];}   
  if(Mes==4){Mes = mes[4];}   
  if(Mes==5){Mes = mes[5];}   
  if(Mes==6){Mes = mes[6];}   
  if(Mes==7){Mes = mes[7];}   
  if(Mes==8){Mes = mes[8];}   
  if(Mes==9){Mes = mes[9];}   
  if(Mes==10){Mes = mes[10];}   
  if(Mes==11){Mes = mes[11];}   
  
  //obtiene nombre dia   
  //mas facil: Dia = dia[Dia];   
  if(Dia==0){Dia = dia[0];}   
  if(Dia==1){Dia = dia[1];}   
  if(Dia==2){Dia = dia[2];}   
  if(Dia==3){Dia = dia[3];}   
  if(Dia==4){Dia = dia[4];}   
  if(Dia==5){Dia = dia[5];}   
  if(Dia==6){Dia = dia[6];}   
     
  //ajusta formato horas   
  //mas facil: horas = hr[horas];   
  if(horas==0){horas = hr[0];}   
  if(horas==1){horas = hr[1];}   
  if(horas==2){horas = hr[2];}   
  if(horas==3){horas = hr[3];}   
  if(horas==4){horas = hr[4];}   
  if(horas==5){horas = hr[5];}   
  if(horas==6){horas = hr[6];}   
  if(horas==7){horas = hr[7];}   
  if(horas==8){horas = hr[8];}   
  if(horas==9){horas = hr[9];}   
  if(horas==10){horas = hr[10];}   
  if(horas==11){horas = hr[11];}   
  if(horas==12){horas = hr[12];}   
  if(horas==13){horas = hr[13];}   
  if(horas==14){horas = hr[14];}   
  if(horas==15){horas = hr[15];}   
  if(horas==16){horas = hr[16];}   
  if(horas==17){horas = hr[17];}   
  if(horas==18){horas = hr[18];}   
  if(horas==19){horas = hr[19];}   
  if(horas==20){horas = hr[20];}   
  if(horas==21){horas = hr[21];}   
  if(horas==22){horas = hr[22];}   
  if(horas==23){horas = hr[23];}   
     
  //ajusta segundos   
  var m = 10;   
  if(minutos < m) {   
    minutos="0"+minutos;   
  }   
  if(segundos < m) {   
    segundos="0"+segundos;   
  }   
    
  //cadena final   
  textoFinal = (Dia+", "+DiaActual+" de "+Mes+" de "+Anio+"       [ "+horas+":"+minutos+":"+segundos+" "+cir+" ]");   
  
  //muestra en barra de estado   
  window.status = textoFinal;   
  //si quieres poner algo en el titulo   
//  document.title = " |-[ Prockto ]-| ";   
  
  //repite cada 1 segundo   
  setTimeout("reloj()",1000);   
}   
  
reloj()   
