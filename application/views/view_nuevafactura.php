<h1 align="center">Registro de factura</h1></br>


 <div class="container">

     <div class="form-group">

         <div class="alert alert-warning">
             <strong>Advertencia:   </strong> Los campos marcados con un asterísco son obligatorios.
         </div>

     </div>

     <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
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
          <label for="adjunto" class="col-lg-5 control-label">Subir imagenes o pdf hasta 20000Kb</label>
            <div class="col-lg-6">
              <input type="file" NAME="adjunto" class="form-control" id="adjunto"
                     placeholder="Seleccionar archivo" value="">
            </div>
        </div>

        <div class="form-group col-xs-12 col-md-6">
          <label for="precio" class="col-lg-5 control-label">Precio* :</label>
            <div class="col-md-6">
              <input type="text" NAME="precio" class="form-control precio" id="precio"
                     placeholder="Introduzca Precio" value="<?=set_value('precio')?>"><?php echo form_error('precio'); ?>
            </div>
        </div>

        <div class="form-group col-xs-12 col-md-6">
          <label for="precio" class="col-lg-5 control-label">Porcentaje IVA :</label>
            <div class="col-md-6">
              <input maxlength="10"  readonly="readonly" type="text" NAME="iva" class="form-control iva" id="iva"
                     placeholder="IVA" value="21">
            </div>
        </div>

        <div class="form-group col-xs-12 col-md-6">
          <label for="total" class="col-lg-5 control-label">Total :</label>
            <div class="col-md-6">
              <input readonly="readonly" type="text" NAME="total" class="form-control total" id="total"
                     placeholder="Total" value="">
            </div>
        </div>
       

        <div class="form-group col-xs-12 col-md-6">
        <?php echo form_error('licitacion'); ?>
        
        <label class="col-lg-5 control-label"><input selected type="checkbox" value="1" id="licitacion"> ¿Tiene licitación?</label>
        
        <select class="d-none" id="licitacion_id">
            <option selected disabled value="">Elige licitacion</option>
        
        </select>
        <select class="d-none" name="contrato_id" id="contrato_id">
            <option selected disabled value="">Elige contrato</option>
        </select>
        </div>


            <label for="aceptar" class="col-lg-5 control-label"></label>
            <div class="col-lg-4">
                <button type="submit" class="btn btn-primary">Aceptar</button>
                <a href="<?=base_url()?>"><button type="button" class="btn btn-primary">Cancelar</button></a>

    </div>

</div></div>



</div>

    <script>

    let licitacionescargadas = false;
    let contratoscargados = false;


    $('#licitacion').change(function() {
        if($(this).is(":checked")) {
            obtenerlicitaciones();
            $('#licitacion_id').removeClass('d-none');
            $('#contrato_id').removeClass('d-none');
        } else {
            $('#licitacion_id').addClass('d-none');
            $('#contrato_id').addClass('d-none');
            document.getElementById("contrato_id").options.length = 0;
        }
    });

    
    function obtenerlicitaciones() {
        if(licitacionescargadas) return;
        $.ajax( "/pruebaENREDA/index.php/Facturas/licitacionesjson/" )
    .done(function(data) {
        $('#licitacion_id').on('change', function() {
            let licitacion_id = $('#licitacion_id').val();
            $.ajax("/pruebaENREDA/index.php/Facturas/licitacionesjson/");
            $.ajax("/pruebaENREDA/index.php/Facturas/contratosjson/" + licitacion_id)
            .done(function(data){
                document.getElementById("contrato_id").options.length = 0;
                contratosdescargados = true;
                for (let index = 0; index < data.length; index++) {
                    const contrato = data[index];
                    $('#contrato_id').append('<option value="' + contrato.id + '">' + contrato.nombre + '</option>');            
                }
            })
        });
        licitacionescargadas = true;
        for (let index = 0; index < data.length; index++) {
            const licitacion = data[index];
            $('#licitacion_id').append('<option value="' + licitacion.id + '">' + licitacion.nombre + '</option>');            
        }
    });
    }

    sum();
    $("#precio, #iva").on("keydown keyup", function(){
        sum();
    });

    function sum() {
        var num1 = document.getElementById('precio').value;
        var num2 = document.getElementById('iva').value;

        var descuento = (parseInt(num1) * parseInt(num2)) / 100;
        var result = parseInt(num1) - descuento; 

        if(!isNaN(result)) {
            document.getElementById('total').value = result;
        }

    }

    </script>



