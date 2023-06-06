function FirmarPdfMaqueta(path_pdf_in,path_pdf_out,imagen,razon,ubicacion,serial,msg) { 

 // 	alert("Path In: "+path_pdf_in);
 // 	alert("Path Out: "+path_pdf_out); 
//
// tiene 5 valores, los primeros dos son las coordenas x1,y1 
// los siguientes dos las coordenadas x2,y2 y el ultimo el numero de pagina donde queres que salga. 
// Lo que hace es dibujar un cadrado del punto x1,y1 al punto x2y2 en la pagina indicada. 
// El punto x1=0 y y1=0 es la esquina inferior derecha de la hoja. 
// var coordenadas = "-400,0,800,50,1,"+msg; 
   
    var coordenadas = "-300,775,500,825,1,"+msg; 
    var certificado = "0";
    var webserviceURL = "http://190.106.199.90:42000";  
   	var SerialCertificado = serial;

    var url = webserviceURL + "/ServiciosWeb/FirmadoWs.asmx/FirmarPDFP12?path_pdf_in=" + JSON.stringify(path_pdf_in) +
        "&path_pdf_out=" + JSON.stringify(path_pdf_out) +
        "&razon=" + JSON.stringify(razon) +
        "&ubicacion=" + JSON.stringify(ubicacion) +
        "&imagen=" + JSON.stringify(imagen) +
        "&coordenadas=" + JSON.stringify(coordenadas) +
        "&SerialCertificado=" + JSON.stringify(SerialCertificado);
    
	jQuery.support.cors = true;
    $.ajax({
        dataType: "jsonp",
        url: url + "&format=json",
        contentType: "application/json; charset=utf-8",
        success: function (res) { FirmarPdfP12_cb(res,certificado) },
        error: ErrorInesperadoFirmado
    });
}


function FirmarPdfP12_cb(res) {
    var respuesta = res.d;
    if(respuesta.status==0){
    	alert(respuesta.descripcion);  
			var locat = window.location.href;   
      //      locat   = locat.replace(".php", "-done.php");
    	window.location.replace(locat);
    } else {
    	alert("Error: " + respuesta.status + "  Descripcion: " + respuesta.descripcion);   
    }
}

function ErrorInesperadoFirmado(res) {
    alert("Error al firmar");
}
