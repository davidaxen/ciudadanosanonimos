//========================
//CREACION DEL OBJETO AJAX
//========================
function objetoAjax(){
    var xmlhttp=false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
 
    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}


//==================
function mostrarMunicipios(){
    divResultado = document.getElementById('listamunicipios');
    prov=document.getElementById('obj_provincia').value;
    ajax=objetoAjax();
    ajax.open("POST", "municipios.php");
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            divResultado.innerHTML = ajax.responseText
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("idprov="+prov)
}


 
//==================
function mostrarConsejos(){
 
    divResultado = document.getElementById('listaconsejos');
    mun=document.getElementById('obj_municipio').value;
 
    ajax=objetoAjax();
    ajax.open("POST", "consejos.php");
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            divResultado.innerHTML = ajax.responseText
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("idmun="+mun)
}