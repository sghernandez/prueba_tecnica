<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>
  <table class="table table-striped">
    <thead>
        <tr>
            <td colspan="6"><h2><?= $title ?></h2></td>
            <td><a href="<?= site_url('save') ?>" class="btn btn-info"><i class="fa fa-user"></i> Crear</a></td>
        </tr>
        <tr>
          <th><i class='fa fa-user'></i> Nombre</th>
          <th>@ Email</td>
          <th><i class='fa fa-venus-mars'</i> Sexo</th>
          <th><i class='fa fa-briefcase'></i> Area</th>
          <th><i class='fa fa-envelope'></i> Boletín</th>   
          <th>Modificar</th>  
          <th>Eliminar</th>   
        </tr>
    </thead>
    <tbody>
        <?php foreach($employes as $e): ?>
        <tr>
            <td><?= $e->nombre ?></td>
            <td><?= $e->email ?></td>
            <td><?= $e->sexo ?></td>
            <td><?= isset($areas[$e->area_id]) ? $areas[$e->area_id] : '' ?></td>
            <td><?= $e->boletin ? 'SI' : 'NO' ?></td>
            <td><i class='fa fa-pencil'></i> Editar</td>
            <td><i class='fa fa-trash'></i></td>
        </tr>
        <?php endforeach ?>
    </tbody>
  </table>

<?= $this->endSection() ?>