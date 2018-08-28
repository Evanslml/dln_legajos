<style type="text/css">

table { vertical-align: top; }
tr    { vertical-align: top; font-size: 9px}
td    { vertical-align: top; }
.midnight-blue{
	background:#2c3e50;
	padding: 4px 4px 4px;
	color:white;
	font-weight:bold;
	font-size:12px;
}
.silver{
	background:white;
	padding: 3px 4px 3px;
}
.clouds{
	background:#ecf0f1;
	padding: 3px 4px 3px;
}
.border-top{
	border-top: solid 1px #bdc3c7;
}
.border-left{
	border-left: solid 1px #bdc3c7;
}
.border-right{
	border-right: solid 1px #bdc3c7;
}
.border-bottom{
	border-bottom: solid 1px #bdc3c7;
}
table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
}
.tbl_total td, .tbl_detalle td {border-bottom: 1px solid #000; border-right: 1px solid #000; }
.tbl_total, .tbl_detalle {border-top: 1px solid #000; border-left: 1px solid #000; }

.tbl_detalle td, .tbl_total td{padding: 4px;}
.tbl_detalle h4 {font-size: 12px;}
</style>

<page backtop="5mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
        <page_footer>
        <table class="page_footer">
            <tr>

                <td style="width: 50%; text-align: left">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
                <td style="width: 50%; text-align: right">
                    &copy; <?php echo "DirisLimaNorte "; echo  $anio=date('Y'); ?>
                </td>
            </tr>
        </table>
    </page_footer>
	<?php include("encabezado_01.php");?>
    <br>
    

	
    <table class="tbl_detalle" cellspacing="0" style="width: 100%; text-align: left; font-size: 12pt;">
		


			<?php 
		if (!empty($query01)){

        ?>
        <tr><!-------------------------------------------------------------------------------------------->
          <td style="width: 80%" colspan="4">
            <span>NOMBRES COMPLETOS</span>
            <h4><?php echo $query01[0][0];?></h4>
          </td>

          <?php
          if (!empty($query02)){
            $MADJ_URL=$query02[0][3];
            ?>
              <td rowspan="3" style="width: 20%;height: 150px">
                <img style="width: 100%;" src="<?php echo URL_WEB?>public/user/ajax/includes/files/<?php echo $dni;?>/<?php echo $MADJ_URL;?>" alt="">
              </td>
            <?php
          }else{
            ?>
              <td rowspan="3" style="width: 20%;height: 150px"><img style="width: 100%" src="<?php echo URL_WEB?>view/bootstrap-default/img/default_user.png" alt=""></td>
            <?php
          }
          ?>
        </tr>
        <tr><!-------------------------------------------------------------------------------------------->
          <td style="width: 20%">
            <span>FECHA NAC.</span>
            <h4><?php echo date_format($query01[0][1],'d-m-Y');?></h4>
          </td>
          <td style="width: 20%">
            <span>DEPARTAMENTO</span>
            <h4><?php echo $query01[0][2];?></h4>
          </td>
          <td style="width: 20%">
            <span>PROVINCIA</span>
            <h4><?php echo $query01[0][3];?></h4>
          </td>
          <td style="width: 20%">
            <span>DISTRITO</span>
            <h4><?php echo $query01[0][4];?></h4>
          </td>
        </tr>
        <tr><!-------------------------------------------------------------------------------------------->
          <td style="width: 20%">
            <span>DNI</span>
            <h4><?php echo $query01[0][5];?></h4>
          </td>
          <td style="width: 20%">
            <span>NACIONALIDAD</span>
            <h4><?php echo $query01[0][6];?></h4>
          </td>
          <td style="width: 20%">
            <span>SEXO</span>
            <h4><?php echo $query01[0][7];?></h4>
          </td>
          <td style="width: 20%">
            <span>ESTADO CIVIL</span>
            <h4><?php echo $query01[0][8];?></h4>
          </td>
        </tr>
        <tr><!-------------------------------------------------------------------------------------------->
          <td style="width: 20%">
            <span>GRADO DE INSTRUCCIÓN</span>
            <h4><?php echo $query01[0][9];?></h4>
          </td>
          <td style="width: 40%" colspan="2">
            <span>PROFESIÓN</span>
            <h4><?php echo $query01[0][10];?></h4>
          </td>
          <td style="width: 40%" colspan="2">
            <span>ESPECIALIDAD</span>
            <h4><?php echo $query01[0][11];?></h4>
          </td>
        </tr>
        <tr><!-------------------------------------------------------------------------------------------->
          <td style="width: 20%">
            <span>MONTO</span>
            <h4><?php echo $query01[0][12];?></h4>
          </td>
          <td style="width: 20%">
            <span>CARGO</span>
            <h4><?php echo $query01[0][13];?></h4>
          </td>
          <td style="width: 20%">
            <span>REGIMEN DE PENSIONES</span>
            <h4><?php echo $query01[0][14];?></h4>
          </td>
          <td style="width: 20%">
            <span>REGIMEN LABORAL</span>
            <h4><?php echo $query01[0][15];?></h4>
          </td>
          <td style="width: 20%">
            <span>NIVEL REMUNERATIVO</span>
            <h4><?php echo $query01[0][16];?></h4>
          </td>          
        </tr>
        <tr><!-------------------------------------------------------------------------------------------->
          <td style="width: 20%">
            <span>FECHA REGIMEN</span>
            <h4><?php echo date_format($query01[0][17],'d-m-Y');?></h4>
          </td>  
          <td style="width: 80%" colspan="4">
            <span>ESTABLECIMIENTO</span>
            <h4><?php echo $query01[0][18];?></h4>
          </td>     
        </tr>
        <tr><!-------------------------------------------------------------------------------------------->
          <td style="width: 60%" colspan="3">
            <span>GRUPO OCUPACIONAL</span>
            <h4><?php echo $query01[0][19];?></h4>
          </td>
          <td style="width: 20%">
            <span>NUMERO DE UBICACION</span>
            <h4><?php echo $query01[0][20];?></h4>
          </td>     
          <td style="width: 20%">
            <span>FECHA DE INGRESO</span>
            <h4><?php echo date_format($query01[0][21],'d-m-Y');?></h4>
          </td>     
        </tr>
        <tr><!-------------------------------------------------------------------------------------------->
          <td style="width: 20%">
            <span>NÚMERO DE CONTRATO</span>
            <h4><?php echo $query01[0][22];?></h4>
          </td>
          <td style="width: 20%">
            <span>NÚMERO DE RUC</span>
            <h4><?php echo $query01[0][23];?></h4>
          </td>     
          <td style="width: 20%">
            <span>NÚMERO DE CELULAR</span>
            <h4><?php echo $query01[0][24];?></h4>
          </td>     
        </tr>

        <?php
        }else{
        	echo '<tr><td colspan="6"><p>No se encontraron resultados en la busqueda</p></td></tr>';
        }
			?>
    </table>

</page>