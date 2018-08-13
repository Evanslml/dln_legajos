// JavaScript Document
function __(id) {
  return document.getElementById(id);
}

function VentanaCentrada(theURL,winName,features, myWidth, myHeight, isCenter) { //v3.0
  if(window.screen)if(isCenter)if(isCenter=="true"){
    var myLeft = (screen.width-myWidth)/2;
    var myTop = (screen.height-myHeight)/2;
    features+=(features!='')?',':'';
    features+=',left='+myLeft+',top='+myTop;
  }
  window.open(theURL,winName,features+((features!='')?',':'')+'width='+myWidth+',height='+myHeight);
}

function isNumeric(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}

function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function swal_mensaje_error(texto){
    swal({
          title: "Error",
          text: texto,
          type: "warning",
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Intentar nuevamente",
          closeOnConfirm: false
    });
}

function swal_mensaje_success(texto){
    swal({
        title: "Listo",
        text: texto,
        type: "success",
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    });
}

function before_process(){
    $(".loading").show();
    $(".btn-save a").attr("disabled", true);
    $(".btn-secciones a").attr("disabled", true);
    $(".btn-cancel a").attr("disabled", true);
}

function after_process(){
    $(".loading").hide();
    $(".btn-save a").attr("disabled", false);
    $(".btn-secciones a").attr("disabled", false);
    $(".btn-cancel a").attr("disabled", false);
}

$( document ).ready(function() {

    $SIDEBAR_MENU = $('#sidebar-menu'),

    $SIDEBAR_MENU.find('a').on('click', function(ev) {
    	  //console.log('clicked - sidebar_menu');
            var $li = $(this).parent();

            if ($li.is('.active')) {
                $li.removeClass('active active-sm');
                $('ul:first', $li).slideUp(function() {
                    //setContentHeight();
                });
            } else {
                // prevent closing menu if we are on child menu
                if (!$li.parent().is('.child_menu')) {
                    $SIDEBAR_MENU.find('li').removeClass('active active-sm');
                    $SIDEBAR_MENU.find('li ul').slideUp();
                }/*else
                {
    				if ( $BODY.is( ".nav-sm" ) )
    				{
    					$SIDEBAR_MENU.find( "li" ).removeClass( "active active-sm" );
    					$SIDEBAR_MENU.find( "li ul" ).slideUp();
    				}
    			}*/
                $li.addClass('active');

                $('ul:first', $li).slideDown(function() {
                   //setContentHeight();
                });
            }
        });

    //MESSAGE RESULT

/*
    $Result=$('#result').width();
    //console.log($Result);
    $('#resultMessage').width($Result);

    var delayInMilliseconds = 2000; 
    setTimeout(function() {
    $('#result').animate({width:'toggle'},350);
    }, delayInMilliseconds);
*/


/*
    $('table').keydown(function(e){
    var $table = $(this);
    var $active = $('input:focus,select:focus',$table);
    var $next = null;
    var focusableQuery = 'input:visible,select:visible,textarea:visible';
    var position = parseInt( $active.closest('td').index()) + 1;
    console.log('position :',position);
    switch(e.keyCode){
        case 37: // <Left>
            $next = $active.parent('td').prev().find(focusableQuery);   
            break;
        case 38: // <Up>                    
            $next = $active
                .closest('tr')
                .prev()                
                .find('td:nth-child(' + position + ')')
                .find(focusableQuery)
            ;
            
            break;
        case 39: // <Right>
            $next = $active.closest('td').next().find(focusableQuery);            
            break;
        case 40: // <Down>
            $next = $active
                .closest('tr')
                .next()                
                .find('td:nth-child(' + position + ')')
                .find(focusableQuery)
            ;
            break;
    }       
    if($next && $next.length)
    {        
        $next.focus();
    }
    });

*/


/*======================================
    MENU STICKY / BTN TOP 
========================================*/
    var header  = $('.navbar-static-top').height();
    var padding = 15;
    var top     = header + padding ;

    //console.log(top);

    $(window).scroll(function() {
        if ($(this).scrollTop() >= top) {
            $('.panel-tools').addClass('sticky');
            //$('.ir-arriba').css("display","block");
            //$('.ir-arriba').animate({ "bottom": "50px" }, "slow" ).css("display","block");
            //$('.ir-arriba').animate({ "bottom": "-50px" }, "slow" ).css("display","block");
            $('.ir-arriba').slideDown(300);
        }
        else {
            $('.panel-tools').removeClass('sticky');
            $('.ir-arriba').slideUp(300);
        }
    });
    
     $('.ir-arriba,.btn-secciones').click(function(){
        scroll_Top();
    });


    function scroll_Top(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    }



/*======================================
    COLLAPSE
========================================*/

      $(".subtitle-collapse").on('click',function(){
        $this = $(this).find('i');
        $this.toggleClass("rotate");
        //$('.subtitle-collapse').collapse('hide');
      })



/*======================================
    INPUT FILE
========================================*/
/*
    By Osvaldas Valutis, www.osvaldas.info
    Available for use under the MIT License
*/


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






});



