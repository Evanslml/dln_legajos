  var $ = jQuery.noConflict();
  $(document).ready(function(){

      $("#fecha_nacimiento").datepicker({ 
        autoclose: true, 
        todayHighlight: true,
        format: 'dd-mm-yyyy'
      }).datepicker('update', '01-01-1970');

      $("#fecha_regimen").datepicker({ 
        autoclose: true, 
        todayHighlight: true,
        format: 'dd-mm-yyyy'
      }).datepicker('update', new Date());

      $("#fecha_ingreso").datepicker({ 
        /*format: "mm-yyyy",*/
        /*viewMode: "months", */
        /*minViewMode: "months"*/
        autoclose: true, 
        todayHighlight: true,
        format: 'dd-mm-yyyy'
      }).datepicker('update', new Date());

      formatdate();

      $('.type-price').priceFormat({
          prefix: 'S/. ',
          centsSeparator: '.',
          thousandsSeparator: ','
      });

      $(function () {
          $("#btnAdd-child").bind("click", function () {
              var div = $("<div class='row-agregado-child'>");
              div.html(AddDateChilds(""));
              $(".datos_hijos").append(div);
          });
          $("#btnAdd-address").bind("click", function () {
              var div = $("<div class='row-agregado-address'>");
              div.html(AddDateAddres(""));
              $(".datos_direccion").append(div);
          });
         $("body").on("click", ".remove-child", function () {
              $(this).closest(".row-agregado-child").remove();
          });
         $("body").on("click", ".remove-address", function () {
              $(this).closest(".row-agregado-address").remove();
          });
      });

   $('#cbx_departamento').on('change', function(evt, params) {
    reset_distrito();
/*  MULTIPLE
    var SelectedIds = $(this).find('option:selected').map(function () {return $(this).prop('value') }).get(); console.log(SelectedIds);
*/
    var Id_departamento= $(this).find('option:selected').prop('value');
    var texto_departamento= $(this).siblings('.chosen-container').find("span").text();
//https://stackoverflow.com/questions/32757874/how-can-i-load-data-from-ajax-to-chosen-jquery
//https://es.stackoverflow.com/questions/40754/crear-elementos-del-dom-con-jquery
      $.ajax({
              type: 'POST',
              url: './public/user/ajax/includes/get_ubicacion.php?action=get_provincia',
              data: { Id_departamento: Id_departamento } ,
              success: function (data) {
                  var temporal_provincial = $(".col-provincia .temporal_provincia");
                  temporal_provincial.remove();

                  $("<div>", {
                      'class': 'temporal_provincia'
                  }).append(
                      $('<h6>', {
                          'class': 'subtitle',
                          'text': 'PROVINCIA'
                      }),
                      $('<select>', {
                          'data-placeholder': 'Provincia',
                          'name':'cbx_provincia',
                          'id':'cbx_provincia',
                          'class':'chosen-select-deselect'
                      })

                  ).appendTo('.col-provincia');

                  var $select_elem = $("#cbx_provincia");
                  $select_elem.empty();
                  $select_elem.html(data);
                  $select_elem.chosen({
                    allow_single_deselect: true,
                    disable_search_threshold: 10,
                    no_results_text: "Oops, ningun resultado",
                    width: "95%"
                  });
                  //$select_elem.chosen({ width: "95%" });
                  get_distrito();
              },
              error: function () {
                  alert("error");
              }
            }); 
  });



   $('.btn-save').click(function(evt){
      evt.preventDefault();
      get_data_form();
   });


  }); /*FIN READY FUNCTION*/ 


