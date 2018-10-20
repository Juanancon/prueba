<h1 align="center">Listado de facturas</h1></br>

<div class="container">

    <table class="table table-reflow">
        <tr>
            <td><a href="<?=site_url("Facturas/")?>"><i class="fa fa-plus-circle fa-2x"></i></a></td>
            <td></td>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Adjunto</th>
            <th>Precio</th>
            <th>IVA</th>
            <th>Total</th>

        </tr>
        <?php foreach($facturas as $factura) : ?>
        <tr>
            <td><a href="<?=site_url("Facturas/modificarfactura/{$factura['id']}")?>"><i class="fa fa-pencil fa-2x"></i></a></td>
            <td><a href="<?=site_url("Facturas/borrarfactura/{$factura['id']}")?>"><i class="fa fa-trash fa-2x"></i></a></td>
            <td><?=$factura['nombre']?></td>
            <td><?=$factura['fecha']?></td>
            <td>
            <?php if ($factura['adjunto']): ?>
                <a href="<?=base_url("uploads/{$factura['adjunto']}")?>"><i class="fa fa-file fa-2x"></i></a>
            <?php endif ?>
            </td>
            <td><?=$factura['precio']?></td>
            <td><?=$factura['iva']?></td>
            <td><?=$factura['total']?></td>
        </tr>
        <?php endforeach ?>

        </tbody>
    </table>

    <a class="btn btn-info" href="<?=base_url('/index.php/Facturas')?>">
        <i class="glyphicon glyphicon-align-left"></i>Nuevo</a>

</div>