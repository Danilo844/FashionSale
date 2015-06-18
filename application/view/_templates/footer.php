    <!-- jQuery, loaded in the recommended protocol-less way -->
    <!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->

    <?php 
      include('../application/view/models/chat.php');
      include('../application/view/models/login.php');
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
 

    <!-- Roles -->
    <script>
        function rbtnRegistrar() {
            document.getElementById("Registrar").style.display = 'none';
            document.getElementById("Modificar").style.display = 'none';
            document.getElementById("btnRegistrar").style.display = 'block';
            document.getElementById("txtNombre").disabled = false;
        }
        function rbtnModificar() {
            document.getElementById("Registrar").style.display = 'none';
            document.getElementById("Modificar").style.display = 'none';
            document.getElementById("btnModificar").style.display = 'block';
            document.getElementById("txtNombre").disabled = false;
        }
    </script>
    <script type="text/javascript">

        function rbtnRegistrarCliente(){
        document.getElementById("btnguardar").style.display = 'block';
        document.getElementById("tcedula").disabled = false;
        document.getElementById("tnombre").disabled = false;
        document.getElementById("tcorreo").disabled = false;
        document.getElementById("tcontra").disabled = false;
        document.getElementById("bregistrar").style.display = 'none';
        document.getElementById("bmodificar").style.display = 'none';
        document.getElementById("btnListar").style.display = 'none';

    }
    </script>
    <!-- Comunicacion -->
    <script>
        function cbtnRegistrar() {
            document.getElementById("Registrar").style.display = 'none';
            document.getElementById("Modificar").style.display = 'none';
            document.getElementById("btnRegistrar").style.display = 'block';
            document.getElementById("txtNombre").disabled = false;
            document.getElementById("txtDescripcion").disabled = false;
        }
        function cbtnModificar() {
            document.getElementById("Registrar").style.display = 'none';
            document.getElementById("Modificar").style.display = 'none';
            document.getElementById("btnModificar").style.display = 'block';
            document.getElementById("txtNombre").disabled = false;
            document.getElementById("txtDescripcion").disabled = false;
        }
    </script>
<!-- Catalogo Categoria -->
    <script type="text/javascript">

        function ButtonRegistrar(){
            document.getElementById("btnguardar").style.display = 'block';
            document.getElementById("catalogo").disabled =false;
            document.getElementById("descripcion").disabled = false;
            document.getElementById("BuRegistar").style.display = 'none';
            document.getElementById("BuActualizar").style.display = 'none';
            document.getElementById("bModificar").style.display = 'none';
            document.getElementById("bListar").style.display = 'none';

        }

        function ButtonActualizar(){
            document.getElementById("btnguardar").style.display = 'none';
            document.getElementById("catalogo").disabled =false;
            document.getElementById("descripcion").disabled = false;
            document.getElementById("BuRegistar").style.display = 'none';
            document.getElementById("BuActualizar").style.display = 'none';
            document.getElementById("bModificar").style.display = 'block';
            document.getElementById("bListar").style.display = 'none';

        }

        


    </script>

     <script type="text/javascript">
    //     var ran
    //     ran = Math.round(Math.random()*50000)
    //     document.write("Usted es el visitante " + ran + " de esta página.")
     </script>
</body>
</html>
