
$(document).ready(function () {

  var defaults = Plugin.getDefaults("dataTable");
  var options = $.extend(true, {}, defaults, {
   "aoColumnDefs": [{
     'bSortable': false,
     'aTargets': [-1]
   }],
    'pageLength': 10,
    'lengthMenu': [[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, 'Todos']],
    "order": [ 0, 'desc' ],
    "dom": '<"dt-panelmenu clearfix"Bfr>t<"dt-panelfooter clearfix"ip>',
    "buttons": ['pageLength', 'copy', 'csv', 'print'],
    "language": {
      "paginate": {
        "sPrevious": "Anterior",
        "sNext": "Siguiente"
    },
    "sSearchPlaceholder": "Busque aqui..",
    "sInfo": "Mostrando _START_ de _END_, total de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando 0 de 0, total de 0",
    "sEmptyTable": "No hay datos guardados",
     "buttons": {
          "copy": "Copiar a Portapapeles",
          "colvis": "Visibilidad",
          "collection": "Colección",
          "colvisRestore": "Restaurar visibilidad",
          "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
          "copySuccess": {
              "1": "Copiada 1 fila al portapapeles",
              "_": "Copiadas %d fila al portapapeles"
          },
          "copyTitle": "Copiar al portapapeles",
          "csv": "CSV",
          "excel": "Excel",
          "pageLength": {
              "-1": "Mostrar todas las filas",
              "_": "Mostrar %d filas"
          },
          "pdf": "PDF",
          "print": "Imprimir"
      },
  }
  //"url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
  // "url": change_lang
});

  $('#TableTools-arl-1').DataTable(options);
  $('#TableTools-arl-2').DataTable(options);

});
  

$.ajax({
  url: './consulta.php',
  dataType: 'json',
    
    success: function (data) {
      //console.log (data);
      // Se ejecuta cuando la solicitud AJAX es exitosa
      // 'data' contiene los resultados de la consulta en formato JSON

      // Recorre los resultados con un bucle forEach
      data.forEach(function (resultado) {
        //console.log (data);
        var url = resultado.url;
        var tiempo = resultado.tiempo_revision_pagina;
        var id = resultado.id;
        //console.log (url);

        // Realiza las acciones necesarias con la URL y el tiempo obtenidos
        console.log('URL:', url);
        console.log('Tiempo:', tiempo);
        console.log('ID:', id);


        // Aquí puedes realizar más operaciones con los datos obtenidos de la consulta

        verificarURL(url,tiempo,id);

        // Verifica la URL nuevamente después del tiempo especificado y actualiza la tarjeta correspondiente
        setInterval(function() {
          verificarURL(url,tiempo,id);
        }, minutosAMilisegudos(tiempo));


      
      });

    },
    error: function (jqXHR, textStatus, errorThrown) {
      // Se ejecuta cuando ocurre un error en la solicitud AJAX
      console.log('Error:', textStatus, errorThrown);
    }
  });



    function verificarURL(url,tiempo,id) {
      $.ajax({
        url: url,
        type: 'GET',
        //dataType: 'jsonp',

        success: function(response, textStatus, jqXHR) {
          console.log("aqui lo imprime", response ,textStatus, jqXHR);
          // La solicitud fue exitosa
          if (jqXHR.status === 200) {
            console.log('La URL', url, 'está arriba');
          } else {
            console.log('La URL', url, 'no está arriba');
          }
        },
        statusCode: {
          400: function error() {
            var divElement=$('#'+id);
            divElement.removeClass('bg-green-400');
            if (!divElement.hasClass('bg-red-400')) { // Verifica si el elemento no tiene la clase deseada
              divElement.addClass('bg-red-400'); // Agrega la clase al elemento
            }
            enviar_datos(400,id);
            //console.log('La URL', url, 'devolvió un código de estado 400');
            //$("id").addClass('bg-red-400');
          },
          403: function() {
            var divElement=$('#'+id);
            divElement.removeClass('bg-green-400');
            if (!divElement.hasClass('bg-red-400')) { // Verifica si el elemento no tiene la clase deseada
              divElement.addClass('bg-red-400'); // Agrega la clase al elemento
            }

            enviar_datos(403,id);
            //console.log('La URL', url, 'devolvió un código de estado 403');
            //$(cardElement).addClass('red');
          },
          404: function() {
            var divElement=$('#'+id);
            divElement.removeClass('bg-green-400');
            if (!divElement.hasClass('bg-red-400')) { // Verifica si el elemento no tiene la clase deseada
              divElement.addClass('bg-red-400'); // Agrega la clase al elemento
            }

            enviar_datos(404,id);
            

           // console.log('La URL', url, 'devolvió un código de estado 404');
            //$(cardElement).addClass('red');
          },
          500: function() {
            var divElement=$('#'+id);
            divElement.removeClass('bg-green-400');
            if (!divElement.hasClass('bg-red-400')) { // Verifica si el elemento no tiene la clase deseada
              divElement.addClass('bg-red-400'); // Agrega la clase al elemento
            }
            enviar_datos(500,id);
            //console.log('La URL', url, 'devolvió un código de estado 500');
            //$(cardElement).addClass('red');
          },
          503: function() {
            var divElement=$('#'+id);
            divElement.removeClass('bg-green-400');
            if (!divElement.hasClass('bg-red-400')) { // Verifica si el elemento no tiene la clase deseada
              divElement.addClass('bg-red-400'); // Agrega la clase al elemento
            }
            enviar_datos(503,id);
            //console.log('La URL', url, 'devolvió un código de estado 503');
          //  $(cardElement).addClass('red');
          },
          200: function() {
            var divElement=$('#'+id);
            divElement.removeClass('bg-red-400');
            if (!divElement.hasClass('bg-green-400')) { // Verifica si el elemento no tiene la clase deseada
              divElement.addClass('bg-green-400'); // Agrega la clase al elemento
            }
            enviar_datos(200,id);
            //console.log('La URL', url, 'devolvió un código de estado 503');
            //$(cardElement).addClass('green');
          },

        },


        error: function(jqXHR, textStatus, errorThrown) {
          // Ocurrió un error en la solicitud AJAX
          console.log('Error al acceder a la URL', url, ':', errorThrown);
        }
      });
    } 

    function minutosAMilisegudos(minutos) {
      let segundos=minutos * 60;
      let milisegundos=segundos * 1000;
      console.log("----minutosAMilisegundo", milisegundos)
      return milisegundos;
      
    }

    function enviar_datos(error,id) {
      var datos={
        error: error,
        idPagina: id
        //dataType: 'jsonp'
      };
      //console.log(datos);

      $.ajax({
        url: './bitacora.php',
        type: 'POST',
        data: datos,
         
        //success: function(response){
        //console.log(response);
        
        //},
        //error: function(xhr, status, error) {
        //console.log('Error:', error);   
              
        //}
        
      });
      
    }
