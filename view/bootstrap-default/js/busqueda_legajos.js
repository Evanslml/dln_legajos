var $ = jQuery.noConflict();
$(document).ready(function(){

      $(".btn-accion").click(function(){
        //console.log("listo");
        form(1);
      });

      load(1);


});



    function load(page){
        console.log(page);
    }


    function form(page){
        var cbx_busqueda  =$('#cbx_busqueda').find('option:selected').prop('value');
        var txt_datos     =$('#txt_datos').val();

/*        if(cbx_busqueda == '0'){*/
/*          var mensaje = 'Seleccione un tipo de búsqueda'; swal_mensaje_error(mensaje); return false;*/
/*        }else{*/

            $.ajax({
                url:'./public/user/ajax/busqueda_legajos.php?action=ajax&page='+page+'&cbx_busqueda='+cbx_busqueda+'&txt_datos='+txt_datos,
                 beforeSend: function(objeto){
                 $('#loader').html('<img src="./view/bootstrap-default/img/ajax-loader.gif"> Cargando...');
                },
                success:function(data){
                  $(".outer_div").html(data).fadeIn('slow');
                  console.log(data);
                  $('#loader').html('');
                }
            });

/*        }*/
    }

/*  function load(page){*/
/*    var fecha_inicio = document.getElementById("fecha_inicio").value;*/
/*    var fecha_final = document.getElementById("fecha_final").value;*/
/*    var c = document.getElementById("id_establecimiento").value;*/
/*    */
/*    if(c=='00000'){*/
/*      var d = document.getElementById("mod_Establecimiento").value;*/
/*      var e = d;*/
/*    }else{*/
/*      var e = c;*/
/*    }*/
/**/
/*    $("#loader").fadeIn('slow');*/
/*    $.ajax({*/
/*      url:'./public/user/ajax/AllFormularios.php?action=ajax&page='+page+'&e='+e+'&fecha_inicio='+fecha_inicio+'&fecha_final='+fecha_final,*/
/*       beforeSend: function(objeto){*/
/*       $('#loader').html('<img src="./view/bootstrap-default/img/ajax-loader.gif"> Cargando...');*/
/*      },*/
/*      success:function(data){*/
/*        $(".outer_div").html(data).fadeIn('slow');*/
/*        $('#loader').html('');*/
/*      }*/
/*    });*/
/**/
/**/
/*  }*/

   //LOAD
