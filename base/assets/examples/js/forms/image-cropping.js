/*!
 * remark (http://getbootstrapadmin.com/remark)
 * Copyright 2017 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 * MENENE
 */
(function(document, window, $) {

  'use strict';

  var Site = window.Site;

  $(document).ready(function($) {
    Site.run();
  });

  // Example Cropper Full
  // --------------------
  (function() {
    var $exampleFullCropper = $("#exampleFullCropper img"),
      $inputDataX = $("#inputDataX"),
      $inputDataY = $("#inputDataY"),
      $inputDataHeight = $("#inputDataHeight"),
      $inputDataWidth = $("#inputDataWidth");

    var options = {
      aspectRatio: 1 / 1,
      cropBoxResizable: false,
      responsive: true,
      crop: function() {
        var data = $(this).data('cropper').getCropBoxData();
        $inputDataX.val(Math.round(data.left));
        $inputDataY.val(Math.round(data.top));
        $inputDataHeight.val(Math.round(data.height));
        $inputDataWidth.val(Math.round(data.width));
      }
    };
    // set up cropper
    $exampleFullCropper.cropper(options);

    // set up method buttons
    $(document).on("click", "[data-cropper-method]", function() {
      var data = $(this).data(),
        method = $(this).data('cropper-method'),
        result;
      if (method) {
        result = $exampleFullCropper.cropper(method, data.option);
      }

      if (method === 'getCroppedCanvas') {
        $('#getDataURLModal').modal().find('.modal-body').html(result);
      }

    });

    $(document).on("click", "#btnSave", function (event) {
      event.preventDefault();

      var url      = new URL(document.URL);
      var filename = url.searchParams.get("id");
      var tipo     = url.pathname.substr(url.pathname.lastIndexOf('/') + 1)

      var normal = $exampleFullCropper.cropper('getCroppedCanvas', {
        width: 800,
        height: 800,
        fillColor: '#FFFFFF'
      }).toDataURL('image/jpeg');

      var thumb = $exampleFullCropper.cropper('getCroppedCanvas', {
        width: 200,
        height: 200,
        fillColor: '#FFFFFF'
      }).toDataURL('image/jpeg');

      $.ajax({
        type: 'POST',
        url: 'upload-pic.php',
        data: {
          normal: normal,
          thumb: thumb,
          filename: filename,
          tipo: tipo
        },
        success: function(output) {
          location.reload(true);
        }
      });
    });

    // deal wtih uploading
    var $inputImage = $("#inputImage");

    if (window.FileReader) {
      $inputImage.change(function() {
        var fileReader = new FileReader(),
          files = this.files,
          file;

        if (!files.length) {
          return;
        }

        file = files[0];

        if (/^image\/\w+$/.test(file.type)) {
          fileReader.readAsDataURL(file);
          fileReader.onload = function() {
            $exampleFullCropper.cropper("reset", true).cropper("replace", this.result);
            $inputImage.val("");
          };
        } else {
          alert('El archivo debe ser de tipo foto')
        }
      });
    } else {
      $inputImage.addClass("hide");
    }

    // set data
    $("#setCropperData").click(function() {
      var data = {
        left: parseInt($inputDataX.val()),
        top: parseInt($inputDataY.val()),
        width: parseInt($inputDataWidth.val()),
        height: parseInt($inputDataHeight.val())
      };
      $exampleFullCropper.cropper("setCropBoxData", data);
    });
  })();
})(document, window, jQuery);
