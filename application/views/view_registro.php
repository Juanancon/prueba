<h1 align="center">Registro usuario</h1></br>

<div class="container">

    <div class="form-group">

        <div class="alert alert-warning">
            <strong>Advertencia:   </strong> Los campos marcados con un asterísco son obligatorios.
        </div>

    </div>

    <form class="form-horizontal" role="form" method="POST">
        <div class="row">

            <div class="form-group col-xs-12 col-md-6">
                <label for="usuario" class="col-lg-5 control-label">Usuario* :</label>
                <div class="col-md-6">
                    <input type="textarea" NAME="usuario" class="form-control" id="usuario"
                           placeholder="Introduzca login" value="<?=set_value('usuario')?>"><?php echo form_error('usuario'); ?>
                </div>
            </div>

            <div class="form-group col-xs-12 col-md-6">
                <label for="password" class="col-lg-5 control-label">Password* :</label>
                <div class="col-lg-6">
                    <input type="password" NAME="password" class="form-control" id="password"
                           placeholder="Introduzca password" value="<?=set_value('password')?>"><?php echo form_error('password'); ?>
                </div>

            </div>



            <label for="aceptar" class="col-lg-5 control-label"></label>
            <div class="col-lg-4">
                <button type="submit" class="btn btn-primary">Aceptar</button>
                <a href="<?=base_url()?>"><button type="button" class="btn btn-primary">Cancelar</button></a>

            </div>

        </div></div>
</form>


