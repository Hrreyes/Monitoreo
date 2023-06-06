
  
 <!-- Core  -->
  <script src="../../../global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
  <script src="../../../global/vendor/jquery/jquery.js"></script>
  <script src="../../../global/vendor/tinymce/tinymce-jquery.min.js" referrerpolicy="origin"></script>
  <script src="https://cdn.tiny.cloud/1/v7372di7ecvgaujm2bq0ke0ci42x8nokx38xrd2qry4tcm1q/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="../../../global/vendor/tether/tether.js"></script>
  <script src="../../../global/vendor/bootstrap/bootstrap.js"></script>
  <script src="../../../global/vendor/animsition/animsition.js"></script>
  <script src="../../../global/vendor/mousewheel/jquery.mousewheel.js"></script>
  <script src="../../../global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
  <script src="../../../global/vendor/asscrollable/jquery-asScrollable.js"></script>
  <script src="../../../global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
  <script src="../../../global/vendor/waves/waves.js"></script>

  <!-- Plugins -->
  <script src="../../../global/vendor/switchery/switchery.min.js"></script>
  <script src="../../../global/vendor/intro-js/intro.js"></script>
  <script src="../../../global/vendor/screenfull/screenfull.js"></script>
  <script src="../../../global/vendor/slidepanel/jquery-slidePanel.js"></script>
  <script src="../../../global/vendor/formatter/jquery.formatter.js"></script>
  <script src="../../../global/vendor/formvalidation/formValidation.min.js"></script>
  <script src="../../../global/vendor/formvalidation/framework/bootstrap4.min.js"></script>  
  <script src="../../../global/vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script>
  <script src="../../../global/vendor/bootstrap-datepicker/bootstrap-datepicker.es.min.js"></script>  
  <script src="../../../global/vendor/datatables.net/jquery.dataTables.js"></script>
  <script src="../../../global/vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../../../global/vendor/datatables.net-fixedheader/dataTables.fixedHeader.js"></script>
  <script src="../../../global/vendor/datatables.net-fixedcolumns/dataTables.fixedColumns.js"></script>
  <script src="../../../global/vendor/datatables.net-rowgroup/dataTables.rowGroup.js"></script>
  <script src="../../../global/vendor/datatables.net-scroller/dataTables.scroller.js"></script>
  <script src="../../../global/vendor/datatables.net-select-bs4/dataTables.select.js"></script>
  <script src="../../../global/vendor/datatables.net-responsive/dataTables.responsive.js"></script>
  <script src="../../../global/vendor/datatables.net-responsive-bs4/responsive.bootstrap4.js"></script>
  <script src="../../../global/vendor/datatables.net-buttons/dataTables.buttons.js"></script>
  <script src="../../../global/vendor/datatables.net-buttons/buttons.html5.js"></script>
  <script src="../../../global/vendor/datatables.net-buttons/buttons.flash.js"></script>
  <script src="../../../global/vendor/datatables.net-buttons/buttons.print.js"></script>
  <script src="../../../global/vendor/datatables.net-buttons/buttons.colVis.js"></script>
  <script src="../../../global/vendor/datatables.net-buttons-bs4/buttons.bootstrap4.js"></script>
  <script src="../../../global/vendor/asrange/jquery-asRange.min.js"></script>
  <script src="../../../global/vendor/bootbox/bootbox.js"></script>
  <script src="../../../global/vendor/toolbar/jquery.toolbar.js"></script>
  <script src="../../../global/vendor/jt-timepicker/jquery.timepicker.min.js"></script>
  
  <!-- Scripts -->
  <script src="../../../global/js/State.js"></script>
  <script src="../../../global/js/Component.js"></script>
  <script src="../../../global/js/Plugin.js"></script>
  <script src="../../../global/js/Base.js"></script>
  <script src="../../../global/js/Config.js"></script>
  <script src="../../assets/js/Section/Menubar.js"></script>
  <script src="../../assets/js/Section/GridMenu.js"></script>
  <script src="../../assets/js/Section/Sidebar.js"></script>
  <script src="../../assets/js/Section/PageAside.js"></script>
  <script src="../../assets/js/Plugin/menu.js"></script>
  <script src="../../../global/js/config/colors.js"></script>
  <script src="../../assets/js/config/tour.js"></script>
  <script>
  Config.set('assets', '../../assets');
  </script>

  <!-- Page -->
  <script src="../../assets/js/Site.js"></script>
  <script src="../../../global/js/Plugin/asscrollable.js"></script>
  <script src="../../../global/js/Plugin/slidepanel.js"></script>
  <script src="../../../global/js/Plugin/switchery.js"></script>
  <script src="../../../global/js/Plugin/responsive-tabs.js"></script>
  <script src="../../../global/js/Plugin/closeable-tabs.js"></script>
  <script src="../../../global/js/Plugin/tabs.js"></script>
  <script src="../../../global/js/Plugin/input-group-file.js"></script>
  <script src="../../assets/examples/js/forms/wizard.js"></script>
  <script src="../../../global/js/Plugin/formatter.js"></script>
  <script src="../../assets/examples/js/forms/validation.js"></script>
  <script src="../../assets/examples/js/forms/advanced.js"></script>
  <script src="../../../global/js/Plugin/bootstrap-datepicker.js"></script>
  <script src="../../../global/js/Plugin/datatables.js"></script>
  <script src="../../assets/examples/js/tables/datatable.js"></script>
  <script src="../../assets/examples/js/uikit/icon.js"></script>
  <script src="../../../global/js/Plugin/toolbar.js"></script>
  <script src="../../assets/examples/js/uikit/tooltip-popover.js"></script>
  <script src="../../../global/js/Plugin/jt-timepicker.js"></script>
  <script src="../../../global/vendor/select2/select2.min.js"></script>
  <script src="../../../global/js/Plugin/select2.js"></script>
  <script src="../../../global/vendor/select2/select2.full.min.js"></script>
  <script src="./plugins/multiSelect/dist/js/BsMultiSelect.bs4.min.js"></script>
