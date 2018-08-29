<?php

    require_once('../../../core/core.php');
    $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';

    switch ($action) {
        case 'update':

            if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
                //estado_servidor('Error! Metodo de ingreso invalido!');
                echo 'Error! Metodo de ingreso invalido!';
            }else{

                $data = json_decode($_POST['data1']);
                foreach($data  as $key=>$val){
                    switch ($key) {
                        case '0': $MUSU_NOMBRES=$val;break;
                        case '1': $MUSU_APELLIDO_PAT=$val;break;
                        case '2': $MUSU_APELLIDO_MAT=$val;break;
                        case '3': $MUSU_DNI=$val;break;
                        case '4': $MUSU_CORREO=$val;break;
                        case '5': $MUSU_PASSWORD=$val;break;
                    }
                }

                $MUSU_PASSWORD=password_hash($MUSU_PASSWORD, PASSWORD_DEFAULT);

                $usuario1 = new Usuario(
                    $MUSU_CORREO,
                    $MUSU_PASSWORD,
                    $MUSU_APELLIDO_PAT,
                    $MUSU_APELLIDO_MAT,
                    $MUSU_NOMBRES,
                    '',
                    '',
                    '',
                    $MUSU_CORREO,
                    $MUSU_DNI,
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    ''
                );

                $usuario1->Actualizar();

            }//ELSE
            break;
        
        case 'ajax':

                $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
                $per_page = 25; //how much records you want to show
                $adjacents  = 4; //gap between pages after number of adjacents
                $offset = ($page - 1) * $per_page;
                //Count the total number of row in your table*/

                $numrows = Usuario::Usuarios_Totales();
                $numrows_f=$numrows[0];

                $total_pages = ceil($numrows_f/$per_page);

                $reload = './public/index/ManUsuarios.php';


                $query = Usuario::Buscar_Usuarios($offset,$per_page);
                //var_dump($query);
                if ($numrows>0){
                    ?>
                    
                    <div class="table-responsive table_hover_select">
                      <table class="table table-striped">
                        <thead>
                            <tr class="info"> 
                                <td> <span><b>#</b></span> </td> 
                                <td> <span><b>CORREO</b></span> </td> 
                                <td> <span><b>PERFIL</b></span> </td> 
                                <td> <span><b>DNI</b></span> </td> 
                                <td> <span><b>NOMBRES</b></span> </td> 
                                <td> <span><b>ACCIONES</b></span> </td> 
                            </tr>
                        </thead>
                        <?php if ($query ==''){}else{?>
                        <tbody>

                            <?php
                            foreach ($query as $key => $value) {
                                
                                echo '<tr>';
                                echo '<td>',$value[0],'</td>';
                                echo '<td>',$value[1],'</td>';
                                echo '<td>',$value[2],'</td>';
                                echo '<td>',$value[3],'</td>';
                                echo '<td>',$value[4],'</td>';
                                echo '<td class="text-right">';
                                    echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-pencil"></i></a>';
                                    echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-trash"></i></a>';
                                echo '</td>';
                                echo  '</tr>';
                                
                            }
                            ?>

                        <tr>
                            <td colspan=7>
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
            break;

        default:
            break;
    }


?>