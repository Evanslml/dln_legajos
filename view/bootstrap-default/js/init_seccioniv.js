  var $ = jQuery.noConflict();
  $(document).ready(function(){

    $(".fecha_emision").datepicker({ 
        autoclose: true, 
        todayHighlight: true,
        format: 'dd-mm-yyyy'
    }).datepicker('update', new Date());

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

   $(function () {
        $("#btnAdd-certificado").bind("click", function () {
            count_click_add();
        });
        $("body").on("click", ".remove-certificado", function () {
            $(this).closest(".row-agregado-certificado").remove();
        });
    });

    //PONE EL CONTADOR A 0
    var count_click = 23;

    //AÑADE UN CLICK AL EJECUTAR LA FUNCIÓN
    function count_click_add() {
        count_click += 1;
        console.log(count_click);
        var div = $("<div class='row-agregado-certificado'>");
        div.html(AddCertificado(count_click));
        $(".datos_certificados").append(div);
    }



  }); /*FIN READY FUNCTION*/ 

/*********************************************************************************************************************************/
//FUNCIONES DATOS DE FORMULARIO
/*********************************************************************************************************************************/
function AddCertificado(parameter) {
    return '<div class="col-md-2 border-seccion formulario-legajos">\
                <div class="group">\
                <input class="inputMaterial" type="text"  id="num_adenda1" name="num_adenda1" required>\
                <span class="highlight"></span>\
                <span class="bar"></span>\
                <label>Nº ADENDA <i class="danger">*</i></label>\
                </div>\
            </div>\
            <div class="col-md-3 border-seccion">\
                <script> date_activate('+parameter+'); </script>\
                <h5>FECHA DE INGRESO <i class="danger">*</i></h5>\
                <div class="input-group date fecha_emision date_'+parameter+'" data-date-format="mm-dd-yyyy" style="margin-top: 17px;">\
                    <input class="form-control" type="text" readonly="" style="font-size: 18px; border-bottom: 1px solid #5f5f5f; border-top: none; border-left: none; border-right: none; background: #fff;"> \
                    <span class="input-group-addon" style="border-bottom: 1px solid #5f5f5f; border-top: none; border-left: none; border-right: none;"><i class="glyphicon glyphicon-calendar"></i></span>\
                </div>\
            </div>\
            <div class="col-md-3 border-seccion">\
                <h6 class="subtitle" style="margin:9px">TIEMPO DURACIÓN <i class="danger">*</i></h6>\
                    <script> combocertificado(); </script>\
                    <select data-placeholder="DURACION" class="chosen-select-deselect cbx_grado1" tabindex="2" name="cbx_duracion" id="cbx_duracion">\
                        <option value=""></option>\
                        <option value="1">1 MES</option>\
                        <option value="2">2 MES</option>\
                        <option value="3">3 MES</option>\
                        <option value="4">4 MES</option>\
                        <option value="5">5 MES</option>\
                        <option value="6">6 MES</option>\
                        <option value="7">7 MES</option>\
                        <option value="8">8 MES</option>\
                        <option value="9">9 MES</option>\
                        <option value="10">10 MES</option>\
                        <option value="11">11 MES</option>\
                        <option value="12">12 MES</option>\
                    </select>\
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

function date_activate(parameter){
    var fechas = '.date_'+parameter;
    console.log(fechas);
    $(fechas).datepicker({ 
        autoclose: true, 
        todayHighlight: true,
        format: 'dd-mm-yyyy'
    }).datepicker('update', new Date());
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
                //console.log(array);
                subida_ajax(array);
            }
        }else if(MCON_NUMERO2.length == 0 && MCON_NUMERO1.length != 0){
            if(MCON_MODALIDAD1 ==''){
                var mensaje = 'Debe ingresar la modalidad del ingreso1'; swal_mensaje_error(mensaje); return false;
            }else{
                array.push(MPERS_NUMDOC,MCON_FECHA1,MCON_NUMERO1,MCON_MODALIDAD1,'','','','1','1');
                //console.log(array);
                subida_ajax(array);
            }
        }else{
            var mensaje = 'Debe ingresar sólo un número de contrato'; swal_mensaje_error(mensaje); return false;
        }

      var checkBox = document.getElementById("chk_adenda");

      if (checkBox.checked == true){
        var nFilas_childs = $(".datos_certificados .row-agregado-certificado").length;
        var array_adenda = new Array();
        array_adenda.push(MPERS_NUMDOC,nFilas_childs);

        for (var i = 1; i <= nFilas_childs; i++) {
            var TXT_NUMADENDA   = $('.datos_certificados .row-agregado-certificado:nth-child('+i+') input#num_adenda1').val();
            var CBX_TDURACION   = $(".datos_certificados .row-agregado-certificado:nth-child("+i+") #cbx_duracion").find('option:selected').text();
            var CBX_FECHA       = $(".datos_certificados .row-agregado-certificado:nth-child("+i+") .fecha_emision input").val();
            if(TXT_NUMADENDA.length == 0){
                var mensaje = 'Debe Ingresar el número de adenda'; swal_mensaje_error(mensaje); return false;
            }else if(CBX_FECHA.length == 0){
                var mensaje = 'Debe Ingresar la fecha de ingreso'; swal_mensaje_error(mensaje); return false;
            }
            array_adenda.push(TXT_NUMADENDA,CBX_FECHA,CBX_TDURACION);
        } //FOR

        console.log(array_adenda);
  
        $.ajax({
            type: 'POST',
            url: './public/user/ajax/secciones/seccioniv.php?action=checkbox',
            data: { 'data2':JSON.stringify(array_adenda) } ,
            beforeSend: function(objeto){
                before_process();
            },
            success: function (response) {
                console.log(response);
                //if(response ==0){
                //    subida_realizada(0);
                //} else{
                //    after_process();
                //    var mensaje = 'El usuario ya ha sido registrado';
                //    swal_mensaje_error(mensaje); /*console.log(mensaje);*/ return false;
                //    //console.log("ya esa ingresado");
                //}
            },
           error: function () {
                alert("error");
            }
        }); //AJAX

      } // IF CHEKBOX


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

function subida_realizada_array(i){
    var MPERS_NUMDOC=$('#dni').val();
    var nFilas_childs = $(".datos_certificados .row-agregado-certificado").length;
    var MOBJ_ID='5';
    var NOMBRE='ADENDAS';
  
    var archivos = [];  
  
    for (var m = 1; m <= nFilas_childs; m++) {
        var input = $('.datos_certificados .row-agregado-certificado:nth-child('+m+') input.hidden').val();
        archivos.push({dni:MPERS_NUMDOC, obj:MOBJ_ID, nom:NOMBRE, arc: '23'+'.'+i, fil: input  });
    }
  
    console.log(archivos);
  
    var inew= Number(i)+1;
    var maxi= Number(archivos.length);
  
    //console.log(inew);
    //console.log(maxi);
  
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
//        subida_realizada_array(0);
        after_process();
        var mensaje = "Se guardo el registro satisfactoriamente";
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
