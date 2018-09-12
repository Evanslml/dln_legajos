<?php

	require_once('../../core.php');

   if (!isset($_SESSION['sesion_id'])){
    include('public/overall/nosesion.php');
   }
   else { 

    $dni = base64_decode($_GET['d']);
    //$dni = $_GET['d'];
    $query01 = Reportes::Reporte_Escalafon_01($dni);
    $query02 = Reportes::Busqueda_Foto($dni);
    
    

	require_once(dirname(__FILE__).'/../html2pdf.class.php');

    // get the HTML
    ob_start();
    include(dirname('__FILE__').'/res/body_report_01.php');
    $content = ob_get_clean();


    try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
        $html2pdf->Output('Escalafon.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }


  } ?> <!--Else-->