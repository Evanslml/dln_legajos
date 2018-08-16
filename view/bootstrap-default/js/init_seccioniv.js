  var $ = jQuery.noConflict();
  $(document).ready(function(){

    $("#fecha_ingreso1").datepicker({ 
        autoclose: true, 
        todayHighlight: true,
        format: 'dd-mm-yyyy'
    }).datepicker('update', '01-01-1970');

    $("#fecha_ingreso2").datepicker({ 
        autoclose: true, 
        todayHighlight: true,
        format: 'dd-mm-yyyy'
    }).datepicker('update', '01-01-1970');

   $('.btn-save').click(function(evt){
      evt.preventDefault();
      get_data_form();
   });





  }); /*FIN READY FUNCTION*/ 


/*********************************************************************************************************************************/
//FUNCIONES 
/*********************************************************************************************************************************/

function get_data_form(){

    var MPERS_NUMDOC=$('#dni').val();
    var MCON_FECHA1 =$('#fecha_ingreso1 input').val();
    var MCON_NUMERO1 =$('#txt_num_contrato1').val().toUpperCase();
    var MCON_MODALIDAD1 =$('#txt_modalidad1').val().toUpperCase();
    
    var MCON_FECHA2 =$('#fecha_ingreso2 input').val();
    var MCON_NUMERO2 =$('#txt_num_contrato2').val().toUpperCase();
    var MCON_MODALIDAD2 =$('#cbx_modalidad2').find('option:selected').prop('value');
    var MCON_ORIGEN =$('#txt_lugar_origen').val().toUpperCase();
    var MPERS_NIVREMUN =$('#txt_niv').val().toUpperCase();

    

    if(MPERS_NUMDOC ==''){
      var mensaje = 'Debe ingresar número de documento'; swal_mensaje_error(mensaje); return false;
    }else if(!isNumeric(MPERS_NUMDOC) || MPERS_NUMDOC.length != 8 ){
      var mensaje = 'Verifique el número de documento'; swal_mensaje_error(mensaje); return false;
    }else{

      var array = new Array();

      if(MCON_NUMERO1.length == 0 && MCON_NUMERO2.length != 0){
          if(MCON_MODALIDAD2 ==''){
              var mensaje = 'Debe ingresar la modalidad del ingreso'; swal_mensaje_error(mensaje); return false;
          }else if(MCON_ORIGEN ==''){
              var mensaje = 'Debe ingresar el lugar de origen'; swal_mensaje_error(mensaje); return false;
          }else if(MPERS_NIVREMUN ==''){
              var mensaje = 'Debe ingresar el nivel remunerativo'; swal_mensaje_error(mensaje); return false;
          }else{
              array.push(MPERS_NUMDOC,MCON_FECHA2,MCON_NUMERO2,'',MCON_MODALIDAD2,MCON_ORIGEN,MPERS_NIVREMUN,'2','1');
              console.log(array);
              subida_ajax(array);
          }

          
      }else if(MCON_NUMERO2.length == 0 && MCON_NUMERO1.length != 0){
          if(MCON_MODALIDAD1 ==''){
              var mensaje = 'Debe ingresar la modalidad del ingreso1'; swal_mensaje_error(mensaje); return false;
          }else{
              array.push(MPERS_NUMDOC,MCON_FECHA1,MCON_NUMERO1,MCON_MODALIDAD1,'','','','1','1');
              console.log(array);
              subida_ajax(array);
          }
      }else{
          var mensaje = 'Debe ingresar sólo un número de contrato'; swal_mensaje_error(mensaje); return false;
      }



    }//ELSE



}

function subida_ajax($parameter){

  $.ajax({
          type: 'POST',
          url: './public/user/ajax/secciones/seccioniv.php?action=formulario',
          data: { 'data1':JSON.stringify($parameter) } ,
          beforeSend: function(objeto){
              before_process();
          },
          success: function (response) {
              if(response ==0){
                  subida_realizada(0);
              } else{
                  after_process();
                  var mensaje = 'El usuario ya ha sido registrado';
                  swal_mensaje_error(mensaje); return false;
              }

          },
         error: function () {
              alert("error");
          }
      }); 
}

/*********************************************************************************************************************************/
//LOAD IMAGES
/*********************************************************************************************************************************/

function subida_realizada(i){
  var MPERS_NUMDOC=$('#dni').val();    
  var MOBJ_ID='5';

  var archivos = [ 
      {dni : MPERS_NUMDOC, obj : MOBJ_ID, nom : 'RESOLUCIONES DE CONTRATO', arc : '19', fil : '19'},
      {dni : MPERS_NUMDOC, obj : MOBJ_ID, nom : 'RENOVACIÓN DE CONTRATO', arc : '20', fil : '20'},
      {dni : MPERS_NUMDOC, obj : MOBJ_ID, nom : 'RESOLUCIONES DE NOMBRAMIENTO', arc : '21', fil : '21'},
      {dni : MPERS_NUMDOC, obj : MOBJ_ID, nom : 'TÉRMINO DE LA RELACIÓN LABORAL', arc : '22', fil : '22'}
    ];  

  var inew= Number(i)+1;
  var maxi= archivos.length

  if (inew <= maxi ){
    for (var n = i; i < inew; i++) {
          console.log(archivos[i].fil);
          subida_archivos(archivos[i].dni,archivos[i].obj,archivos[i].nom,archivos[i].arc,archivos[i].fil,i);
    }
  }else{
      after_process();
      var mensaje= "Se guardo el registro satisfactoriamente";
      swal_mensaje_success(mensaje);
  }

}


/**/
function subida_archivos(dni,obj,nombre,arch,num,i){
  var formulario= '.formulario_'+num;
  var file= '#file-'+num;
  var archivo = formulario +' '+ file;
  var file1 = $(archivo)[0].files[0];
      if (file1 !== undefined) {
          var MPERS_NUMDOC = dni;
          var MADJ_NOMBRES = nombre;
          var MOBJ_ID = obj;
          var fileName = file1.name;
          var formData = new FormData($(formulario)[0]);
          formData.append('MPERS_NUMDOC',MPERS_NUMDOC);
          formData.append('MADJ_NOMBRES',MADJ_NOMBRES);
          formData.append('MOBJ_ID',MOBJ_ID);
          formData.append('MADJ_URL',fileName);
          formData.append('MARCH_ID',arch);

          $.ajax({
              url: './public/user/ajax/includes/upload.php?type=data_imagen',
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
        var inew = Number(i)+1;
        subida_realizada(inew);
      }

}
