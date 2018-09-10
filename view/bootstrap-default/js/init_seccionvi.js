  var $ = jQuery.noConflict();
  $(document).ready(function(){

      $(function () {
          $("#btnAdd-resolucion").bind("click", function () {
              count_click_add1();
          });
          $("#btnAdd-cargo").bind("click", function () {
              count_click_add2();
          });
         $("body").on("click", ".remove-resolucion", function () {
              $(this).closest(".row-agregado-resolucion").remove();
          });
         $("body").on("click", ".remove-cargo", function () {
              $(this).closest(".row-agregado-cargo").remove();
          });
      });


       $('.btn-save').click(function(evt){
          evt.preventDefault();
          get_data_form();
       });

   });


     var count_click = 27;
    function count_click_add1() {
        count_click += 1;
        console.log(count_click);
        var div = $("<div class='row-agregado-resolucion'>");
        div.html(AddCertificado1(count_click));
        $(".datos_certificados1").append(div);
    }

    function count_click_add2() {
        count_click += 1;
        console.log(count_click);
        var div = $("<div class='row-agregado-cargo'>");
        div.html(AddCertificado2(count_click));
        $(".datos_certificados2").append(div);
    }

/*********************************************************************************************************************************/
//FUNCIONES DATOS DE FORMULARIO
/*********************************************************************************************************************************/
  
  function AddCertificado1(parameter) {
      return '<div class="col-md-2 border-seccion">\
                <h6 class="subtitle" style="margin:9px">TIPO <i class="danger">*</i></h6>\
                  <script> combocertificado(); </script>\
                  <select data-placeholder="SELECCIONE" class="chosen-select-deselect cbx_grado1" tabindex="2" name="cbx_tipo_desplazamiento" id="cbx_tipo_desplazamiento">\
                      <option value=""></option>\
                      <option value="81">REASIGNACION</option>\
                      <option value="82">DESIGNACION</option>\
                      <option value="83">PERMUTA</option>\
                      <option value="84">ROTACION DE PLAZA</option>\
                      <option value="85">ROTACION</option>\
                      <option value="86">COMISION DE SERVICIO</option>\
                      <option value="87">DESTAQUE</option>\
                      <option value="88">RESIDENTADO</option>\
                  </select>\
            </div>\
            <div class="col-md-3 border-seccion formulario-legajos">\
                <div class="group">\
                  <input class="inputMaterial" type="text"  id="txt_lugar_procedencia" name="txt_lugar_procedencia" required>\
                  <span class="highlight"></span>\
                  <span class="bar"></span>\
                  <label>LUGAR DE PROCEDENCIA <i class="danger">*</i></label>\
                </div>\
            </div>\
            <div class="col-md-3 border-seccion formulario-legajos">\
                <div class="group">\
                  <input class="inputMaterial" type="text"  id="txt_lugar_destino" name="txt_lugar_destino" required>\
                  <span class="highlight"></span>\
                  <span class="bar"></span>\
                  <label>LUGAR DE DESTINO</label>\
                </div>\
            </div>\
            <div class="col-md-4 border-seccion relative">\
              <script> habilitar_subida_archivo1(); </script>\
              <input class="hidden" type="hidden" value="'+parameter+'" />\
              <div class="js">\
                  <h5 class="input-file-title" style="margin: 8px">CONSTANCIA DE TRABAJO</h5>\
                  <form enctype="multipart/form-data" class="formulario_'+parameter+'">\
                      <input name="archivo" type="file" id="file-'+parameter+'" class="inputfile inputfile-6"/>\
                      <label for="file-'+parameter+'" class="mar-bot-0" style="height: 40px">\
                      <span></span>\
                      <strong><i class="fa fa-plus"></i> Subir un archivo</strong></label>\
                  </form>\
              </div>\
              <button type="button" class="btn btn-danger remove-resolucion" style="position: absolute;top: 20px;right: -10px;"><i class="glyphicon glyphicon-remove-sign"></i></button>\
            </div>\
            ';
  }  

  function AddCertificado2(parameter) {
      return '<div class="col-md-3 border-seccion">\
                <h6 class="subtitle" style="margin:9px">TIPO <i class="danger">*</i></h6>\
                  <script> combocertificado(); </script>\
                  <select data-placeholder="SELECCIONE" class="chosen-select-deselect cbx_grado1" tabindex="2" name="cbx_tipo_cargo" id="cbx_tipo_cargo">\
                      <option value=""></option>\
                      <option value="90">RES. DE DESIGNACION</option>\
                      <option value="91">RES. DE ASIGNACION</option>\
                      <option value="92">ENCARGATURA</option>\
                  </select>\
            </div>\
            <div class="col-md-3 border-seccion formulario-legajos">\
                <div class="group">\
                  <input class="inputMaterial" type="text"  id="txt_num_documento" name="txt_num_documento" required>\
                  <span class="highlight"></span>\
                  <span class="bar"></span>\
                  <label>Nº DE DOCUMENTO<i class="danger">*</i></label>\
                </div>\
            </div>\
            <div class="col-md-2 border-seccion formulario-legajos">\
                <div class="group">\
                  <input class="inputMaterial" type="text"  id="txt_observacion" name="txt_observacion" required>\
                  <span class="highlight"></span>\
                  <span class="bar"></span>\
                  <label>OBSERVACIÓN</label>\
                </div>\
            </div>\
            <div class="col-md-4 border-seccion relative">\
              <script> habilitar_subida_archivo1(); </script>\
              <input class="hidden" type="hidden" value="'+parameter+'" />\
              <div class="js">\
                  <h5 class="input-file-title" style="margin: 8px">DOCUMENTO</h5>\
                  <form enctype="multipart/form-data" class="formulario_'+parameter+'">\
                      <input name="archivo" type="file" id="file-'+parameter+'" class="inputfile inputfile-6"/>\
                      <label for="file-'+parameter+'" class="mar-bot-0" style="height: 40px">\
                      <span></span>\
                      <strong><i class="fa fa-plus"></i> Subir un archivo</strong></label>\
                  </form>\
              </div>\
              <button type="button" class="btn btn-danger remove-cargo" style="position: absolute;top: 20px;right: -10px;"><i class="glyphicon glyphicon-remove-sign"></i></button>\
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

  function get_data_form() {

    var nFilas_childs1 = $(".datos_certificados1 .row-agregado-resolucion").length;
    var nFilas_childs2 = $(".datos_certificados2 .row-agregado-cargo").length;
    var MPERS_NUMDOC=$('#dni').val();

    if(MPERS_NUMDOC ==''){
      var mensaje = 'Debe ingresar número de documento'; swal_mensaje_error(mensaje); return false;
    }else if(!isNumeric(MPERS_NUMDOC) || MPERS_NUMDOC.length != 8 ){
      var mensaje = 'Verifique el número de documento'; swal_mensaje_error(mensaje); return false;
    }else{

    var array = new Array();
    array.push(nFilas_childs1,nFilas_childs2,MPERS_NUMDOC);

    for (var i = 1; i <= nFilas_childs1; i++) {
          var MTABL_ID1          = $(".datos_certificados1 .row-agregado-resolucion:nth-child("+i+") #cbx_tipo_desplazamiento").find('option:selected').prop('value');
          var MDOC_DESCRIPCION1  = $('.datos_certificados1 .row-agregado-resolucion:nth-child('+i+') input#txt_lugar_procedencia').val().toUpperCase();
          var MDOC_ALIAS1        = $(".datos_certificados1 .row-agregado-resolucion:nth-child("+i+") input#txt_lugar_destino").val().toUpperCase();
          if(MTABL_ID1.length == 0){
              var mensaje = 'Debe Ingresar el tipo de desplazanmiento'; swal_mensaje_error(mensaje); return false;
          }else if(MDOC_DESCRIPCION1.length == 0){
              var mensaje = 'Debe Ingresar el lugar de procedencia'; swal_mensaje_error(mensaje); return false;
          }
          array.push(MTABL_ID1,MDOC_DESCRIPCION1,MDOC_ALIAS1);
    }
    
    for (var n = 1; n <= nFilas_childs2; n++) {
          var MTABL_ID2          = $(".datos_certificados2 .row-agregado-cargo:nth-child("+n+") #cbx_tipo_cargo").find('option:selected').prop('value');
          var MDOC_DESCRIPCION2  = $('.datos_certificados2 .row-agregado-cargo:nth-child('+n+') input#txt_num_documento').val().toUpperCase();
          var MDOC_ALIAS2        = $(".datos_certificados2 .row-agregado-cargo:nth-child("+n+") input#txt_observacion").val().toUpperCase();
          if(MTABL_ID2.length == 0){
              var mensaje = 'Debe seleccionar el tipo la resolucion'; swal_mensaje_error(mensaje); return false;
          }else if(MDOC_DESCRIPCION2.length == 0){
              var mensaje = 'Debe Ingresar el número de resolucion'; swal_mensaje_error(mensaje); return false;
          }
          array.push(MTABL_ID2,MDOC_DESCRIPCION2,MDOC_ALIAS2);
    }
    
    //console.log(array);

      $.ajax({
          type: 'POST',
          url: './public/user/ajax/secciones/seccionvi.php?action=formulario',
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


    }


  }

/*********************************************************************************************************************************/
//LOAD IMAGES
/*********************************************************************************************************************************/

function subida_realizada(i){
  var MPERS_NUMDOC=$('#dni').val();
  var nFilas_childs1 = $(".datos_certificados1 .row-agregado-resolucion").length;
  var nFilas_childs2 = $(".datos_certificados2 .row-agregado-cargo").length;
  var MOBJ_ID='7';
  var NOMBRE1='CONSTANCIA DE TRABAJO';
  var NOMBRE2='DOCUMENTO';

  var archivos = [];  

  var m1=0;
  for (var m = 1; m <= nFilas_childs1; m++) {
      var input = $('.datos_certificados1 .row-agregado-resolucion:nth-child('+m+') input.hidden').val();
      archivos.push({dni:MPERS_NUMDOC, obj:MOBJ_ID, nom:NOMBRE1, arc: '28'+'.'+m1, fil: input  });
      m1++;
  }  

  var n1=0;
  for (var n = 1; n <= nFilas_childs2; n++) {
      var input = $('.datos_certificados2 .row-agregado-cargo:nth-child('+n+') input.hidden').val();
      archivos.push({dni:MPERS_NUMDOC, obj:MOBJ_ID, nom:NOMBRE2, arc: '29'+'.'+n1, fil: input  });
      n1++;
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

