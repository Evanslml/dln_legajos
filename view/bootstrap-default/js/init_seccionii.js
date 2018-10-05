var $ = jQuery.noConflict();
$(document).ready(function () {

    $(function () {
        $("#btnAdd-study").bind("click", function () {
            var div = $("<div class='row-agregado-study'>");
            div.html(AddDateStudy(""));
            $(".datos_estudios").append(div);
        });
        $("body").on("click", ".remove-study", function () {
            $(this).closest(".row-agregado-study").remove();
        });
    });

    $('.btn-save').click(function (evt) {
        console.log(save_click);
        if (save_click == 0) {
          evt.preventDefault();
          get_data_form();
        } else {
          console.log("Envio de varios clicks")
        }
        save_click += 1;
    });

}); /*FIN READY FUNCTION*/

var save_click = 0;
/*********************************************************************************************************************************/
//FUNCIONES DATOS DE FORMULARIO
/*********************************************************************************************************************************/
function AddDateStudy(value) {
    return '<div class="col-md-3 border-seccion">\
                <h6 class="subtitle pad-top-10">GRADO DE INSTRUCCIÓN <i class="danger">*</i></h6>\
                  <script> combogrado(); </script>\
                  <select data-placeholder="GRADO DE INSTRUCCIÓN" class="chosen-select-deselect cbx_grado1" tabindex="2" name="cbx_grado_instruccion" id="cbx_grado_instruccion">\
                      <option value=""></option>\
                      <option value="17">PRIMARIA</option> <option value="18">SECUNDARIA</option> <option value="19">SUPERIOR NO UNIV. (INCOM.)</option> <option value="20">SUPERIOR NO UNIV. (COMPL.)</option> <option value="21">SUPERIOR UNIV. (INCOM.)</option> <option value="22">SUPERIOR UNIV. (COMPL.)</option> <option value="23">BACHILLER</option> <option value="24">TITULADO</option> <option value="25">LICENCIATURA</option> <option value="26">MAESTRIA</option> <option value="27">DOCTORADO</option> <option value="28">COLEGIATURA</option>\
                  </select>\
            </div>\
            <div class="col-md-3 border-seccion">\
                <div class="group">\
                  <input class="inputMaterial" type="text"  id="txt_estudios" name="txt_estudios" required>\
                  <span class="highlight"></span>\
                  <span class="bar"></span>\
                  <label>ESTUDIOS <i class="danger">*</i></label>\
                </div>\
            </div>\
            <div class="col-md-3 border-seccion">\
                <div class="group">\
                  <input class="inputMaterial" type="text"  id="txt_especialidad" name="txt_especialidad" required>\
                  <span class="highlight"></span>\
                  <span class="bar"></span>\
                  <label>ESPECIALIDAD</label>\
                </div>\
            </div>\
            <div class="col-md-3 border-seccion">\
                <div class="group">\
                  <input class="inputMaterial" type="text"  id="txt_casa_estudios" name="txt_casa_estudios" required>\
                  <span class="highlight"></span>\
                  <span class="bar"></span>\
                  <label>CASA DE ESTUDIOS <i class="danger">*</i></label>\
                </div>\
                <button type="button" class="btn btn-danger remove-study" style="position: absolute;top: 20px;right: -10px;"><i class="glyphicon glyphicon-remove-sign"></i></button>\
            </div>\
            ';
}
function combogrado() {
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

    var nFilas_childs = $(".datos_estudios .row-agregado-study").length;
    var MPERS_NUMDOC = $('#dni').val();
    var form_edit = $('.form_edit').val();

    if (MPERS_NUMDOC == '') {
        var mensaje = 'Debe ingresar número de documento'; swal_mensaje_error(mensaje); return false;
    } else if (!isNumeric(MPERS_NUMDOC) || MPERS_NUMDOC.length != 8) {
        var mensaje = 'Verifique el número de documento'; swal_mensaje_error(mensaje); return false;
    } else {

        var array = new Array();
        array.push(MPERS_NUMDOC, nFilas_childs);

        for (var i = 1; i <= nFilas_childs; i++) {
            var MESTU_ITEM = $(".datos_estudios .row-agregado-study:nth-child(" + i + ") #cbx_grado_instruccion").find('option:selected').prop('value');
            var MESTU_DESC = $('.datos_estudios .row-agregado-study:nth-child(' + i + ') input#txt_estudios').val().toUpperCase();
            var MESTU_ESPE = $('.datos_estudios .row-agregado-study:nth-child(' + i + ') input#txt_especialidad').val().toUpperCase();
            var MESTU_UBIC = $(".datos_estudios .row-agregado-study:nth-child(" + i + ") input#txt_casa_estudios").val().toUpperCase();
            if (MESTU_ITEM.length == 0) {
                var mensaje = 'Debe Ingresar el Grado de instrucción'; swal_mensaje_error(mensaje); return false;
            } else if (MESTU_DESC.length == 0) {
                var mensaje = 'Debe Ingresar los estudios realizados'; swal_mensaje_error(mensaje); return false;
            } else if (MESTU_UBIC.length == 0) {
                var mensaje = 'Debe Ingresar la casa de estudios'; swal_mensaje_error(mensaje); return false;
            }
            array.push(MESTU_ITEM, MESTU_DESC, MESTU_ESPE, MESTU_UBIC);
        }

        if (form_edit == 0) {
            var link = './public/user/ajax/secciones/seccionii.php?action=formulario&tipo=0';
          } else {
            var link = './public/user/ajax/secciones/seccionii.php?action=formulario&tipo=1';
          }
          
        $.ajax({
            type: 'POST',
            url: link,
            data: { 'data1': JSON.stringify(array) },
            beforeSend: function (objeto) {
                before_process();
            },
            success: function (response) {
                //console.log(response);
                if (response == 0) {
                    subida_realizada(0);
                } else {
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

    }//Else
}
/*********************************************************************************************************************************/
//LOAD IMAGES
/*********************************************************************************************************************************/
function subida_realizada(i) {
    var MPERS_NUMDOC = $('#dni').val();
    var MOBJ_ID = '3';

    var archivos = [
        { dni: MPERS_NUMDOC, obj: MOBJ_ID, nom: 'CURRICULUM VITAE', arc: '01', num: '0201' },
        { dni: MPERS_NUMDOC, obj: MOBJ_ID, nom: 'CERTIFICADO DE ESTUDIOS', arc: '02', num: '0202' },
        { dni: MPERS_NUMDOC, obj: MOBJ_ID, nom: 'TITULO / DOCTORADO / OTROS', arc: '03', num: '0203' },
        { dni: MPERS_NUMDOC, obj: MOBJ_ID, nom: 'HABILIDAD PROFESIONAL', arc: '04', num: '0204' }
    ];

    var inew = Number(i) + 1;
    var maxi = archivos.length

    if (inew <= maxi) {
        for (var n = i; i < inew; i++) {
            //console.log(archivos[i].num);
            subida_archivos(archivos[i].dni, archivos[i].obj, archivos[i].nom, archivos[i].arc, archivos[i].num, i);
        }
    } else {
        save_click = 0;
        console.log(save_click);
        after_process();
        var mensaje = "Se guardo el registro satisfactoriamente";
        swal_mensaje_success(mensaje);
    }

}

function subida_archivos(dni, obj, nombre, arch, num, i) {
    var form_edit = $('.form_edit').val();
    var formulario = '.formulario_' + num;
    var file = '#file-' + num;
    var archivo = formulario + ' ' + file;
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
        formData.append('MPERS_NUMDOC', MPERS_NUMDOC);
        formData.append('MADJ_NOMBRES', MADJ_NOMBRES);
        formData.append('MOBJ_ID', MOBJ_ID);
        formData.append('MADJ_URL', fileName);
        formData.append('MARCH_ID', arch);

        if (form_edit == 0) {
            var link = './public/user/ajax/includes/upload.php?type=data_imagen&tipo=0';
        } else {
            var link = './public/user/ajax/includes/upload.php?type=data_imagen&tipo=1';
        }

        $.ajax({
            url: link,
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                var inew = Number(i) + 1;
                subida_realizada(inew);
            },
        });
    } else {
        //console.log("error");
        var inew = Number(i) + 1;
        subida_realizada(inew);
    }

}
