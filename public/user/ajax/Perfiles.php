<?php

require_once('../../../core/core.php');
    
    $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';    

    //PAGINATION
    if($action == 'ajax'){

        $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
        $per_page = 25; //how much records you want to show
        $adjacents  = 4; //gap between pages after number of adjacents
        $offset = ($page - 1) * $per_page;
        //Count the total number of row in your table*/

        $numrows = Perfil::Perfiles_Totales();
        $numrows_f=$numrows[0];

        $total_pages = ceil($numrows_f/$per_page);

        $reload = './public/index/ManPerfil.php';

        $query = Perfil::Buscar_Perfiles($offset,$per_page);
   
        //var_dump($query);

        //var_dump($_ListaUsuario[$_SESSION['sesion_id']][5]);

        //loop through fetched datas

        if ($numrows>0){
            ?>
            
            <div class="table-responsive table_hover_select">
              <table class="table table-striped">
                <thead>
                    <tr class="info"> 
                        <td> <span><b>#</b></span> </td> 
                        <td> <span><b>PERFIL</b></span> </td> 
                        <td> <span><b>DESCRIPCIÓN</b></span> </td> 
                        <td> <span><b>ACCIONES</b></span> </td> 
                    </tr>
                </thead>
                <?php if ($query ==''){}else{?>
                <tbody>

                    <?php
                    foreach ($query as $key => $value) {

                        $list_id        = $value[0];
                        $list_dni       = $value[1];
                        $list_nombre    = $value[2];

                        
                        echo '<tr>';
                        echo '<td>',$value[0],'</td>';
                        echo '<td>',$value[1],'</td>';
                        echo '<td>',$value[2],'</td>';
                        echo '<td class="text-right">
                        <a href="#" onclick="" class="btn btn-accion" title="">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="#" class="btn btn-accion" title="" onclick="">
                            <i class="fa fa-trash"></i>
                        </a>
                        </td>';
                        echo '</tr>';
                        
                    }
                    ?>

                <tr>
                    <td colspan=6>
                        <span class="pull-right">
                             <?php echo paginate($reload, $page, $total_pages, $adjacents); ?> 
                        <span>
                    </td>
                </tr>
                </tbody>
                <?php } ?>
              </table>
            </div>
            <?php
        }else{
            echo 'No hay registros encontrados';
        }
    }
?>