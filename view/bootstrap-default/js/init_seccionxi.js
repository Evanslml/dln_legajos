  var $ = jQuery.noConflict();
  $(document).ready(function(){

      $(function () {
          $("#btnAdd-resolucion").bind("click", function () {
              count_click_add();
          });
         $("body").on("click", ".remove-resolucion", function () {
              $(this).closest(".row-agregado-resolucion").remove();
          });
      });

       $('.btn-save').click(function(evt){
          evt.preventDefault();
          get_data_form();
       });

     var count_click = 35;

    function count_click_add() {
        count_click += 1;
        console.log(count_click);
        var div = $("<div class='row-agregado-resolucion'>");
        div.html(AddCertificado(count_click));
        $(".datos_certificados").append(div);
    }

});
/*********************************************************************************************************************************/
//FUNCIONES DATOS DE FORMULARIO
/*********************************************************************************************************************************/
  
  function AddCertificado(parameter) {
      return '<div class="col-md-4 border-seccion">\
                <h6 class="subtitle" style="margin:9px">TIPO <i class="danger">*</i></h6>\
                  <script> combocertificado(); </script>\
                  <select data-placeholder="SELECCIONE" class="chosen-select-deselect cbx_grado1" tabindex="2" name="cbx_tipo_remuneracion" id="cbx_tipo_remuneracion">\
                      <option value=""></option>\
                      <option value="105">RES. DE BON. FAM.</option>\
                      <option value="106">RES. DE AMPL. DE NUCLEO FAM.</option>\
                      <option value="107">RES. DE DEVENG. POR PAGO DE BON. FAM.</option>\
                      <option value="108">RES. DE BON. POR GASTOS DE SEP. Y SUBSIDIO POR LUTO</option>\
                  </select>\
            </div>\
            <div class="col-md-4 border-seccion formulario-legajos">\
                <div class="group">\
                  <input class="inputMaterial" type="text"  id="txt_num_resolucion" name="txt_num_resolucion" required>\
                  <span class="highlight"></span>\
                  <span class="bar"></span>\
                  <label>Nº DE RESOLUCION <i class="danger">*</i></label>\
                </div>\
            </div>\
            <div class="col-md-4 border-seccion relative">\
              <script> habilitar_subida_archivo1(); </script>\
              <input class="hidden" type="hidden" value="'+parameter+'" />\
              <div class="js">\
                  <h5 class="input-file-title" style="margin: 8px">RESOLUCION</h5>\
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

    var nFilas_childs = $(".datos_certificados .row-agregado-resolucion").length;
    var MPERS_NUMDOC=$('#dni').val();

    if(MPERS_NUMDOC ==''){
      var mensaje = 'Debe ingresar número de documento'; swal_mensaje_error(mensaje); return false;
    }else if(!isNumeric(MPERS_NUMDOC) || MPERS_NUMDOC.length != 8 ){
      var mensaje = 'Verifique el número de documento'; swal_mensaje_error(mensaje); return false;
    }else{

    var array = new Array();
    array.push(nFilas_childs,MPERS_NUMDOC);

    for (var i = 1; i <= nFilas_childs; i++) {
          var MTABL_ID          = $(".datos_certificados .row-agregado-resolucion:nth-child("+i+") #cbx_tipo_remuneracion").find('option:selected').prop('value');
          var MDOC_DESCRIPCION  = $('.datos_certificados .row-agregado-resolucion:nth-child('+i+') input#txt_num_resolucion').val().toUpperCase();

          if(MTABL_ID.length == 0){
              var mensaje = 'Debe Ingresar el tipo de resolución'; swal_mensaje_error(mensaje); return false;
          }else if(MDOC_DESCRIPCION.length == 0){
              var mensaje = 'Debe Ingresar el número de resolucion'; swal_mensaje_error(mensaje); return false;
          }
          array.push(MTABL_ID,MDOC_DESCRIPCION);
    }
    
    
    //console.log(array);

      $.ajax({
          type: 'POST',
          url: './public/user/ajax/secciones/seccionxi.php?action=formulario',
          data: { 'data1':JSON.stringify(array) } ,
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
      }); //AJAX


    }


  }

/*********************************************************************************************************************************/
//LOAD IMAGES
/*********************************************************************************************************************************/

function subida_realizada(i){
  var MPERS_NUMDOC=$('#dni').val();
  var nFilas_childs = $(".datos_certificados .row-agregado-resolucion").length;
  var MOBJ_ID='12';
  var NOMBRE='RESOLUCION';

  var archivos = [];  

  for (var m = 1; m <= nFilas_childs; m++) {
      var input = $('.datos_certificados .row-agregado-resolucion:nth-child('+m+') input.hidden').val();
      archivos.push({dni:MPERS_NUMDOC, obj:MOBJ_ID, nom:NOMBRE, arc: '35'+'.'+i, fil: input  });
  }  

  //console.log(archivos);

  var inew= Number(i)+1;
  var maxi= Number(archivos.length);

/*  console.log(inew);*/
/*  console.log(maxi);*/

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
                if(i.length != 0){
                    var inew = Number(i)+1;
                    subida_realizada(inew);
                }
              },
          });
      }else{
        var inew = Number(i)+1;
        subida_realizada(inew);
      }

}