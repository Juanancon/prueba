
<div class="container">

    <table class="table table-reflow">
        <tr>
            <td><a href="<?=site_url("Licitaciones/")?>"><i class="fa fa-plus-circle fa-2x"></i></a></td>
            <td></td>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Publicada</th>
        </tr>
        <?php foreach ($licitaciones as $licitacion) : ?>
        <tr>
                    <td><a href="<?=site_url("Licitaciones/modificarlicitacion/{$licitacion['id']}")?>"><i class="fa fa-pencil fa-2x"></i></a></td>
                    <td><a href="<?=site_url("Licitaciones/borrarlicitacion/{$licitacion['id']}")?>"><i class="fa fa-trash fa-2x"></i></a></td>
                    <td><?=$licitacion['nombre']?></td>
                    <td><?=$licitacion['fecha']?></td>
                    <td><?php if($licitacion['publicada'] == 'y'){ echo 'Sí'; } else { echo 'No'; }?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>

    <a class="btn btn-info" href="<?=base_url('/index.php/Licitaciones')?>">
        <i class="glyphicon glyphicon-align-left"></i>Nuevo</a>

</div>