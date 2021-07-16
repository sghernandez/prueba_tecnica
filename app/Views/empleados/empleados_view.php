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
            <td>
                <?= form_open('save'). form_hidden('id', $e->id) ?>
                  <button type="submit" class="form-control"><i class="fa fa-user"></i></button>
                <?= form_close() ?>
            </td>
            <td>
                <?= form_open('delete'). form_hidden('id', $e->id) ?>
                <button type="submit" onclick="return(confirm('¿Desea borrar el registro?'))" class="form-control"><i class="fa fa-trash"></i></button>
                <?= form_close() ?>
            </td>            
        </tr>
        <?php endforeach ?>
    </tbody>
  </table>

<?= $this->endSection() ?>