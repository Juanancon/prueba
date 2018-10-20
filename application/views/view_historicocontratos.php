<h1 align="center">Listado de contratos</h1></br>

<div class="container">

    <table class="table table-reflow">
        <tr>
            <td><a href="<?=site_url("Contratos/")?>"><i class="fa fa-plus-circle fa-2x"></i></a></td>
            <td></td>
            <th>Nombre</th>
            <th>Fecha</th>
        </tr>
        <?php foreach ($contratos as $contrato) : ?>
        <tr>
                    <td><a href="<?=site_url("Contratos/modificarcontrato/{$contrato['id']}")?>"><i class="fa fa-pencil fa-2x"></i></a></td>
                    <td><a href="<?=site_url("Contratos/borrarcontrato/{$contrato['id']}")?>"><i class="fa fa-trash fa-2x"></i></a></td>
                    <td><?=$contrato['nombre']?></td>
                    <td><?=$contrato['fecha']?></td>
                </tr>
        <?php endforeach;?>
        </tbody>
    </table>

    <a class="btn btn-info" href="<?=base_url('/index.php/Contratos')?>">
        <i class="glyphicon glyphicon-align-left"></i>Nuevo</a>

</div>