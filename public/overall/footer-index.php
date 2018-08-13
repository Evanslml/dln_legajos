<?php if(isset($_SESSION['sesion_id']))
{
?>

<div class="loading">
  <img src="<?php echo URL_VIEW; ?>bootstrap-default/img/loading.gif" alt="">
</div>

<span class="ir-arriba fa fa-angle-up"></span>
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <!--<div class="pull-right hidden-xs">
      Visitanos en nuestras redes sociales.
    </div>-->
    <!-- Default to the left -->
    <strong>Copyright © <?php echo date("Y");?> <a href="<?php echo WWW;?>" target="blank">DIRIS Lima Norte</a>.</strong> derechos reservados.
  </footer>
</div>

<?php 

    if(isset($_GET['view'])) {
      $vista = $_GET['view'];
      switch ($vista) {
        case 'seccioni':
        case 'seccionii':
        ?>
          <script src="<?php echo URL_VIEW; ?>chosen/js/chosen.jquery.js" type="text/javascript"></script>
          <script src="<?php echo URL_VIEW; ?>chosen/js/init.js" type="text/javascript" charset="utf-8"></script>
          <script src="<?php echo URL_VIEW; ?>bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js" type="text/javascript" charset="utf-8"></script>
        <?php  
          break;
        
        default:
          # code...
          break;
      }
    }/*else{

}*/

} 
else{
  //header('location: index.php?view=error');
}
?>