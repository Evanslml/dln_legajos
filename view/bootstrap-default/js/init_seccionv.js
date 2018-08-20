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

    $("#fecha_ingreso3").datepicker({ 
        autoclose: true, 
        todayHighlight: true,
        format: 'dd-mm-yyyy'
    }).datepicker('update', '01-01-1970');

    $("#fecha_ingreso4").datepicker({ 
        autoclose: true, 
        todayHighlight: true,
        format: 'dd-mm-yyyy'
    }).datepicker("setDate", new Date());

    $("#fecha_ingreso5").datepicker({ 
        autoclose: true, 
        todayHighlight: true,
        format: 'dd-mm-yyyy'
    }).datepicker("setDate", new Date());

    $("#fecha_ingreso6").datepicker({ 
        autoclose: true, 
        todayHighlight: true,
        format: 'dd-mm-yyyy'
    }).datepicker("setDate", new Date());

    $("#fecha_ingreso7").datepicker({ 
        autoclose: true, 
        todayHighlight: true,
        format: 'dd-mm-yyyy'
    }).datepicker("setDate", new Date());

   $('.btn-save').click(function(evt){
      evt.preventDefault();
      get_data_form();
   });





  }); /*FIN READY FUNCTION*/ 


/*********************************************************************************************************************************/
//FUNCIONES 
/*********************************************************************************************************************************/

function get_data_form() {

    var MPERS_NUMDOC1     =$('#dni1').val();
    var MREN_FECRESOL1    =$('#fecha_ingreso1 input').val();
    var MREN_FECINIRESOL1 =$('#fecha_ingreso2 input').val();
    var MREN_NUMRESOL1    =$('#txt_num_res1').val().toUpperCase();
    var MTABLA_ID1        =$('#cbx_reg_pension').find('option:selected').prop('value');
    
    var MPERS_NUMDOC2     =$('#dni2').val();
    var MREN_FECRESOL2    =$('#fecha_ingreso3 input').val();
    var MREN_FECCESE2     =$('#fecha_ingreso4 input').val();
    var MREN_NUMRESOL2    =$('#txt_num_res2').val().toUpperCase();
    var MTABLA_ID2        =$('#cbx_moti_cese').find('option:selected').prop('value');  

    var MPERS_NUMDOC3     =$('#dni3').val();
    var MREN_FECRESOL3    =$('#fecha_ingreso5 input').val();
    var MREN_NUMRESOL3    =$('#txt_num_res3').val().toUpperCase();
    var MREN_MOTIVO3      =$('#txt_motivo').val().toUpperCase();

    var MPERS_NUMDOC4     =$('#dni4').val();
    var MREN_FECRESOL4    =$('#fecha_ingreso6 input').val();
    var MREN_FECINIRESOL4 =$('#fecha_ingreso7 input').val();
    var MREN_NUMRESOL4    =$('#txt_num_res4').val().toUpperCase();

/*    */
/*    if(MPERS_NUMDOC1 ==''){*/
/*      var mensaje = 'Debe ingresar número de documento'; swal_mensaje_error(mensaje); return false;*/
/*    }else if(!isNumeric(MPERS_NUMDOC1) || MPERS_NUMDOC1.length != 8 ){*/
/*      var mensaje = 'Verifique el número de documento'; swal_mensaje_error(mensaje); return false;*/
/*    }else if(MTABLA_ID1 == ''){*/
/*      var mensaje = 'Seleccione el Regimen de Pensiones'; swal_mensaje_error(mensaje); return false;*/
/*    }else if(MREN_FECRESOL1 == ''){*/
/*      var mensaje = 'Seleccione la fecha de Resolucón'; swal_mensaje_error(mensaje); return false;*/
/*    }else if(MREN_NUMRESOL1 == ''){*/
/*      var mensaje = 'Seleccione el número de Resolucón'; swal_mensaje_error(mensaje); return false;*/
/*    }*/

    //else{

      var array = new Array();
      array.push(MPERS_NUMDOC1,MREN_FECRESOL1,MREN_FECINIRESOL1,'',MREN_NUMRESOL1,MTABLA_ID1,'','CONTRATO DE REGIMEN PENSIONARIO','1','1');
      array.push(MPERS_NUMDOC2,MREN_FECRESOL2,'',MREN_FECCESE2,MREN_NUMRESOL2,MTABLA_ID2,'','RESOLUCIÓN DE CESE','2','1');
      array.push(MPERS_NUMDOC3,MREN_FECRESOL3,'','',MREN_NUMRESOL3,'',MREN_MOTIVO3,'RESOLUCIÓN DE BENEFICIOS SOCIALES','3','1');
      array.push(MPERS_NUMDOC4,MREN_FECRESOL4,MREN_FECINIRESOL4,'',MREN_NUMRESOL4,'','','RESOLUCIÓN DE PENSION','4','1');

      subida_ajax(array);

   // }//ELSE



}

function subida_ajax($parameter){

  $.ajax({
          type: 'POST',
          url: './public/user/ajax/secciones/seccionv.php?action=formulario',
          data: { 'data1':JSON.stringify($parameter) } ,
          beforeSend: function(objeto){
              before_process();
          },
          success: function (response) {
              if(response ==0){
                  subida_realizada(0);
                  console.log("listo");
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

  var MPERS_NUMDOC1=$('#dni1').val();    
  var MPERS_NUMDOC2=$('#dni2').val();    
  var MPERS_NUMDOC3=$('#dni3').val();    
  var MPERS_NUMDOC4=$('#dni4').val();    

//
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
