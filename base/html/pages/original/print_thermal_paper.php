<?php
ob_clean();
$dompdf = new DOMPDF();
$dompdf->set_option('default_font', 'Courier');

$customPaper = array(0,0,340,650);
//$dompdf->set_paper($customPaper);
$dompdf->set_option('enable_css_float',true);
//$dompdf->set_paper("A3", "portrait");

$html =' <html>
    <head><style>
        .table { display: table; width: 100%; border-collapse: collapse; }
        .table-row { display: table-row; }
        .table-cell { display: table-cell; border: 1px solid black; padding: 1em; }
    }
    span {  display: block;  }
    @page table {
      size: 340px 650px;
      margin: 0px;;
    }

    .table {
       page: table;
       page-break-after: always;
       font-size: 20px;
    }
    </style>
    </head>
    <body>
    <div class="table">
      <div class="table-row"><div class="table-cell" colspan="3" style="text-align: center"><img src="../../img/top-logo.png"></div></div>
        <div class="table-row">
          <div class="table-cell" ><span><b> Merchant: </b> '.$parceldetails['company'].' </span><span><b> Pick Addr: </b> '.$parceldetails['addr'].' </span><span><b> Mobile: </b> '.$parceldetails['mobile'].' </span></div>
           <div class="table-cell" style="padding: 0px">
           <div class="" >Delivery Date:</div><br>
           <div class="" style="border-bottom: 1px solid #000000"> '.$parceldetails['r_delivery_time'].' at '.$parceldetails['bytime'].'</div>

           <div class="">Agent:</div><br>
           <div class=""> '.$parceldetails['name'].' </div>
           </div>
        </div>
        <div class="table-row">
          <div class="table-cell" colspan="3" style="text-align: center"> <b style="font-size: larger">'.$ecr.'</b></div>
        </div>
        <div class="table-row">
           <div class="table-cell" colspan="1"><span><b>Customer Name:</b> '.$parceldetails['r_name'].'</span><span><b> Addr:</b> '.$parceldetails['r_address'].' </span><span><b> Mobile: </b> '.$parceldetails['r_mobile'].' </span></div>
           <div class="table-cell" style="padding: 0px">
              <div class="" style="border-bottom: 2px solid #000000; text-align: center"><b> '.$parceldetails['paymentmethod'].' </b></div>
              <div class="" style="text-align: center"><b> '.$parceldetails['product_price'].' BDT </b></div>
           </div>
         </div>
         <div class="table-row">
           <div class="table-cell"  style="text-align: center"> '.genarateQRCode($data).' </div>
            <div class="table-cell"  style="padding: 0px">
              <div class="" style="border-bottom: 2px solid #000000; text-align: center; height:63px"> Delivered </div>
              <div class="" style="text-align: center; min-height:63px"> Cancel </div>
           </div>
            <div class="table-cell" style="padding: 0px">
              <div class="" style="border-bottom: 2px solid #000000; text-align: center; height:63px">&#160;</div>
              <div class="" style="text-align: center; min-height:63px""></div>
           </div>
        </div>
        <div class="table-row">
          <div class="table-cell" colspan="3">
          <b style="margin-top:50px; margin-bottom:-10px; border-bottom: 1px solid #000000; font-size:10px; margin-left:10px">Agent signature</b>
          <b style="margin-top:50px; margin-bottom:-10px; border-bottom: 1px solid #000000; font-size:10px; margin-left:50px">Receiver signature</b></div>
        </div>
      </div>';
      $html .='<table class="table">
      <tr>
       <td colspan="3"><img src="../../img/top-logo.png"></td>
      </tr>
      <tr>
        <td rowspan="2" colspan="2"><span><b> Merchant: </b> '.$parceldetails['company'].' </span><span><b> Pick Addr: </b> '.$parceldetails['addr'].' </span><span><b> Mobile: </b> '.$parceldetails['mobile'].' </span></td>
        <td>D. Date<span>'.$parceldetails['r_delivery_time'].'</span></td>
       </tr>
       <tr>
        <td>Agent<span>'.$parceldetails['name'].'</span></td>
       </tr>
      <tr>
        <td colspan="3">'.$ecr.'</td>
      </tr>
        <tr>
        <td rowspan="2" colspan="2"><span><b>Customer Name:</b> '.$parceldetails['r_name'].'</span><span><b> Addr:</b> '.$parceldetails['r_address'].' </span><span><b> Mobile: </b> '.$parceldetails['r_mobile'].' </span></td>
        <td><b>'.$parceldetails['paymentmethod'].'</b></td>
      </tr>
      <tr>
         <td><b>'.$parceldetails['product_price'].' BDT</b></td>
      </tr>
      <tr>
        <td rowspan="2" colspan="1">'.genarateQRCode($data).'</td>
        <td>Delivered</td>
        <td></td>
      </tr>
      <tr>
         <td>Cancel</td>
         <td></td>
      </tr>
        <tr>
        <td colspan="3">&nbsp</td>
      </tr>
        <tr>
        <td colspan="3">Agent Signature Receiver Signature</td>
      </tr>
    </table>
    </body>
    </html>';
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("dompdf_out.pdf", array('Attachment' => 0));
<?>