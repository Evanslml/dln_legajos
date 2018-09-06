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


/*       $('.btn-save').click(function(evt){*/
/*          evt.preventDefault();*/
/*          get_data_form();*/
/*       });*/

   });


     var count_click = 26;

    function count_click_add() {
        count_click += 1;
        console.log(count_click);
        var div = $("<div class='row-agregado-resolucion'>");
        div.html(AddCertificado(count_click));
        $(".datos_certificados").append(div);
    }

/*********************************************************************************************************************************/
//FUNCIONES DATOS DE FORMULARIO
/*********************************************************************************************************************************/
  
  function AddCertificado(parameter) {
      return '<div class="col-md-4 border-seccion">\
                <h6 class="subtitle" style="margin:9px">TIPO <i class="danger">*</i></h6>\
                  <script> combocertificado(); </script>\
                  <select data-placeholder="SELECCIONE" class="chosen-select-deselect cbx_grado1" tabindex="2" name="cbx_capacitacion" id="cbx_capacitacion">\
                      <option value=""></option>\
                      <option value="94">RESOLUCION DE 5%</option>\
                      <option value="95">RESOLUCION DE 10%</option>\
                      <option value="96">RESOLUCION DE 15%</option>\
                      <option value="97">RESOLUCION DE 20%</option>\
                      <option value="98">RESOLUCION DE 25%</option>\
                      <option value="99">RESOLUCION DE 30%</option>\
                      <option value="100">RES. DE RECON. DE T. DE SERVICIO</option>\
                      <option value="101">RESOLUCION DE DEVENGADOS</option>\
                      <option value="102">RES. DE BONIF. DE 25 Y 30 AÑOS</option>\
                      <option value="103">RES. COMP. DE T. DE SERVICIO</option>\
                  </select>\
            </div>\
            <div class="col-md-4 border-seccion formulario-legajos">\
                <div class="group">\
                  <input class="inputMaterial" type="text"  id="txt_estudios" name="txt_estudios" required>\
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