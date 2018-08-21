<?php

require_once('../../../core/core.php');
    
    $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';    

    //PAGINATION
    if($action == 'ajax'){
  
        $cbx_busqueda =   $_REQUEST['cbx_busqueda'];
        $txt_datos    =   $_REQUEST['txt_datos'];

        $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
        $per_page = 2; //how much records you want to show
        $adjacents  = 4; //gap between pages after number of adjacents
        $offset = ($page - 1) * $per_page;
        //Count the total number of row in your table*/

        $numrows = Persona::Legajos_Totales($cbx_busqueda,$txt_datos);
        $numrows_f=$numrows[0];

        $total_pages = ceil($numrows_f/$per_page);

        $reload = './public/index/BandejaEntrada.php';
        $query = Persona::Buscar_Legajos($cbx_busqueda,$txt_datos,$offset,$per_page);
        var_dump($cbx_busqueda);
        var_dump($txt_datos);
        var_dump($offset);
        var_dump($per_page);
        var_dump($query);
        //var_dump($_ListaUsuario[$_SESSION['sesion_id']][5]);

        //loop through fetched data

/*        if ($numrows>0){*/
            ?>
<!--  -->
<!--             <div class="table-responsive table_hover_select"> -->
<!--               <table class="table table-striped"> -->
<!--                 <thead> -->
<!--                     <tr class="info">  -->
<!--                         <td> <span><b>#</b></span> </td>  -->
<!--                         <td> <span><b>DNI</b></span> </td>  -->
<!--                         <td> <span><b>NOMBRE COMPLETO</b></span> </td>  -->
<!--                         <td> <span><b>UBICACIÓN FISICA</b></span> </td>  -->
<!--                         <td> <span><b>FECHA REGISTRO</b></span> </td>  -->
<!--                         <td> <span><b>ACCIONES</b></span> </td>  -->
<!--                     </tr> -->
<!--                 </thead> -->
<!--                 <tbody> -->
<!--  -->
                    <?php
/*                    foreach ($query as $key => $value) {*/
/**/
/*                        $list_id        = $value[0];*/
/*                        $list_dni       = $value[1];*/
/*                        $list_nombre    = $value[2];*/
/*                        $list_ubicacion = $value[3];*/
/*                        $list_fecha     = $value[4];*/
/*                        */
/*                        echo '<tr>';*/
/*                        echo '<td>',$value[0],'</td>';*/
/*                        echo '<td>',$value[1],'</td>';*/
/*                        echo '<td>',$value[2],'</td>';*/
/*                        echo '<td>',$value[3],'</td>';*/
/*                        echo '<td>',$value[4],'</td>';*/
/*                        echo  '</tr>';*/
/*                        */
/*                    }*/
                    ?>
<!--  -->
<!--                 <tr style="background: #fff"> -->
<!--                     <td colspan=9> -->
<!--                         <span class="pull-right"> -->
<!--                             <?php echo paginate($reload, $page, $total_pages, $adjacents); ?> -->
<!--                         <span> -->
<!--                     </td> -->
<!--                 </tr> -->
<!--                 </tbody> -->
<!--               </table> -->
<!--             </div> -->
            <?php
/*        }*/
    }
?>