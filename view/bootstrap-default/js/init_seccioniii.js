  var $ = jQuery.noConflict();
  $(document).ready(function(){

      $(function () {
          $("#btnAdd-certificado").bind("click", function () {
              count_click_add();
          });
         $("body").on("click", ".remove-certificado", function () {
              $(this).closest(".row-agregado-certificado").remove();
          });
      });


   $('.btn-save').click(function(evt){
      evt.preventDefault();
      get_data_form();
   });


   //PONE EL CONTADOR A 0
        var count_click = 18;

    //AÑADE UN CLICK AL EJECUTAR LA FUNCIÓN
    function count_click_add() {
        count_click += 1;
        //console.log(count_click);
        var div = $("<div class='row-agregado-certificado'>");
        div.html(AddCertificado(count_click));
        $(".datos_certificados").append(div);
    }


  }); /*FIN READY FUNCTION*/ 


/*********************************************************************************************************************************/
//FUNCIONES DATOS DE FORMULARIO
/*********************************************************************************************************************************/
  function AddCertificado(parameter) {
      return '<div class="col-md-2 border-seccion">\
                <h6 class="subtitle" style="margin:9px">CAPACITACIÓN <i class="danger">*</i></h6>\
                  <script> combocertificado(); </script>\
                  <select data-placeholder="CAPACITACIÓN" class="chosen-select-deselect cbx_grado1" tabindex="2" name="cbx_capacitacion" id="cbx_capacitacion">\
                      <option value=""></option>\
                      <option value="30">CONGRESO</option> <option value="31">SEMINARIO</option> <option value="32">SIMPOSIOS</option> <option value="33">CONFERENCIAS</option> <option value="34">CONVENCIONES</option> <option value="35">CHARLA</option> <option value="36">WEBINAR</option> <option value="37">CURSO</option> <option value="38">OTROS</option>\
                  </select>\
            </div>\
            <div class="col-md-3 border-seccion formulario-legajos">\
                <div class="group">\
                  <input class="inputMaterial" type="text"  id="txt_estudios" name="txt_estudios" required>\
                  <span class="highlight"></span>\
                  <span class="bar"></span>\
                  <label>ESTUDIOS <i class="danger">*</i></label>\
                </div>\
            </div>\
            <div class="col-md-3 border-seccion formulario-legajos">\
                <div class="group">\
                  <input class="inputMaterial" type="text"  id="txt_casa_estudios" name="txt_casa_estudios" required>\
                  <span class="highlight"></span>\
                  <span class="bar"></span>\
                  <label>CASA DE ESTUDIOS</label>\
                </div>\
            </div>\
            <div class="col-md-4 border-seccion relative">\
              <script> habilitar_subida_archivo1(); </script>\
              <input class="hidden" type="hidden" value="'+parameter+'" />\
              <div class="js">\
                  <h5 class="input-file-title" style="margin: 8px">CERTIFICADO / CONSTANCIA / DIPLOMA</h5>\
                  <form enctype="multipart/form-data" class="formulario_'+parameter+'">\
                      <input name="archivo" type="file" id="file-'+parameter+'" class="inputfile inputfile-6"/>\
                      <label for="file-'+parameter+'" class="mar-bot-0" style="height: 40px">\
                      <span></span>\
                      <strong><i class="fa fa-plus"></i> Subir un archivo</strong></label>\
                  </form>\
              </div>\
              <button type="button" class="btn btn-danger remove-certificado" style="position: absolute;top: 20px;right: -10px;"><i class="glyphicon glyphicon-remove-sign"></i></button>\
            </div>\
            ';
  }


  function combocertificado(){
    var $select_elem = $(".cbx_grado1");
    $select_elem.chosen({
      allow_single_deselect: false,
      disable_search_threshold: 10,
      no_results_text: "Oops, ningun resultado",
      width: "95%"
    });
  }

  function habilitar_subida_archivo1(){

  'use strict';

  ;( function( $, window, document, undefined )
  {
      $( '.inputfile' ).each( function()
      {
          var $input   = $( this ),
              $label   = $input.next( 'label' ),
              labelVal = $label.html();

          $input.on( 'change', function( e )
          {
              var fileName = '';

              if( this.files && this.files.length > 1 )
                  fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
              else if( e.target.value )
                  fileName = e.target.value.split( '\\' ).pop();

              if( fileName )
                  $label.find( 'span' ).html( fileName );
              else
                  $label.html( labelVal );
          });

          // Firefox bug fix
          $input
          .on( 'focus', function(){ $input.addClass( 'has-focus' ); })
          .on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
      });
  })( jQuery, window, document );

  }