<!-- scripts ARL -->
<script src="js/scripts_arl.js"></script>

  <script>
    $(window).load(function() {
      $('#modal').remove();
    });

    function setTwoNumberDecimal(event) {
      this.value = parseFloat(this.value).toFixed(2);
    }
    
    $('#checkbox_vencimiento').on('change', function() {
      var checked = this.checked;
      
      if(checked){
        $('#div_vencimiento_date').hide();
      }else{
        $('#div_vencimiento_date').show();
      }
    });

    $(document).ready(function(){

      $('.float-number').keypress(function(event) {
				if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
						event.preventDefault();
				}
			});
      
      $("#gastos_iniciales_bien").val(function(i, v) {
        if(v){
          return parseFloat(v).toFixed(2).replace('%','') + '%';
        }else{
          return '%';
        }
        
      });

      $("input[name='gastos_iniciales_bien']").on('input', function() {
        $(this).val(function(i, v) {
        return v.replace('%','') + '%';  });
      });

      $("#renta_bien").val(function(i, v) {
        if(v){
          return parseFloat(v).toFixed(2).replace('%','') + '%';
        }else{
          return '%';
        }
      });
      
      $("input[name='renta_bien']").on('input', function() {
        $(this).val(function(i, v) {
        return v.replace('%','') + '%';  });
      });

      $("#tir_bien").val(function(i, v) {
        if(v){
          return parseFloat(v).toFixed(2).replace('%','') + '%';
        }else{
          return '%';
        }
      });
      
      $("input[name='tir_bien']").on('input', function() {
        $(this).val(function(i, v) {
        return v.replace('%','') + '%';  });
      });

      $("#opcion_compra_bien").val(function(i, v) {
        if(v){
          return parseFloat(v).toFixed(2).replace('%','') + '%';
        }else{
          return '%';
        }
        
      });
      
      $("input[name='opcion_compra_bien']").on('input', function() {
        $(this).val(function(i, v) {
        return v.replace('%','') + '%';  });
      });

      if (window.Select2 !== undefined) {
        alert('no existe');
      }

      $('textarea#tiny').tinymce({
        height: 200,
        menubar: false,
        plugins: [
            'advlist','autolink','lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
            'fullscreen','insertdatetime','media','table','help','wordcount'
        ],
        branding: false,
        toolbar: 'undo redo | bold italic backcolor | alignleft aligncenter alignright alignjustify  | removeformat'
      });
      
      $(".date").datepicker({
        format: "dd/mm/yyyy",
      });
    });
  </script>
  <?php include("redirect.php"); ?>