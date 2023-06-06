<?php


include("header.php");

require_once "conexion.php";
require_once "funciones.php";

$obtener_paginas=obtener_paginas();



?>

 


<body class="animsition">

  <link rel="stylesheet" href="../../../global/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../../global/css/bootstrap-extend.min.css">
  <link rel="stylesheet" href="../../assets/css/site.min.css">
  <!-- Plugins -->
  <link rel="stylesheet" href="../../../global/vendor/animsition/animsition.css">
  <link rel="stylesheet" href="../../../global/vendor/asscrollable/asScrollable.css">
  <link rel="stylesheet" href="../../../global/vendor/switchery/switchery.css">
  <link rel="stylesheet" href="../../../global/vendor/intro-js/introjs.css">
  <link rel="stylesheet" href="../../../global/vendor/slidepanel/slidePanel.css">
  <link rel="stylesheet" href="../../../global/vendor/flag-icon-css/flag-icon.css">
  <link rel="stylesheet" href="../../../global/vendor/waves/waves.css">
  <link rel="stylesheet" href="../../../global/vendor/chartist/chartist.css">
  <link rel="stylesheet" href="../../assets/examples/css/widgets/chart.css">
  <!-- Fonts -->
  <link rel="stylesheet" href="../../../global/fonts/material-design/material-design.min.css">
  <link rel="stylesheet" href="../../../global/fonts/brand-icons/brand-icons.min.css">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>


	<?php include("navbar.php"); ?>
    <div class="page">
    <div class="page-header">
      <h1 class="page-title">Monitoreo</h1>
      
      <div class="page-header-actions">
        
      </div>
    </div>
    <div class="page-content container-fluid">
      <div class="row"  >
        
      <?php
                                        
        foreach($obtener_paginas as $paginasweb){ ?>
        <div class="col-xxl-3 col-lg-4 col-md-12">
          
          <div class="card card-shadow" id="chartBarPie">
            <div class="card-block p-0">
              <div class="bg-green-400 white p-20" name="div_color" id="<?php echo $paginasweb['id'];?>">
                <div style="text-align:center;" class="font-size-30 clearfix">
                    
                  <?php echo $paginasweb['nombre'];?>
                  
                </div>
                <div style="text-align:center;" class="font-size-15 clearfix">
                    
                  <?php echo $paginasweb['url'];?>
                  
                </div>
                
                </div>
              </div>
            </div>
         
        
        </div>
        <?php } ?>



          
          
            
        </div>

    
	
    
	


      </form>
	<!-- End Page -->
	<!-- Footer -->
	<?php //include("footer.php"); ?>

	
	<!-- End Footer -->
	<!-- Script -->
	<?php include("script.php"); ?>
	<script type="text/javascript">
        



		

		
				

		

	</script>
	<!-- End Script -->
 
  <script src="./scripts_arl.js"></script>
  
</body>

</html>