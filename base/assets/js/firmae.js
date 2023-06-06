$(document).ready(function () {
    //document.getElementById("btnFirmae").style.display = "none";
    var webNavegador = "";
    var isFirefox = typeof InstallTrigger !== 'undefined';
    var isIE = /*@cc_on!@*/false || !!document.documentMode;
    var isChrome = !!window.chrome && !!window.chrome.webstore;
    if (isFirefox) webNavegador = "firefox";
    if (isIE) webNavegador = "iexplorer";
    if (isChrome) webNavegador = "chrome";

    switch (webNavegador) {
        case "chrome":
            var sMensaje = '<h2 style="color:red">No se ha instalado la Extension Chrome.</h2>' +
                       '<a href="https://chrome.google.com/webstore/detail/firmae/mlbdaliecnjbplkpigkkgnjjdpphcggl">Instalar (Chrome)</a>';
            $("#divExtencion").html(sMensaje);
            $("#btnFirmar").hide();
            break;
        case "firefox":
            var sMensaje = '<h2 style="color:red">No se ha instalado la Extensión Firefox.</h2> <a href="http://ccg.com.gt/addonfirefoxquantum/firmae-1.1.5.xpi">Instalar (Firefox)</a>'; $("#divExtencion").html(sMensaje);
            break;
        case "iexplorer":

            var SignedData = document.getElementById("ActiveXFirma");
            if (SignedData.ActiveXCorriendo != "true") {
                var sMensaje = '<h2 style="color:red">No se ha instalado el ActiveX.</h2>';
                $("#divExtencion").html(sMensaje);
                $("#btnFirmar").hide();
            }
            break;
    }
});

function FirmarPdf() {
    //var path_pdf_in = "c://temp//Pdf//1.pdf";
    //var path_pdf_out = "c://temp//Pdf//1_signed.pdf";
    //var imagen = "c://temp//Pdf//sello.jpg";

    var path_pdf_in = "c://inetpub//wwwroot//FirmaExtensiones//Pdfs//1.pdf";
    var path_pdf_out = "c://inetpub//wwwroot//FirmaExtensiones//Pdfs//1_signed.pdf";
    var imagen = "c://inetpub//wwwroot//FirmaExtensiones//Pdfs//sello.jpg";  //null si no se requiere

    var razon = "razon"; //null si no se requiere
    var ubicacion = "ubicacion"; //null si no se requiere
    var coordenadas = "10,30,180,100,1"; //null si no se requiere (6 parametro hace overrride de mensaje predeterminado)
    var certificado = "0";
    var webserviceURL = "http://192.168.10.117/";
    var SolicitarCertificado = "true";
    var webNavegador = "";
    var isFirefox = typeof InstallTrigger !== 'undefined';
    var isIE = /*@cc_on!@*/false || !!document.documentMode;
    var isChrome = !!window.chrome && !!window.chrome.webstore;
  //  if (isFirefox) webNavegador = "firefox";
  //  if (isIE) webNavegador = "iexplorer";
  //  if (isChrome) webNavegador = "chrome";
  	webNavegador = "firefox";
		alert("FirmarPDF() called");
    switch (webNavegador) {
        case "chrome":
        case "firefox":
            FirmarExtension(path_pdf_in, path_pdf_out, razon, ubicacion, imagen, coordenadas, certificado, webserviceURL, SolicitarCertificado);
            break;
        case "iexplorer":
            FirmarActiveX(path_pdf_in, path_pdf_out, razon, ubicacion, imagen, coordenadas, certificado, webserviceURL, SolicitarCertificado);
            break;
    }
}
function FirmarXML() {
    var sXml = "<xml><Documento><Campo1>sCampo1</Campo1><Campo2>sCampo2</Campo2><Campo3>sCampo3</Campo3></Documento></xml>";
    sXml = window.btoa(sXml);
    var webNavegador = "";
    var isFirefox = typeof InstallTrigger !== 'undefined';
    var isIE = /*@cc_on!@*/false || !!document.documentMode;
    var isChrome = !!window.chrome && !!window.chrome.webstore;
    if (isFirefox) webNavegador = "firefox";
    if (isIE) webNavegador = "iexplorer";
    if (isChrome) webNavegador = "chrome";

    switch (webNavegador) {
        case "chrome":
        case "firefox":
            FirmarXMLExtencion(sXml);
            break;
        case "iexplorer":
            FirmarXMLActiveX(sXml);
            break;
    }
}
function ValidarXML() {
    var sXml = document.getElementById("hideDescripcion").value;
    sXml = window.btoa(sXml); //Convertimos a base 64
    var webNavegador = "";
    var isFirefox = typeof InstallTrigger !== 'undefined';
    var isIE = /*@cc_on!@*/false || !!document.documentMode;
    var isChrome = !!window.chrome && !!window.chrome.webstore;
    if (isFirefox) webNavegador = "firefox";
    if (isIE) webNavegador = "iexplorer";
    if (isChrome) webNavegador = "chrome";

    switch (webNavegador) {
        case "chrome":
        case "firefox":
            ValidarXMLExtension(sXml);
            break;
        case "iexplorer":
            sXml = $("#btnValidarXML").data("XML");
            sXml = window.btoa(sXml); //Convertimos a base 64
            ValidarXMLActiveX(sXml);
            break;
    }
}
function ValidarXMLModificado() {
    var sXml = document.getElementById("hideDescripcion").value.replace("sCampo1", "sCampo500");
    sXml = window.btoa(sXml); //Convertimos a base 64
    var webNavegador = "";
    var isFirefox = typeof InstallTrigger !== 'undefined';
    var isIE = /*@cc_on!@*/false || !!document.documentMode;
    var isChrome = !!window.chrome && !!window.chrome.webstore;
    if (isFirefox) webNavegador = "firefox";
    if (isIE) webNavegador = "iexplorer";
    if (isChrome) webNavegador = "chrome";

    switch (webNavegador) {
        case "chrome":
        case "firefox":
            ValidarXMLExtension(sXml);
            break;
        case "iexplorer":
            sXml = $("#btnValidarXML").data("XML");
            sXml = sXml.replace("sCampo1", "sCampo500");
            sXml = window.btoa(sXml); //Convertimos a base 64
            ValidarXMLActiveX(sXml);
            break;
    }
}


