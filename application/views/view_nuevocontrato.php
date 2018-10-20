<h1 align="center">Registro de contrato</h1></br>

 <div class="container">

     <div class="form-group">

         <div class="alert alert-warning">
             <strong>Advertencia:   </strong> Los campos marcados con un asterísco son obligatorios.
         </div>

     </div>

     <form class="form-horizontal" role="form" method="POST">
         <div class="row">

        <div class="form-group col-xs-12 col-md-6">
          <label for="nombre" class="col-lg-5 control-label">Nombre* :</label>
            <div class="col-md-6">
              <input maxlength="20" type="textarea" NAME="nombre" class="form-control" id="nombre"
                     placeholder="Introduzca nombre" value="<?=set_value('nombre')?>"><?php echo form_error('nombre'); ?>
            </div>
        </div>

        <div class="form-group col-xs-12 col-md-6">
          <label for="date" class="col-lg-5 control-label">Fecha :</label>
            <div class="col-lg-6">
              <input disabled="true" type="date" NAME="fecha" class="form-control" id="fecha"
                     placeholder="Introduzca fecha" value="<?php echo date('Y-m-d'); ?>">
            </div>

        </div>

        <div class="form-group col-xs-12 col-md-6">
        <label for="licitacion_id" class="col-lg-5 control-label">Licitación asociada :</label>
        <select id="licitacion_id" name="licitacion_id" class="form-control col-lg-6">
            <?php foreach($licitaciones as $row) : ?>
                <?php if($row['publicada'] == 'y') : ?>
                    <?='<option value="'.$row['id'].'">'.$row['nombre'].'</option>'?>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>

   
            

    <label for="aceptar" class="col-lg-5 control-label"></label>
            <div class="col-lg-4">
                <button type="submit" class="btn btn-primary">Aceptar</button>
                <a href="<?=base_url()?>"><button type="button" class="btn btn-primary">Cancelar</button></a>

    </div>

</div></div>
</form>


</div>



