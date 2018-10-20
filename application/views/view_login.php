<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <br />
            <form method="post">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Iniciar sesión</h1>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user-o" aria-hidden="true"></i>
                                </span>
                                <input maxlength="20" id="usuario" type="text" class="form-control" name="usuario" placeholder="usuario"
                                       value="<?=set_value('usuario')?>" />
                            </div>
                            <?php echo form_error('usuario'); ?>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-key" aria-hidden="true"></i>

                                </span>
                                <input maxlength="20" id="password" type="password" class="form-control" name="password" placeholder="Contraseña"
                                       value="<?=set_value('password')?>" />
                            </div>
                            <?php echo form_error('password'); ?>
                        </div>

                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <li><?php echo $error; ?></li>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <div class="container" align="center">
                            <button type="submit" class="btn btn-success">ENTRAR</button>
                        </div>
                    </div>
                </div>
            </form></div>
    </div>
</div>


