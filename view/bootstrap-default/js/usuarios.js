  var $ = jQuery.noConflict();
  $(document).ready(function(){

  	$(".save_user").click(function(evt){
  		evt.preventDefault();
  		get_data_form();	
  	});
  	
function get_data_form(){

    var MUSU_NOMBRES		=$('#u_nombre').val();
    var MUSU_APELLIDO_PAT 	=$('#u_apellido_p').val();
    var MUSU_APELLIDO_MAT 	=$('#u_apellido_m').val();
    var MUSU_DNI			=$('#u_dni').val();
    var MUSU_CORREO			=$('#u_usuario').val();
    var MUSU_PASSWORD1 		=$('#u_pass_1').val();
    var MUSU_PASSWORD2 		=$('#u_pass_2').val();

    if(MUSU_PASSWORD1 == '' || MUSU_PASSWORD2 ==''){
      var mensaje = 'No debe estar vacio el campo para contraseña'; swal_mensaje_error(mensaje); return false;
    }else if(MUSU_PASSWORD1 != MUSU_PASSWORD2){
      var mensaje = 'No coincide las contraseñas'; swal_mensaje_error(mensaje); return false;
    }else{
    	var array = new Array();
    	array.push(MUSU_NOMBRES,MUSU_APELLIDO_PAT,MUSU_APELLIDO_MAT,MUSU_DNI,MUSU_CORREO,MUSU_PASSWORD1);
    
    	$.ajax({
	          type: 'POST',
	          url: './public/user/ajax/Usuarios.php?action=update',
	          data: { 'data1':JSON.stringify(array) } ,
	          beforeSend: function(objeto){
	              before_process();
	          },
	          success: function (response) {
                  after_process();
                  console.log(response);
                  var mensaje = 'Los datos del usuario han sido actualizados';
      			  swal_mensaje_success(mensaje);
	          },
	         error: function () {
	              alert("error");
	          }
	    }); 
    
    }




}



  });