/*********************************************************************************************************************************/
//FUNCIONES 
/*********************************************************************************************************************************/

function get_data_form(){
    var nFilas_childs = $(".datos_certificados .row-agregado-certificado").length;
    var MPERS_NUMDOC=$('#dni').val();
    
    if(MPERS_NUMDOC ==''){
      var mensaje = 'Debe ingresar número de documento'; swal_mensaje_error(mensaje); return false;
    }else if(!isNumeric(MPERS_NUMDOC) || MPERS_NUMDOC.length != 8 ){
      var mensaje = 'Verifique el número de documento'; swal_mensaje_error(mensaje); return false;
    }else{

      var array = new Array();
      array.push(MPERS_NUMDOC,nFilas_childs);

      for (var i = 1; i <= nFilas_childs; i++) {
            var MESTU_ITEM = $(".datos_certificados .row-agregado-certificado:nth-child("+i+") #cbx_capacitacion").find('option:selected').prop('value');
            var MESTU_DESC = $('.datos_certificados .row-agregado-certificado:nth-child('+i+') input#txt_estudios').val().toUpperCase();
            var MESTU_UBIC = $(".datos_certificados .row-agregado-certificado:nth-child("+i+") input#txt_casa_estudios").val().toUpperCase();
            if(MESTU_ITEM.length == 0){
                var mensaje = 'Debe Ingresar el tipo de capacitación'; swal_mensaje_error(mensaje); return false;
            }else if(MESTU_DESC.length == 0){
                var mensaje = 'Debe Ingresar los estudios realizados'; swal_mensaje_error(mensaje); return false;
            }else if(MESTU_UBIC.length == 0){
                var mensaje = 'Debe Ingresar la casa de estudios'; swal_mensaje_error(mensaje); return false;
            }
            array.push(MESTU_ITEM,MESTU_DESC,MESTU_UBIC);
      }

      $.ajax({
          type: 'POST',
          url: './public/user/ajax/secciones/seccioniii.php?action=formulario',
          data: { 'data1':JSON.stringify(array) } ,
          beforeSend: function(objeto){
              before_process();
          },
          success: function (response) {
              //console.log(response);
              if(response ==0){
                  subida_realizada(0);
              } else{
                  after_process();
                  var mensaje = 'El usuario ya ha sido registrado';
                  swal_mensaje_error(mensaje); /*console.log(mensaje);*/ return false;
                  //console.log("ya esa ingresado");
              }
          },
         error: function () {
              alert("error");
          }
      }); //AJAX


    }//ELSE



}



/*********************************************************************************************************************************/
//LOAD IMAGES
/*********************************************************************************************************************************/

function subida_realizada(i){
  var MPERS_NUMDOC=$('#dni').val();
  var nFilas_childs = $(".datos_certificados .row-agregado-certificado").length;
  var MOBJ_ID='4';
  var NOMBRE='CERTIFICADO / CONSTANCIA / DIPLOMA';

  var archivos = [];  

  for (var m = 1; m <= nFilas_childs; m++) {
      var input = $('.datos_certificados .row-agregado-certificado:nth-child('+m+') input.hidden').val();
      archivos.push({dni:MPERS_NUMDOC, obj:MOBJ_ID, nom:NOMBRE, arc: '18'+'.'+i, fil: input  });
  }

  console.log(archivos);

  var inew= Number(i)+1;
  var maxi= Number(archivos.length);

  console.log(inew);
  console.log(maxi);

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
