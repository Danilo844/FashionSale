    <!-- jQuery, loaded in the recommended protocol-less way -->
    <!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->

    <!-- define the project's URL (to make AJAX calls possible, even when using this in sub-folders etc) -->
    <?php 
      include('../application/view/models/chat.php');
    ?>
    <!-- define the project's URL (to make AJAX calls possible, even when using this in sub-folders etc) -->
    <script>
        var url = "<?php echo URL; ?>";
    </script>

    <!-- our JavaScript -->
    <script src="<?php echo URL; ?>js/jquery-2.0.3.min.js"></script>
    <script src="<?php echo URL; ?>js/bootstrap.js"></script>
    <script src="<?php echo URL; ?>js/jquery-1.11.2.min.js"></script>
    <script src="<?php echo URL; ?>js/jquery.js"></script>
    <script src="<?php echo URL; ?>js/jquery.newsTicker.min.js"></script>
    <script src="<?php echo URL; ?>js/jquery.slides.js"></script>
    <script src="<?php echo URL; ?>js/slider.js"></script>
    <script src="<?php echo URL; ?>js/parsley.min.js"></script>
    <script src="<?php echo URL; ?>js/es.js"></script>
    <script src="<?php echo URL; ?>js/application.js"></script>

    <?php 
        include('../public/js/noticias.js');
        include('../public/js/chat.js');
    ?>



  	<script>
	function datosPersonas() {
	    document.getElementById("btnModificar").style.display = 'none';
	    document.getElementById("btnGuardar").style.display = 'block';
		document.getElementById("txtCedula").disabled = false;
		document.getElementById("txtNombre").disabled = false;
		document.getElementById("txtCorreo").disabled = false; 
	}

	</script>

</body>
</html>
