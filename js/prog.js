function cambiar(num1,num){
	elemento=eval("bola"+num1)
	elemento.src="bola"+num+".gif"
}



function mod(num,numi,numf){
for (i=numi;i<numf+1;i++){
elem1=eval("ver"+i)
//elem2=eval("menu"+i)	
if (i==num){
elem1.style.visibility="visible"
//elem2.style.background="#DEE9F7"
//elem2.style.color="#016EA3"
}else{
elem1.style.visibility="hidden"
//elem2.style.background="#016EA3"
//elem2.style.color="#DEE9F7"
}
}
}


function zona(top){
	for (i=2;i<top;i++){
	valor.style.visibility="hidden"
	}
}
function zon(num1,top){
	for (i=2;i<top;i++){
		valor=eval("ver"+i)
		if (i==num1){
			valor.style.visibility="visible"
		}else{
			valor.style.visibility="hidden"
		}

	}
}

function ver(num1,top){
	for (i=1;i<top;i++){
		valor=eval("ver"+i)
		if (i==num1){
			valor.style.visibility="visible"
		}else{
			valor.style.visibility="hidden"
		}

	}
}


function formu(val,pag){
	if (val=="todo"){
		document.write("<h3>SOLICITUD DE PRESUPUESTO</H3>")
	}else{
		document.write("<h3>SOLICITUD DE MÁS INFORMACIÓN</H3>")
	}
document.write("<b><i><font size='2'>La información contenida en este formulario")
document.write("pasará a formar parte de una base de datos, asi usted podrá recibir información")
document.write("comercial de nuestra empresa. Si usted no desea recibirla, por favor, comuníquenoslo")
document.write("indicando claramente su nombre, apellidos y dirección. (Ley Orgánica 5/1992,")
document.write("de 29 de Octubre. Gracias</font></i></b>")
document.write("<BR>")
document.write("<form name='inform' method='post' action='mailto:admiservi@yahoo.com'>")

	if (val=="todo"){
		document.write("<input type='hidden' name='servicio' value='"+pag+"-presupuesto'>")
	}else{
		document.write("<input type='hidden' name='servicio' value='"+pag+"-informacion'>")
	}

document.write("<table border='0'>")
document.write("<tr><td>Nombre:&nbsp;&nbsp;&nbsp; <input type='text' name='nombre' size='37'></td></tr>")
document.write("<tr><td>Apellidos:&nbsp; <input type='text' name='apellidos' size='37'></td></tr>")
document.write("<tr><td>Dirección:&nbsp; <input type='text' name='direccion' size='37'></td></tr>")
document.write("<tr><td>Teléfono:&nbsp;&nbsp; <input type='text' name='telef' size='20'></td></tr>")
document.write("<tr><td>Fax:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='text' name='fax' size='20'></td></tr>")
document.write("<tr><td>Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='text' name='email' size='37'></td></tr>")
document.write("<tr><td>C.P.:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <input type='text' name='cp' size='16'></td></tr>")
document.write("<tr><td>Localidad:&nbsp; <input type='text' name='localidad' size='21'></td></tr>")
document.write("<tr><td>Provincia:&nbsp; <input type='text' name='provincia' size='20'></td></tr>")

	if (pag=="piscina" && val=="todo"){
		document.write("<tr><td>Nº de Vivienda:&nbsp; <input type='text' name='vivienda' size='20'></td></tr>")
		document.write("<tr><td>Anchura de la Piscina:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='text' name='anchura' size='10'> metros</td></tr>")
		document.write("<tr><td>Longitud de la Piscina:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='text' name='longitud' size='10'> metros</td></tr>")
		document.write("<tr><td>Profundidad de la Piscina:&nbsp; <input type='text' name='profundidad' size='10'> metros</td></tr>")
	}
	if (pag=="admi" && val=="todo"){
		document.write("<tr><td>Nº de Vivienda:&nbsp; <input type='text' name='vivienda' size='20'></td></tr>")
		document.write("<tr><td>Servicios de los que dispone:<br>")
		document.write("<textarea rows='3' name='servicios' cols='37'></textarea></td></tr>")
	}
	if (pag=="limpieza" && val=="todo"){
	document.write("<tr><td>Servicio/s que le interesa:&nbsp; <input type='text' name='servicio' size='20'></td></tr>")
	}
document.write("<tr><td>Comentario:<br>")
document.write("<textarea rows='7' name='comentarios' cols='37'></textarea></td></tr>")
document.write("</table>")
document.write("<input type='submit' value='Enviar' name='boton2'>")
document.write("<input type='reset' value='Restablecer' name='B2'>")
document.write("</form>")

}

function lap(valor){

document.write("<h3>LEYES DE APLICACIÓN</H3>")
if (valor=="piscina"){
document.write("Estas son las leyes en las que una Empresa de Mantanimiento y Gestión de Piscinas debe basarse para realizar bien su trabajo")
document.write("<ul>")
document.write("<li>Ordenanza Reguladora de las condiciones Higienico-Sanitarias, técnicas y de Seguridad de las Piscinas del Ayuntamiento de Madrid ")
document.write("<li>Manual de Mantenimiento para encargado de Piscinas de la Comunidad de Madrid")
document.write("</ul>")
}

if (valor=="admi"){
document.write("Estas son las leyes en las que una Administración debe basarse para realizar bien su trabajo")
document.write("<ul>")
document.write("<li>Ley de Propiedad Horizontal")
document.write("<li>Ley de Arrendamientos Urbanos")
document.write("<li>Ley de Arrendamientos Rústicos")
document.write("<li>Constitución Española")
document.write("<li>Ordenanzas del Ayuntamiento de Madrid")
document.write("<li>Ordenanzas de Edificios")
document.write("<li>Normativa sobre la Infraestructura de los Edificios")
}


}


function cabeza(lor){

dato=new Array("Administración de Fincas","Mantenimiento y Gestión de Piscinas","Mantenimiento de jardines","Limpieza de Edificios","Limpieza de Vía Pública","Retirada de cubos","Conserjeria","Otros")
web=new Array("admi.html","piscisol.html","limpevir.html","limpevir.html","limpevir.html","limpevir.html","obra.html","obra.html")

document.write("<div id='logo'>")
document.write("<img src='"+lor+".gif'></td></tr>")
document.write("</div>")

document.write("<div id='emp'>")
document.write("<img src='empresa.gif'>")
document.write("</div>")

document.write("<div id='dire'>")
document.write("C/Nuria, 87 Bajo B - 28034 Madrid<br>")
document.write("Telf/Fax. 91 734 40 94<br>")
document.write("Movil. 606 16 15 13<br>")
document.write("<a href='mailto:"+lor+"@yahoo.es'>correo electronico</a>")
document.write("</div>")

document.write("<div id='submenu'>")
document.write("<table>")
	for(i=0;i<8;i++){
		document.write("<tr><td><img src='bola0.gif'></td><td>")
		document.write("<a href='"+web[i]+"'>")
		document.write(dato[i]+"</a></td></tr>")
	}
document.write("</table>")
document.write("</div>")

}