function FirmarActiveX(path_pdf_in, path_pdf_out, razon, ubicacion, imagen, coordenadas, certificado, webserviceURL, SolicitarCertificado) {
    try {
        var SignedData = document.getElementById("ActiveXFirma");
        var sRespuesta = SignedData.FirmarPdf(path_pdf_in, path_pdf_out, razon, ubicacion, imagen, coordenadas, certificado, webserviceURL, SolicitarCertificado);
        var res = sRespuesta.split(",");
        Respuesta(res[0], res[1]);
    } catch (ex) {
        alert("Por favor ingrese un token válido " + ex.message);
    }
}
function FirmarXMLActiveX(sXml) {
    try {
        var SignedData = document.getElementById("ActiveXFirma");
        var sRespuesta = SignedData.FirmarXML(sXml);
        var res = sRespuesta.split(",");
        $("#btnValidarXML").data("XML", res[2]);
        alert(res[0] +":" + res[1] + ", " + res[2]);
    } catch (ex) {
        alert("Por favor ingrese un token válido " + ex.message);
    }
}
function ValidarXMLActiveX(sXml) {
    try {       
        var SignedData = document.getElementById("ActiveXFirma");
        var sRespuesta = SignedData.ValidarXML(sXml);
        var res = sRespuesta.split(",");
        alert(res[0] + ":" + res[1]);
    } catch (ex) {
        alert("Por favor ingrese un token válido " + ex.message);
    }
}
function FirmarXMLExtencion(sXml) {
    var Envio = new Object;
    Envio.Xml = sXml;
    var evento = document.createEvent('CustomEvent');
    evento.initCustomEvent("addon-message-certificadoxml", true, true, Envio);
    document.documentElement.dispatchEvent(evento);
}
function ValidarXMLExtension(sXml) {
    var Envio = new Object;  
    Envio.Xml = sXml;
    var evento = document.createEvent('CustomEvent');
    evento.initCustomEvent("addon-message-validarxml", true, true, Envio);
    document.documentElement.dispatchEvent(evento);
}
function FirmarExtension(path_pdf_in, path_pdf_out, razon, ubicacion, imagen, coordenadas, certificado, webserviceURL, SolicitarCertificado) {

    var Envio = new Object;
    Envio.path_pdf_in = path_pdf_in;
    Envio.path_pdf_out = path_pdf_out;
    Envio.imagen = imagen;
    Envio.razon = razon;
    Envio.ubicacion = ubicacion;
    Envio.coordenadas = coordenadas;
    Envio.certificado = certificado;
    Envio.webservice = webserviceURL;
    Envio.SolicitarCertificado = SolicitarCertificado;

    var evento = document.createEvent('CustomEvent');
    evento.initCustomEvent("addon-message-firmae", true, true, Envio);
    document.documentElement.dispatchEvent(evento);
}
function FinAddOnExtension() {
    var Error = document.getElementById("hideError").value;
    var Descripcion = document.getElementById("hideDescripcion").value;
    Respuesta(Error, Descripcion);
}

function Respuesta(CodigoError, Descripcion) {
    alert("Codigo de Error: " + CodigoError + " : " + Descripcion);
}

function FirmarPdfP12() { 

    var path_pdf_in = "c://inetpub//wwwroot//FirmaExtensiones//Pdfs//1.pdf";
    var path_pdf_out = "c://inetpub//wwwroot//FirmaExtensiones//Pdfs//1_signed.pdf";
    var imagen = "c://inetpub//wwwroot//FirmaExtensiones//Pdfs//sello.jpg";  //null si no se requiere

    var razon = "razon"; //null si no se requiere
    var ubicacion = "ubicacion"; //null si no se requiere
    var coordenadas = "10,30,180,100,1"; //null si no se requiere (6 parametro hace overrride de mensaje predeterminado)
    var certificado = "0";
    var webserviceURL = "http://192.168.10.117/";
    var SerialCertificado = "‎71a25250d03648ff5daa14a5364dd6e5"; 
    //"‎3d1138ddd1fb761a587d436ab0ba6142";
    //"‎581f6ade7878fe8c56acdbd7a6775810"; 
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
        success: function (res) { FirmarPdfP12_cb(res) },
        error: ErrorInesperadoFirmado
    });
}

function FirmarPdfP12_cb(res) {
    var respuesta = res.d;
    alert("Error: " + respuesta.status + "  Descripcion: " + respuesta.descripcion);   
}

function ErrorInesperadoFirmado(res) {
    alert("Error al firmar");
}