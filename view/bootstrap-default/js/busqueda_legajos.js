
  var $ = jQuery.noConflict();
  $(document).ready(function(){

        $(".btn-accion").click(function(){
          load(1);
        });
        load(1);

  });

  function load(page){
      var cbx_busqueda  =$('#cbx_busqueda').find('option:selected').prop('value');
      var txt_datos     =$('#txt_datos').val();

          $.ajax({
              url:'./public/user/ajax/busqueda_legajos.php?action=ajax&page='+page+'&cbx_busqueda='+cbx_busqueda+'&txt_datos='+txt_datos,
               beforeSend: function(objeto){
               $('#loader').html('<img src="./view/bootstrap-default/img/ajax-loader.gif"> Cargando...');
              },
              success:function(data){
                $(".outer_div").html(data).fadeIn('slow');
                //console.log(data);
                $('#loader').html('');
              }
          });
  }

  function ingresar_foto(parameter){
    $("#new_dni").val(zeroPad(parameter,8));
  }

  function eliminar1(dni){
    $("#mod_dni").val(zeroPad(dni,8));
  }

  function SubirFoto(){
    before_process();
    subida_realizada(0);      
  }

  function Eliminar_Legajo(){

      var MPERS_NUMDOC=$('#mod_dni').val();

      $.ajax({
          type: 'POST',
          url: './public/user/ajax/busqueda_legajos.php?action=delete&MPERS_NUMDOC='+MPERS_NUMDOC,
          beforeSend: function(objeto){
              before_process();
          },
          success: function (response) {
                $('#eliminar_legajos').modal('hide');
                after_process();
                var mensaje = 'El legajo ha sido eliminado satisfactoriamente';
                swal_mensaje_success(mensaje);
                load(1);
          },
         error: function () {
              alert("error");
          }
      }); //AJAX

  }

function subida_realizada(i){
  var MPERS_NUMDOC=$('#new_dni').val();    
  var MOBJ_ID='0';

  var archivos = [ 
      {dni : MPERS_NUMDOC, obj : MOBJ_ID, nom : 'FOTO PERSONAL', arc : '00', fil : '1'}
    ];  

  var inew= Number(i)+1;
  var maxi= archivos.length

  if (inew <= maxi ){
    for (var n = i; i < inew; i++) {
          subida_archivos(archivos[i].dni,archivos[i].obj,archivos[i].nom,archivos[i].arc,archivos[i].fil,i);
    }
  }else{
      after_process();
      $('#nueva_foto').modal('hide');
      var mensaje= "Se guardo el registro satisfactoriamente";
      swal_mensaje_success(mensaje);
      load(1);
  }

}


function subida_archivos(dni,obj,nombre,arch,num,i){
  var formulario= '.formulario_'+num;
  var file= '#file-'+num;
  var archivo = formulario +' '+ file;
  //console.log(dni,nombre,obj,formulario,file,'_',archivo);
  var file1 = $(archivo)[0].files[0];
      if (file1 !== undefined) {
          var MPERS_NUMDOC = dni;
          var MADJ_NOMBRES = nombre;
          var MOBJ_ID = obj;
          var fileName = file1.name;
          /*var fileSize = file1.size;
          var fileType = file1.type;*/
          var formData = new FormData($(formulario)[0]);
          formData.append('MPERS_NUMDOC',MPERS_NUMDOC);
          formData.append('MADJ_NOMBRES',MADJ_NOMBRES);
          formData.append('MOBJ_ID',MOBJ_ID);
          formData.append('MADJ_URL',fileName);
          formData.append('MARCH_ID',arch);

          $.ajax({
              url: './public/user/ajax/includes/upload.php?type=data_foto',
              type: 'POST',
              data: formData,
              cache: false,
              contentType: false,
              processData: false,
              success: function(data){
                  var inew = Number(i)+1;
                  subida_realizada(inew);
              },
          });
      }else{
        console.log("error");
        var inew = Number(i)+1;
        subida_realizada(inew);
      }

}

function escalafon1(dni){

    var new_dni= utf8_to_b64(zeroPad(dni,8));
    var parametros = 'd='+new_dni;
    var url='./core/pdf/documentos/reporte_01.php?'+parametros;
    VentanaCentrada(url,'Formulario','','1024','768','true');

}


function utf8_to_b64( str ) {
  return window.btoa(unescape(encodeURIComponent( str )));
}