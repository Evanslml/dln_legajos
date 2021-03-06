<?php

   require_once('../core.php');
   if (!isset($_SESSION['sesion_id'])){
    include('public/overall/nosesion.php');
   }
   else { 

    require_once 'PHPExcel.php';
    $objPHPExcel = new PHPExcel();

    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);
    date_default_timezone_set('America/Lima');

    $now = new DateTime();
    $h=$now->format('Y-m-d');

    $file='Reporte_01_'.$h.'.xls';
    $header='&L&BFecha de consulta: '.$h;
    $footer='&L&B@DirisLimaNorte - http://app1.dirislimanorte.gob.pe:84/legajos';

    $cbx_tipo_reporte = $_GET['cbx_tipo_reporte'];
    $cbx_tipo_nivel = $_GET['cbx_tipo_nivel'];
    $cbx_distrito = $_GET['cbx_distrito'];
    $cbx_establecimiento = $_GET['cbx_establecimiento'];
    $lbl_distrito = $_GET['lbl_distrito'];
    $lbl_establecimiento = $_GET['lbl_establecimiento'];

    $title = array('Nombres completos','Fecha nacimiento','Departamento','Provincia','Distrito','DNI','Nacionalidad',
    'Establecimiento','tipo contrato');

    switch ($cbx_tipo_nivel) {
        case '1':
            $lbl_nivel ='DIRIS L.N.';
            break;
        case '2':
            $lbl_nivel ='DISTRITO - '.$lbl_distrito;
            break;
        case '3':
            $lbl_nivel ='ESTABLECIMIENTO - '.$lbl_establecimiento;
            break;
    }

    $reporte_title = 'REPORTE DE PERSONAL SEGUN ESTABLECIMIENTO '. $lbl_nivel;
    $_Report01 = Reportes::Reporte_01($cbx_tipo_nivel,$cbx_establecimiento,$cbx_distrito);
    //var_dump($_Report01);
    /*Estilos*/
    $center = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );

    $titulo = array(
        'font'  => array(
            'bold'  => true,
            'color' => array('rgb' => '008080'),
            'size'  => 14,
            'name'  => 'Calibri'
        )
    ); 

    $cabecera = array(
        'font'  => array(
            'bold'  => true,
            'color' => array('rgb' => '008080'),
            'size'  => 11,
            'name'  => 'Calibri'
        ),
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );

    $body = array(
        'font'  => array(
            'bold'  => false,
            'color' => array('rgb' => '000000'),
            'size'  => 9,
            'name'  => 'Calibri'
        )
    );

    $borders_center = array(
      'borders' => array(
        'allborders' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
          'color' => array('rgb' => '008B8B'),
        )
      ),
      'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
       ),
      'font'  => array(
            'bold'  => false,
            'color' => array('rgb' => '000000'),
            'size'  => 9,
            'name'  => 'Calibri'
        )
    );    

    $borders_left = array(
      'borders' => array(
        'allborders' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
          'color' => array('rgb' => '008B8B'),
        )
      ),
      'font'  => array(
            'bold'  => false,
            'color' => array('rgb' => '000000'),
            'size'  => 9,
            'name'  => 'Calibri'
        )
    );

    /*Logo*/
    $objDrawing = new PHPExcel_Worksheet_Drawing();
    $objDrawing->setName('Logo');
    $objDrawing->setDescription('Logo');
    $objDrawing->setPath('../../view/bootstrap-default/img/logo.png');
    $objDrawing->setCoordinates('A1');
    // set resize to false first
    //$objDrawing->setResizeProportional(false);
    $objDrawing->setOffsetX(10);
    $objDrawing->setOffsetY(0);
    // set width later
    $objDrawing->setWidthAndHeight(320,40);
    $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

    $objPHPExcel->getActiveSheet()->setCellValue('A6', $title[0]);
    $objPHPExcel->getActiveSheet()->getStyle('A6')->applyFromArray($borders_center);
    $objPHPExcel->getActiveSheet()->setCellValue('B6', $title[1]);
    $objPHPExcel->getActiveSheet()->getStyle('B6')->applyFromArray($borders_center);
    $objPHPExcel->getActiveSheet()->setCellValue('C6', $title[2]);
    $objPHPExcel->getActiveSheet()->getStyle('C6')->applyFromArray($borders_center);
    $objPHPExcel->getActiveSheet()->setCellValue('D6', $title[3]);
    $objPHPExcel->getActiveSheet()->getStyle('D6')->applyFromArray($borders_center);
    $objPHPExcel->getActiveSheet()->setCellValue('E6', $title[4]);
    $objPHPExcel->getActiveSheet()->getStyle('E6')->applyFromArray($borders_center);
    $objPHPExcel->getActiveSheet()->setCellValue('F6', $title[5]);
    $objPHPExcel->getActiveSheet()->getStyle('F6')->applyFromArray($borders_center);
    $objPHPExcel->getActiveSheet()->setCellValue('G6', $title[6]);
    $objPHPExcel->getActiveSheet()->getStyle('G6')->applyFromArray($borders_center);
    $objPHPExcel->getActiveSheet()->setCellValue('H6', $title[7]);
    $objPHPExcel->getActiveSheet()->getStyle('H6')->applyFromArray($borders_center);
    $objPHPExcel->getActiveSheet()->setCellValue('I6', $title[8]);
    $objPHPExcel->getActiveSheet()->getStyle('I6')->applyFromArray($borders_center);


    if(!empty($_Report01)){

        foreach ($_Report01 as $key => $value) {
        $n=$key;
        $i=$key+7;
        $celdaA='A'.$i;
        $celdaB='B'.$i;
        $celdaC='C'.$i;
        $celdaD='D'.$i;
        $celdaE='E'.$i;
        $celdaF='F'.$i;
        $celdaG='G'.$i;
        $celdaH='H'.$i;
        $celdaI='I'.$i;

        $objPHPExcel->getActiveSheet()->setCellValue($celdaA, $_Report01[$n][0]);
        $objPHPExcel->getActiveSheet()->setCellValue($celdaB, $_Report01[$n][1]);
        $objPHPExcel->getActiveSheet()->setCellValue($celdaC, $_Report01[$n][2]);
        $objPHPExcel->getActiveSheet()->setCellValue($celdaD, $_Report01[$n][3]);
        $objPHPExcel->getActiveSheet()->setCellValue($celdaE, $_Report01[$n][4]);
        $objPHPExcel->getActiveSheet()->setCellValue($celdaF, $_Report01[$n][5]);
        $objPHPExcel->getActiveSheet()->setCellValue($celdaG, $_Report01[$n][6]);
        $objPHPExcel->getActiveSheet()->setCellValue($celdaH, $_Report01[$n][18]);
        $objPHPExcel->getActiveSheet()->setCellValue($celdaI, $_Report01[$n][19]);

        $objPHPExcel->getActiveSheet()->getStyle($celdaA)->applyFromArray($borders_left);
        $objPHPExcel->getActiveSheet()->getStyle($celdaB)->applyFromArray($borders_left);
        $objPHPExcel->getActiveSheet()->getStyle($celdaC)->applyFromArray($borders_left);
        $objPHPExcel->getActiveSheet()->getStyle($celdaD)->applyFromArray($borders_left);
        $objPHPExcel->getActiveSheet()->getStyle($celdaE)->applyFromArray($borders_left);
        $objPHPExcel->getActiveSheet()->getStyle($celdaF)->applyFromArray($borders_left);
        $objPHPExcel->getActiveSheet()->getStyle($celdaG)->applyFromArray($borders_left);
        $objPHPExcel->getActiveSheet()->getStyle($celdaH)->applyFromArray($borders_left);
        $objPHPExcel->getActiveSheet()->getStyle($celdaI)->applyFromArray($borders_left);
        }
    }else{
        $objPHPExcel->getActiveSheet()->setCellValue('A7', 'No se encontraron resultados para la bùsqueda');
    }


    //7,5 X PX
    //https://stackoverflow.com/questions/29026645/how-to-use-print-ready-functionality-in-phpexcel-library
    $objPHPExcel->getActiveSheet() ->setTitle('Reportes');
    //
    $objPHPExcel->getDefaultStyle()->applyFromArray($body);
    $objPHPExcel->getActiveSheet()->getStyle("A4:I4")->applyFromArray($center);
    $objPHPExcel->getActiveSheet()->getStyle("A4:I4")->applyFromArray($titulo);
    $objPHPExcel->getActiveSheet()->getStyle("A6:I6")->applyFromArray($cabecera);

    $objPHPExcel->getActiveSheet()->setCellValue('A4', $reporte_title);
