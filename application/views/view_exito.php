<div class="container">
    <div class="container" align="center">
    <img src="http://www.iconarchive.com/download/i80659/custom-icon-design/flatastic-2/success.ico"/>

    </div>
    <div class="container"><div class="alert alert-success">
            <strong>¡Éxito!</strong>
            <?php if($_SESSION['paneles_registro'] == 'registrado'){ ?>
            Se ha registrado correctamente.
            <?php } ?>
            <?php if($_SESSION['paneles_registro'] == 'nuevocontrato'){ ?>
            Se ha registrado un contrato correctamente.
            <?php } ?>
            <?php if($_SESSION['paneles_registro'] == 'nuevafactura'){ ?>
            Se ha registrado una factura correctamente.
            <?php } ?>
            <?php if($_SESSION['paneles_registro'] == 'nuevalicitacion'){ ?>
            Se ha registrado una licitación correctamente.
            <?php } ?>
        </div></div>
</div>