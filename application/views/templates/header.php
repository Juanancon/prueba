<!DOCTYPE html>
<html>
<head>
    <title>Prueba</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/estilos.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/font-awesome.min.css">
    <style type="text/css">
        body {padding-top:20px; color: #747474;}
    </style>
</head>
<body>


<nav class="navbar navbar-toggleable-md navbar-light navbar-soft sticky-top">
    <a class="navbar-brand" href="<?=base_url()?>">
        Prueba
    </a>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto ">
            <?php if(isset($_SESSION['usuario'])) : ?>
                <li class="nav-item">
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Panel de <?=$_SESSION['usuario']?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="<?=base_url('/index.php/Licitaciones/historicolicitaciones/')?>">Licitaciones</a>
                            <a class="dropdown-item" href="<?=base_url('/index.php/Contratos/historicocontratos/')?>">Contratos</a>
                            <a class="dropdown-item" href="<?=base_url('/index.php/Facturas/historicofacturas/')?>">Facturas</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#flipFlop">Cerrar sesión</a>
                        </div>
                    </div>
                </li>

            <?php else : ?>

                <!-- Sustituir esto por el nombre de usuario y fijarnos en otra web para control de usuario -->
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('/index.php/Usuarios/login/')?>">Iniciar sesión<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <!-- Igual que arriba -->
                    <a class="nav-link" href="<?=base_url('/index.php/Registro/')?>">¿Aún no está registrado?</a>
                </li>

            <?php endif; ?>

            <!--
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            -->
        </ul>

        <form class="form-inline">
            <div>
                <a href="">

                </a>
            </div>
        </form>

    </div>
</nav>

<div id="cuerpo">

    <!-- Modal de cerrar sesión -->
    <div class="modal fade" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="modalLabel">¿Desea cerrar esta sesión?</h4>
                </div>
                <div class="modal-body">
                    Se le redirigirá a la página principal.
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary" href="<?=base_url('index.php/Usuarios/CerrarSesion/')?>" role="button">Aceptar</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin modal -->
    
    <?=$cuerpo?>

</div>
</body>
</html>