//    $objPHPExcel->getActiveSheet()->setCellValue('D1', $desde);
//    $objPHPExcel->getActiveSheet()->setCellValue('F1', $date1);
//    $objPHPExcel->getActiveSheet()->setCellValue('D2', $hasta);
//    $objPHPExcel->getActiveSheet()->setCellValue('F2', $date2);    
//    $objPHPExcel->getActiveSheet()->setCellValue('D3', $lbl_nivel);
//    $objPHPExcel->getActiveSheet()->setCellValue('F3', $return_nivel);
//    $objPHPExcel->setActiveSheetIndex(0)->mergeCellS('A4:F4');
//    $objPHPExcel->setActiveSheetIndex(0)->mergeCellS('D1:E1');
//    $objPHPExcel->setActiveSheetIndex(0)->mergeCellS('D2:E2');
//    $objPHPExcel->setActiveSheetIndex(0)->mergeCellS('D3:E3');
//    $objPHPExcel->getActiveSheet()->getStyle("D1:F1")->applyFromArray($center);
//    $objPHPExcel->getActiveSheet()->getStyle("D2:F2")->applyFromArray($center);
//    $objPHPExcel->getActiveSheet()->getStyle("D3:F3")->applyFromArray($center);

    $objPHPExcel->setActiveSheetIndex(0)->mergeCellS('A4:G4');
    //Dimension
    $objPHPExcel->getActiveSheet()->getColumnDimension("A")->setWidth(40); //252
    $objPHPExcel->getActiveSheet()->getColumnDimension("B")->setWidth(30); //70
    $objPHPExcel->getActiveSheet()->getColumnDimension("C")->setWidth(30); //210
    $objPHPExcel->getActiveSheet()->getColumnDimension("D")->setWidth(30); //70
    $objPHPExcel->getActiveSheet()->getColumnDimension("E")->setWidth(30); //70
    $objPHPExcel->getActiveSheet()->getColumnDimension("F")->setWidth(10); //105
    $objPHPExcel->getActiveSheet()->getColumnDimension("G")->setWidth(20); //105
    $objPHPExcel->getActiveSheet()->getColumnDimension("H")->setWidth(40); //105
    $objPHPExcel->getActiveSheet()->getColumnDimension("I")->setWidth(40); //105
    //Orientation and Paper Size:
    $objPHPExcel->getActiveSheet() ->getPageSetup() ->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT); //PORTRAIT _ LANDSCAPE
    $objPHPExcel->getActiveSheet() ->getPageSetup() ->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
    //Page margins:
    $objPHPExcel->getActiveSheet() ->getPageMargins()->setTop(1); 
    $objPHPExcel->getActiveSheet() ->getPageMargins()->setRight(0.75);
    $objPHPExcel->getActiveSheet() ->getPageMargins()->setLeft(0.75); 
    $objPHPExcel->getActiveSheet() ->getPageMargins()->setBottom(1);
    //Headers and Footers:
    $objPHPExcel->getActiveSheet() ->getHeaderFooter() ->setOddHeader($header);
    $objPHPExcel->getActiveSheet() ->getHeaderFooter() ->setOddFooter($footer);
    //Printer page breaks
    //$objPHPExcel->getActiveSheet() ->setBreak( 'A5' , PHPExcel_Worksheet::BREAK_ROW );  //Salto
    //Showing grid lines:
    $objPHPExcel->getActiveSheet() ->setShowGridlines(true);
    //Setting rows/columns to repeat at the top/left of each page
    $objPHPExcel->getActiveSheet() ->getPageSetup() ->setRowsToRepeatAtTopByStartAndEnd(1, 5);
    //Setting the print area:
    //$objPHPExcel->getActiveSheet() ->getPageSetup() ->setPrintArea('A1:E5,G4:M20'); //Cabecera creada repeticion 
    $objPHPExcel->getProperties()->setCreator("IJCP")
                         ->setLastModifiedBy("IJCP")
                         ->setTitle($reporte_title)
                         ->setSubject($reporte_title)
                         ->setDescription("Reporte desde la aplicación Recaudacion DirisLimaNorte")
                         ->setKeywords("office 2007 openxml php")
                         ->setCategory("Reportes");
/*    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');*/
/*    header('Content-Disposition: attachment;filename="'.$file.'"');*/
/*    header('Cache-Control: max-age=0');*/
/*    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');*/
/*    $objWriter->save('php://output');*/

// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$file.'"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
}