/*********************************************************************************************************************************/
//FUNCIONES DATOS DE FORMULARIO
/*********************************************************************************************************************************/
  function AddDateAddres(value) {
      return '<div class="col-md-4 border-seccion">\
                <div class="group">\
                  <input class="inputMaterial" type="text"  id="domicilio" name="domicilio" required>\
                  <span class="highlight"></span>\
                  <span class="bar"></span>\
                  <label>DOMICILIO</label>\
                </div>\
            </div>\
            <div class="col-md-3 border-seccion">\
                <h6 class="subtitle pad-top-10">DISTRITO</h6>\
                  <script> combodistrito(); </script>\
                  <select data-placeholder="Departamento" class="chosen-select-deselect cbx_distrito1" tabindex="2" name="cbx_distrito_filial" id="cbx_distrito_filial">\
                      <option value=""></option>\
                      <option value="150101">LIMA</option><option value="150102">ANCON</option><option value="150103">ATE</option><option value="150104">BARRANCO</option><option value="150105">BREÑA</option><option value="150106">CARABAYLLO</option><option value="150107">CHACLACAYO</option><option value="150108">CHORRILLOS</option><option value="150109">CIENEGUILLA</option><option value="150110">COMAS</option><option value="150111">EL AGUSTINO</option><option value="150112">INDEPENDENCIA</option><option value="150113">JESUS MARIA</option><option value="150114">LA MOLINA</option><option value="150115">LA VICTORIA</option><option value="150116">LINCE</option><option value="150117">LOS OLIVOS</option><option value="150118">LURIGANCHO</option><option value="150119">LURIN</option><option value="150120">MAGDALENA DEL MAR</option><option value="150121">PUEBLO LIBRE</option><option value="150122">MIRAFLORES</option><option value="150123">PACHACAMAC</option><option value="150124">PUCUSANA</option><option value="150125">PUENTE PIEDRA</option><option value="150126">PUNTA HERMOZA</option><option value="150127">PUNTA NEGRA</option><option value="150128">RIMAC</option><option value="150129">SAN BARTOLO</option><option value="150130">SAN BORJA</option><option value="150131">SAN ISIDRO</option><option value="150132">SAN JUAN DE LURIGANCHO</option><option value="150133">SAN JUAN DE MIRAFLORES</option><option value="150134">SAN LUIS</option><option value="150135">SAN MARTIN DE PORRES</option><option value="150136">SAN MIGUEL</option><option value="150137">SANTA ANITA</option><option value="150138">SANTA MARIA DEL MAR</option><option value="150139">SANTA ROSA</option><option value="150140">SANTIAGO DE SURCO</option><option value="150141">SURQUILLO</option><option value="150142">VILLA EL SALVADOR</option><option value="150143">VILLA MARIA DEL TRIUNFO</option><option value="150201">BARRANCA</option><option value="150202">PARAMONGA</option><option value="150203">PATIVILCA</option><option value="150204">SUPE</option><option value="150205">SUPE PUERTO</option><option value="150301">CAJATAMBO</option><option value="150302">COPA</option><option value="150303">GONGOR</option><option value="150304">HUANCAPON</option><option value="150305">MANAS</option><option value="150401">CANTA</option><option value="150402">ARAHUAY</option><option value="150403">HUAMANTANGA</option><option value="150404">HUAROS</option><option value="150405">LACHAQUI</option><option value="150406">SAN BUENAVENTURA</option><option value="150407">SANTA ROSA DE QUIVES</option><option value="150501">SAN VICENTE DE CA?ETE</option><option value="150502">ASIA</option><option value="150503">CALANGO</option><option value="150504">CERRO AZUL</option><option value="150505">CHILCA</option><option value="150506">COAYLLO</option><option value="150507">IMPERIAL</option><option value="150508">LUNAHUANA</option><option value="150509">MALA</option><option value="150510">NUEVO IMPERIAL</option><option value="150511">PACARAN</option><option value="150512">QUILMANA</option><option value="150513">SAN ANTONIO</option><option value="150514">SAN LUIS</option><option value="150515">SANTA CRUZ DE FLORES</option><option value="150516">ZU?IGA</option><option value="150601">HUARAL</option><option value="150602">ATAVILLOS ALTO</option><option value="150603">ATAVILLOS BAJO</option><option value="150604">AUCALLAMA</option><option value="150605">CHANCAY</option><option value="150606">IHUARI</option><option value="150607">LAMPIAN</option><option value="150608">PACARAOS</option><option value="150609">SAN MIGUEL DE ACOS</option><option value="150610">SANTA CRUZ DE ANDAMARCA</option><option value="150611">SUMBILCA</option><option value="150612">VEINTISIETE DE NOVIEMBRE</option><option value="150701">MATUCANA</option><option value="150702">ANTIOQUINA</option><option value="150703">CALLAHUANCA</option><option value="150704">CARAMPOMA</option><option value="150705">CHICLA</option><option value="150706">CUENCA</option><option value="150707">HUACHUPAMPA</option><option value="150708">HUANZA</option><option value="150709">HUAROCHIRI</option><option value="150710">LAHUAYTAMBO</option><option value="150711">LANGA</option><option value="150712">LARAOS</option><option value="150713">MARIATANA</option><option value="150714">RICARDO PALMA</option><option value="150715">SAN ANDRES DE TUPICOCHA</option><option value="150716">SAN ANTONIO</option><option value="150717">SAN BARTOLOME</option><option value="150718">SAN DAMIAN</option><option value="150719">SAN JUAN DE IRIS</option><option value="150720">SAN JUAN DE TANTARACHE</option><option value="150721">SAN LOREZO DE QUINTI</option><option value="150722">SAN MATEO</option><option value="150723">SAN MATEO DE OTAO</option><option value="150724">SAN PEDRO DE CASTA</option><option value="150725">SAN PEDRO DE HUANCAYRE</option><option value="150726">SANGALLAYA</option><option value="150727">SANTA CRUZ DE COCACHACRA</option><option value="150728">SANTA EULALIA</option><option value="150729">SANTIAGO DE ANCHUCAYA</option><option value="150730">SANTIAGO DE TUNA</option><option value="150731">STO DMGO DE LOS OLLEROS</option><option value="150732">SURCO</option><option value="150801">HUACHO</option><option value="150802">AMBAR</option><option value="150803">CALETA DE CARQUIN</option><option value="150804">CHECRAS</option><option value="150805">HUALMAY</option><option value="150806">HUAURA</option><option value="150807">LEONCIO PRADO</option><option value="150808">PACCHO</option><option value="150809">SANTA LEONOR</option><option value="150810">SANTA MARIA</option><option value="150811">SAYAN</option><option value="150812">VEGUETA</option><option value="150901">OYON</option><option value="150902">ANDAJES</option><option value="150903">CAUJUL</option><option value="150904">COCHAMARCA</option><option value="150905">NAVAN</option><option value="150906">PACHANGARA</option><option value="151001">YAUYOS</option><option value="151002">ALIS</option><option value="151003">AYAUCA</option><option value="151004">AYAVIRI</option><option value="151005">AZANGARO</option><option value="151006">CACRA</option><option value="151007">CARANIA</option><option value="151008">CATAHUASI</option><option value="151009">CHOCOS</option><option value="151010">COCHAS</option><option value="151011">COLONIA</option><option value="151012">HONGOS</option><option value="151013">HUAMPARA</option><option value="151014">HUANCAYA</option><option value="151015">HUANGASCAR</option><option value="151016">HUANTAN</option><option value="151017">HUA?EC</option><option value="151018">LARAOS</option><option value="151019">LINCHA</option><option value="151020">MADEAN</option><option value="151021">MIRAFLORES</option><option value="151022">OMAS</option><option value="151023">PUTINZA</option><option value="151024">QUINCHES</option><option value="151025">QUINOCAY</option><option value="151026">SAN JOAQUIN</option><option value="151027">SAN PEDRO DE PILAS</option><option value="151028">TANTA</option><option value="151029">TAURIPAMPA</option><option value="151030">TOMAS</option><option value="151031">TUPE</option><option value="151032">VI?AC</option><option value="151033">VITIS</option> \
                  </select>\
            </div>\
            <div class="col-md-3 border-seccion">\
              <div class="group">      \
                  <input class="inputMaterial" type="text"  id="referencia" name="referencia" required>\
                  <span class="highlight"></span>\
                  <span class="bar"></span>\
                  <label>REFERENCIA</label>\
              </div>\
            </div>\
            <div class="col-md-2 border-seccion relative">\
                <div class="group">      \
                  <input class="inputMaterial" type="text"  id="num_telefono" name="num_telefono">\
                  <span class="highlight"></span>\
                  <span class="bar"></span>\
                  <label>TELEFONO</label>\
                </div>\
                <button type="button" class="btn btn-danger remove-address" style="position: absolute;top: 20px;right: -10px;"><i class="glyphicon glyphicon-remove-sign"></i></button>\
            </div>';
  }

  function AddDateChilds(value) {
      return '<div class="col-md-7 border-seccion">\
                <div class="row">\
                  <div class="col-md-6">\
                    <div class="group">\
                      <div>\
                          <input class="inputMaterial" type="text" id="apellidos_hijo" name="apellidos_hijo" required="">\
                          <span class="highlight"></span>\
                          <span class="bar"></span>\
                          <label>APELLIDOS</label>\
                      </div>\
                    </div>\
                  </div>\
                  <div class="col-md-6">\
                    <div class="group">\
                      <div>\
                          <input class="inputMaterial" type="text" id="nombres_hijo" name="nombres_hijo" required="">\
                          <span class="highlight"></span>\
                          <span class="bar"></span>\
                          <label>APELLIDOS</label>\
                      </div>\
                    </div>\
                  </div>\
                </div>\
              </div>\
              <div class="col-md-2 border-seccion">\
                  <div class="fecha_hijo input-group date" data-date-format="mm-dd-yyyy" style="margin-top: 42px;">\
                      <input class="form-control" type="text" readonly="" style="font-size: 18px; border-bottom: 1px solid #5f5f5f; border-top: none; border-left: none; border-right: none; background: #fff;"> \
                      <span class="input-group-addon" style="border-bottom: 1px solid #5f5f5f; border-top: none; border-left: none; border-right: none;">\
                        <i class="glyphicon glyphicon-calendar"></i></span>\
                  </div>\
                  <script> formatdate(); </script>\
              </div>\
              <div class="col-md-1 border-seccion" style="padding-top: 31px;">\
                    <script> combosexo(); </script>\
                    <select data-placeholder="SEXO" class="chosen-select cbx_sexo1" tabindex="2" name="cbx_sexo_child" id="cbx_sexo_child">\
                          <option value=""></option>\
                          <option value="7">F</option>\
                          <option value="8">M</option>\
                    </select>\
              </div>\
              <div class="col-md-2 border-seccion" style="position:relative">\
                  <div class="group">\
                        <input class="inputMaterial" type="text" id="txt_essalud_child" name="txt_essalud_child">\
                        <span class="highlight"></span>\
                        <span class="bar"></span>\
                        <label></label>\
                  </div>\
              <button type="button" class="btn btn-danger remove-child" style="position: absolute;top: 20px;right: -10px;"><i class="glyphicon glyphicon-remove-sign"></i></button>\
              </div>';
  }

  function formatdate(){
    $(".fecha_hijo").datepicker({ 
        autoclose: true, 
        todayHighlight: true,
        format: 'dd-mm-yyyy'
    });
  }

  function combosexo(){
    var $select_elem = $(".cbx_sexo1");
    $select_elem.chosen({
      allow_single_deselect: false,
      disable_search_threshold: 10,
      no_results_text: "Oops, ningun resultado",
      width: "95%"
    });
  }

  function combodistrito(){
    var $select_elem = $(".cbx_distrito1");
    $select_elem.chosen({
      allow_single_deselect: false,
      disable_search_threshold: 10,
      no_results_text: "Oops, ningun resultado",
      width: "95%"
    });
  }

