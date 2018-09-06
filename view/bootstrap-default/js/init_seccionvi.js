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
      });


       $('.btn-save').click(function(evt){
          evt.preventDefault();
          get_data_form();
       });

   });


     var count_click = 26;
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
        var div = $("<div class='row-agregado-resolucion'>");
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
                  <select data-placeholder="SELECCIONE" class="chosen-select-deselect cbx_grado1" tabindex="2" name="cbx_capacitacion" id="cbx_capacitacion">\
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
                  <input class="inputMaterial" type="text"  id="txt_estudios" name="txt_estudios" required>\
                  <span class="highlight"></span>\
                  <span class="bar"></span>\
                  <label>LUGAR DE PROCEDENCIA <i class="danger">*</i></label>\
                </div>\
            </div>\
            <div class="col-md-3 border-seccion formulario-legajos">\
                <div class="group">\
                  <input class="inputMaterial" type="text"  id="txt_casa_estudios" name="txt_casa_estudios" required>\
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
                  <select data-placeholder="SELECCIONE" class="chosen-select-deselect cbx_grado1" tabindex="2" name="cbx_capacitacion" id="cbx_capacitacion">\
                      <option value=""></option>\
                      <option value="90">RES. DE DESIGNACION</option>\
                      <option value="91">RES. DE ASIGNACION</option>\
                      <option value="92">ENCARGATURA</option>\
                  </select>\
            </div>\
            <div class="col-md-3 border-seccion formulario-legajos">\
                <div class="group">\
                  <input class="inputMaterial" type="text"  id="txt_estudios" name="txt_estudios" required>\
                  <span class="highlight"></span>\
                  <span class="bar"></span>\
                  <label>Nº DE DOCUMENTO<i class="danger">*</i></label>\
                </div>\
            </div>\
            <div class="col-md-2 border-seccion formulario-legajos">\
                <div class="group">\
                  <input class="inputMaterial" type="text"  id="txt_casa_estudios" name="txt_casa_estudios" required>\
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


/*********************************************************************************************************************************/
//FUNCIONES 
/*********************************************************************************************************************************/

  function get_data_form() {

    console.log("HELLO");
    
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

