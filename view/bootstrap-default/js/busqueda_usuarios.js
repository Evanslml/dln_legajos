
  var $ = jQuery.noConflict();
  $(document).ready(function(){

        load(1);

  });

  function load(page){
    
          $.ajax({
              url:'./public/user/ajax/Usuarios.php?action=ajax&page='+page,
               beforeSend: function(objeto){
               $('#loader').html('<img src="./view/bootstrap-default/img/ajax-loader.gif"> Cargando...');
              },
              success:function(data){
                $(".outer_div").html(data).fadeIn('slow');
                //console.log(data);
                $('#loader').html('');
              }
          });
  }