/*********************************************************************************************************************************/
//FUNCIONES COMBO 
/*********************************************************************************************************************************/

  function get_distrito(){
   $('#cbx_provincia').on('change', function(evt, params) {
        var Id_provincia= $(this).find('option:selected').prop('value');
        var texto_provincia= $(this).siblings('.chosen-container').find("span").text();
        $.ajax({
                type: 'POST',
                url: './public/user/ajax/includes/get_ubicacion.php?action=get_distrito',
                data: { Id_provincia: Id_provincia } ,
                success: function (data) {
                    reset_distrito(data);
                    //$select_elem.chosen({ width: "95%" });
                },
                error: function () {
                    alert("error");
                }
              }); 
    });
  }

  function reset_distrito($data){
      var temporal_distrito = $(".col-distrito .temporal_distrito");
      temporal_distrito.remove();

      $("<div>", {
          'class': 'temporal_distrito'
      }).append(
          $('<h6>', {
              'class': 'subtitle',
              'text': 'DISTRITO'
          }),
          $('<select>', {
              'data-placeholder': 'Distrito',
              'name':'cbx_distrito',
              'id':'cbx_distrito',
              'class':'chosen-select-deselect'
          })

      ).appendTo('.col-distrito');
      //).hide().appendTo('.col-distrito').fadeIn('fast');

      var $select_elem = $("#cbx_distrito");
      $select_elem.empty();
      $select_elem.html($data);
      $select_elem.chosen({
        allow_single_deselect: true,
        disable_search_threshold: 10,
        no_results_text: "Oops, ningun resultado",
        width: "95%"
      });
  }

/*********************************************************************************************************************************/
//FUNCIONES 
/*********************************************************************************************************************************/

function get_data_form(){
    //console.log("function seleccionado");
    //$('#btn-save a').attr("disabled", true);

    var nFilas_address = $(".datos_direccion .row-agregado-address").length;
    var nFilas_childs = $(".datos_hijos .row-agregado-child").length;

    var MPERS_APEPAT=$('#ape_pat').val().toUpperCase();
    var MPERS_APEMAT=$('#ape_mat').val().toUpperCase();
    var MPERS_NOMBRES=$('#nombres').val().toUpperCase();
    var MPERS_TIPDOC='1';
    var MPERS_NUMDOC=$('#dni').val();
    var MPERS_TIPOPER='1';
    var MDEPA_ID=$('#cbx_departamento').find('option:selected').prop('value');
    var MPROV_ID=$('#cbx_provincia').find('option:selected').prop('value');
    var MDIST_ID=$('#cbx_distrito').find('option:selected').prop('value');
    var MPERS_FECNAC=$('#fecha_nacimiento input').val();
    var MPERS_NACIONAL=$('#nacionalidad').val().toUpperCase();
    var MPERS_SEXO=$('#cbx_sexo').find('option:selected').prop('value');
    var MPERS_ESTACIVIL=$('#cbx_est_civil').find('option:selected').prop('value');
    var MPERS_NOMCONYU=$('#nombre_conyugue').val().toUpperCase();
    var MPERS_GRADINST=$('#grado_instruccion').find('option:selected').prop('value');
    var MPERS_PROFESION=$('#profesion').val().toUpperCase();
    var MPERS_ESPECIALID=$('#especialidad').val().toUpperCase();
    var MPERS_MONTO=$('#monto').val();
    var MPERS_MONTO=MPERS_MONTO.slice(4);
    var MCARG_CODIGO=$('#cbx_cargo').find('option:selected').prop('value');
    var MPERS_REGPENSION=$('#cbx_reg_pensiones').find('option:selected').prop('value');
    var MPERS_REGLABORAL=$('#cbx_reg_laboral').find('option:selected').prop('value');
    var MPERS_NIVREMUN=$('#nivel_remunerativo').val().toUpperCase();
    var MPERS_FECREGIMEN=$('#fecha_regimen input').val().toUpperCase();
    var MEST_CODIGO=$('#cbx_establecimiento').find('option:selected').prop('value');
    var MPERS_EMAIL=$('#correo').val().toUpperCase();
    var MPERS_GRUPOCUPAC=$('#cbx_grupo_ocupacional').find('option:selected').prop('value');
    var MPERS_NUMUBI=$('#num_ubicacion').val();
    var MPERS_FECINGR=$('#fecha_ingreso input').val();
    var MPERS_NUMCONTRA=$('#num_contrato').val().toUpperCase();
    var MPERS_NUMRUC=$('#num_ruc').val();
    var MPERS_TELMOVIL=$('#num_celular').val();
    var MPERS_NOMPADRE=$('#datos_padre').val().toUpperCase();
    var MPERS_NOMMADRE=$('#datos_madre').val().toUpperCase();
    var MPERS_DOMPADRES=$('#domicilio_padres').val().toUpperCase();
    var MPERS_TELPADRES=$('#num_padres').val();

    if(MPERS_APEPAT ==''){
      var mensaje = 'Debe ingresar el apellido paterno'; swal_mensaje_error(mensaje); /*console.log(mensaje);*/ return false;
    }else if(MPERS_APEMAT ==''){
      var mensaje = 'Debe ingresar el apellido materno'; swal_mensaje_error(mensaje); /*console.log(mensaje);*/ return false;
    }else if(MPERS_NOMBRES ==''){
      var mensaje = 'Debe ingresar nombre completo'; swal_mensaje_error(mensaje); /*console.log(mensaje);*/ return false;
    }else if(MPERS_NUMDOC ==''){
      var mensaje = 'Debe ingresar número de documento'; swal_mensaje_error(mensaje); /*console.log(mensaje);*/ return false;
    }else if(!isNumeric(MPERS_NUMDOC) || MPERS_NUMDOC.length != 8 ){
      var mensaje = 'Verifique el número de documento'; swal_mensaje_error(mensaje); /*console.log(mensaje);*/ return false;
    }else if(MDEPA_ID =='' || MPROV_ID =='' || MDIST_ID ==''){
      var mensaje = 'Debe seleccionar lugar de nacimiento'; swal_mensaje_error(mensaje); /*console.log(mensaje);*/ return false;
    }else if(MPERS_NACIONAL ==''){
      var mensaje = 'Debe ingresar la nacionalidad'; swal_mensaje_error(mensaje); /*console.log(mensaje);*/ return false;
    }else if(MPERS_SEXO ==''){
      var mensaje = 'Debe seleccionar el sexo'; swal_mensaje_error(mensaje); /*console.log(mensaje);*/ return false;
    }else if (MPERS_ESTACIVIL ==''){
      var mensaje = 'Debe seleccionar el estado civil'; swal_mensaje_error(mensaje); /*console.log(mensaje);*/ return false;
    }else if (MPERS_GRADINST ==''){
      var mensaje = 'Debe seleccionar el grado de instrucción'; swal_mensaje_error(mensaje); /*console.log(mensaje);*/ return false;
    }else if (MPERS_MONTO =='0.00'){
      var mensaje = 'Debe ingresar un monto'; swal_mensaje_error(mensaje); /*console.log(mensaje);*/ return false;
    }else if (MCARG_CODIGO ==''){
      var mensaje = 'Debe seleccionar el cargo'; swal_mensaje_error(mensaje); /*console.log(mensaje);*/ return false;
    }else if (MPERS_EMAIL !=='' && !validateEmail(MPERS_EMAIL)){
      var mensaje = 'Correo no valido'; swal_mensaje_error(mensaje); /*console.log(mensaje);*/ return false;
    }else if (MPERS_REGPENSION ==''){
      var mensaje = 'Debe seleccionar el regimen de pensiones'; swal_mensaje_error(mensaje); /*console.log(mensaje);*/ return false;
    }else if (MPERS_REGLABORAL ==''){
      var mensaje = 'Debe seleccionar el regimen laboral'; swal_mensaje_error(mensaje); /*console.log(mensaje);*/ return false;
    }else if (MPERS_NIVREMUN ==''){
      var mensaje = 'Debe seleccionar el nivel de remunerativo'; swal_mensaje_error(mensaje); /*console.log(mensaje);*/ return false;
    }else if (MEST_CODIGO ==''){
      var mensaje = 'Debe seleccionar el establecimiento'; swal_mensaje_error(mensaje); /*console.log(mensaje);*/ return false;
    }else if (MPERS_GRUPOCUPAC ==''){
      var mensaje = 'Debe seleccionar el grupo ocupacional'; swal_mensaje_error(mensaje); /*console.log(mensaje);*/ return false;
    }else if (MPERS_NUMCONTRA ==''){
      var mensaje = 'Debe ingresar el Número de contrtato'; swal_mensaje_error(mensaje); /*console.log(mensaje);*/ return false;
    }else if (MPERS_NUMRUC==''){
      var mensaje = 'Debe ingresar el Número de R.U.C.'; swal_mensaje_error(mensaje); /*console.log(mensaje);*/ return false;
    }else if (!isNumeric(MPERS_NUMRUC) || MPERS_NUMRUC.length != 11){
      var mensaje = 'Debe verificar el Número de R.U.C.'; swal_mensaje_error(mensaje); /*console.log(mensaje);*/ return false;
    }else if(MPERS_NOMPADRE=='' || MPERS_NOMMADRE=='' || MPERS_DOMPADRES==''){
      var mensaje = 'Debe verificar los datos de los padres'; swal_mensaje_error(mensaje); /*console.log(mensaje);*/ return false;
    }

  else{

    var array = new Array();
    array.push(
    MPERS_APEPAT,MPERS_APEMAT,MPERS_NOMBRES,MPERS_TIPDOC,
    MPERS_NUMDOC,MPERS_TIPOPER,MDEPA_ID,MPROV_ID,MDIST_ID,MPERS_FECNAC,
    MPERS_NACIONAL,MPERS_SEXO,MPERS_ESTACIVIL,MPERS_NOMCONYU,
    MPERS_GRADINST, MPERS_PROFESION, MPERS_ESPECIALID, MPERS_MONTO, MCARG_CODIGO, MPERS_REGPENSION,
    MPERS_REGLABORAL, MPERS_NIVREMUN, MPERS_FECREGIMEN, MEST_CODIGO, MPERS_EMAIL, MPERS_GRUPOCUPAC, MPERS_NUMUBI,
    MPERS_FECINGR, MPERS_NUMCONTRA, MPERS_NUMRUC, MPERS_TELMOVIL,
    MPERS_NOMPADRE,MPERS_NOMMADRE,MPERS_DOMPADRES,MPERS_TELPADRES,
    nFilas_address,nFilas_childs
    );

        for (var i = 1; i <= nFilas_address; i++) {
              var A_MDOM_NOMBRE = $(".datos_direccion .row-agregado-address:nth-child("+i+") input#domicilio").val().toUpperCase();
              var A_MDIST_ID=$('.datos_direccion .row-agregado-address:nth-child('+i+') #cbx_distrito_filial').find('option:selected').prop('value');
              var A_MDOM_REFERENCIA = $(".datos_direccion .row-agregado-address:nth-child("+i+") input#referencia").val().toUpperCase();
              var A_MDOM_TELFIJO = $(".datos_direccion .row-agregado-address:nth-child("+i+") input#num_telefono").val();

              if(A_MDOM_NOMBRE.length == 0){
                  var mensaje = 'Debe Ingresar el Domicilio'; swal_mensaje_error(mensaje); /*console.log(mensaje);*/ return false;
              }else if(A_MDIST_ID.length == 0){
                  var mensaje = 'Debe Ingresar el Distrito'; swal_mensaje_error(mensaje); /*console.log(mensaje);*/ return false;
              }else if(A_MDOM_REFERENCIA.length == 0){
                  var mensaje = 'Debe Ingresar la referencia'; swal_mensaje_error(mensaje); /*console.log(mensaje);*/ return false;
              }

              array.push(A_MDOM_NOMBRE,A_MDIST_ID,A_MDOM_REFERENCIA,A_MDOM_TELFIJO);
        }

        for (var i = 1; i <= nFilas_childs; i++) {
              var C_MFIL_APEHIJO = $(".datos_hijos .row-agregado-child:nth-child("+i+") input#apellidos_hijo").val().toUpperCase();
              var C_MFIL_NOMHIJO = $(".datos_hijos .row-agregado-child:nth-child("+i+") input#nombres_hijo").val().toUpperCase();
              var C_MFIL_FECNAC = $(".datos_hijos .row-agregado-child:nth-child("+i+") .fecha_hijo input").val();
              var C_MFIL_SEXO=$(".datos_hijos .row-agregado-child:nth-child("+i+") #cbx_sexo_child").find("option:selected").prop("value");
              var C_MFIL_ESSALUD = $(".datos_hijos .row-agregado-child:nth-child("+i+") input#txt_essalud_child").val().toUpperCase();
              array.push(C_MFIL_APEHIJO,C_MFIL_NOMHIJO,C_MFIL_FECNAC,C_MFIL_SEXO,C_MFIL_ESSALUD);
        }

    //console.log(array);
    $.ajax({
        type: 'POST',
        url: './public/user/ajax/secciones/seccioni.php?action=formulario',
        data: { 'data1':JSON.stringify(array) } ,
        beforeSend: function(objeto){
            before_process();
        },
        success: function (response) {

            //console.log(response);
            if(response ==0){
              /*
                subida_archivos(MPERS_NUMDOC,'2','FICHA DE RESUMEN','01','1');
                subida_archivos(MPERS_NUMDOC,'2','FICHA DE ACTUALIZACIÓN DE PERSONAL','02','2');
                subida_archivos(MPERS_NUMDOC,'2','SOLICITUD DE TRABAJO','03','3');
                subida_archivos(MPERS_NUMDOC,'2','DECLARACIÓN JURADA DE BIENES Y RENTAS','04','4');
                subida_archivos(MPERS_NUMDOC,'2','CERTIFICADO DE SALUD','05','5');
                subida_archivos(MPERS_NUMDOC,'2','CERTIFICADO DE ANTECEDENTES JUDICIALES','06','6');
                subida_archivos(MPERS_NUMDOC,'2','CERTIFICADO DE ANTECEDENTES PENALES','07','7');
                subida_archivos(MPERS_NUMDOC,'2','PARTIDA DE NACIMIENTO O BAUTIZO LEGALIZADO','08','8');
                subida_archivos(MPERS_NUMDOC,'2','COPIA DE DNI O LIBRETA ELECTORAL','09','9');
                subida_archivos(MPERS_NUMDOC,'2','COPIA DE LIBRETA MILITAR','10','10');
                subida_archivos(MPERS_NUMDOC,'2','CERTIFICADO DOMICILIARIO','11','11');
                subida_archivos(MPERS_NUMDOC,'2','PARTIDA DE MATRIMONIO','12','12');
                subida_archivos(MPERS_NUMDOC,'2','PARTIDA DE NACIMIENTO DE LOS HIJOS - DNI','13','13');
                subida_archivos(MPERS_NUMDOC,'2','OTROS','14','14');
              */
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

   } //FIN ELSE



} //FUNCTION




/*********************************************************************************************************************************/
//LOAD IMAGES
/*********************************************************************************************************************************/



function subida_realizada(i){
  var MPERS_NUMDOC=$('#dni').val();    
  var MOBJ_ID='2';

  var archivos = [ 
      {dni : MPERS_NUMDOC, obj : MOBJ_ID, nom : 'FICHA DE RESUMEN', arc : '01', fil : '1'},
      {dni : MPERS_NUMDOC, obj : MOBJ_ID, nom : 'FICHA DE ACTUALIZACIÓN DE PERSONAL', arc : '02', fil : '2'},
      {dni : MPERS_NUMDOC, obj : MOBJ_ID, nom : 'SOLICITUD DE TRABAJO', arc : '03', fil : '3'},
      {dni : MPERS_NUMDOC, obj : MOBJ_ID, nom : 'DECLARACIÓN JURADA DE BIENES Y RENTAS', arc : '04', fil : '4'},
      {dni : MPERS_NUMDOC, obj : MOBJ_ID, nom : 'CERTIFICADO DE SALUD', arc : '05', fil : '5'},
      {dni : MPERS_NUMDOC, obj : MOBJ_ID, nom : 'CERTIFICADO DE ANTECEDENTES JUDICIALES', arc : '06', fil : '6'},
      {dni : MPERS_NUMDOC, obj : MOBJ_ID, nom : 'CERTIFICADO DE ANTECEDENTES PENALES', arc : '07', fil : '7'},
      {dni : MPERS_NUMDOC, obj : MOBJ_ID, nom : 'PARTIDA DE NACIMIENTO O BAUTIZO LEGALIZADO', arc : '08', fil : '8'},
      {dni : MPERS_NUMDOC, obj : MOBJ_ID, nom : 'COPIA DE DNI O LIBRETA ELECTORAL', arc : '09', fil : '9'},
      {dni : MPERS_NUMDOC, obj : MOBJ_ID, nom : 'COPIA DE LIBRETA MILITAR', arc : '10', fil : '10'},
      {dni : MPERS_NUMDOC, obj : MOBJ_ID, nom : 'CERTIFICADO DOMICILIARIO', arc : '11', fil : '11'},
      {dni : MPERS_NUMDOC, obj : MOBJ_ID, nom : 'PARTIDA DE MATRIMONIO', arc : '12', fil : '12'},
      {dni : MPERS_NUMDOC, obj : MOBJ_ID, nom : 'PARTIDA DE NACIMIENTO DE LOS HIJOS - DNI', arc : '13', fil : '13'},
      {dni : MPERS_NUMDOC, obj : MOBJ_ID, nom : 'OTROS', arc : '14', fil : '14'}
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
        //console.log("error");
        var inew = Number(i)+1;
        subida_realizada(inew);
      }

}


/*
function subida_1(){

  var file1 = $(".formulario_1 #file-1")[0].files[0];
      if (file1 !== undefined) {
          var MPERS_NUMDOC = $('#dni').val();
          var MADJ_NOMBRES = 'FICHA DE RESUMEN';
          var MOBJ_ID = '01';
          var fileName = file1.name;
          var fileSize = file1.size;
          var fileType = file1.type;
          var array = new Array();
          array.push(MPERS_NUMDOC,MADJ_NOMBRES,MOBJ_ID,fileName);

          var formData = new FormData($(".formulario_1")[0]);
          formData.append('MPERS_NUMDOC',MPERS_NUMDOC);
          formData.append('MADJ_NOMBRES',MADJ_NOMBRES);
          formData.append('MOBJ_ID',MOBJ_ID);
          formData.append('MADJ_URL',fileName);

          $.ajax({
              url: './public/user/ajax/includes/upload.php?type=data_imagen',
              type: 'POST',
              data: formData,
              cache: false,
              contentType: false,
              processData: false,
              success: function(data){
                  console.log('listo');
              },
          });

          $.ajax({
              type: 'POST',
              url: './public/user/ajax/includes/upload.php?type=datos',
              data: { 'data1':JSON.stringify(array) } ,
              success: function (response) {
                  console.log(response);
              }
          });

      }
}

*/
