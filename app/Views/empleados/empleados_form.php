<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>

<div class="container">
<div class="col-sm-12">
    <h3 class="text-center"><?= $title ?></h3>
</div>
     
<div class="col-sm-2"></div>
<form action="" method="post" id="basic-form" class="col-sm-8">
  <div class="alert alert-info" role="alert">Campos requeridos *</div> 
  <div class="form-group">
    <label>Nombre completo *</label>
    <input type="text" id="name" name="name" value="<?= $validator['name']['value'] ?>" placeholder="Nombre completo" required minlength="10" class="form-control">
    <label for="name" class="error"><?= $validator['name']['error'] ?></label>
  </div>
    
  <div class="form-group">
    <label>Correo electrónico *</label>
    <input type="email" id="email" name="email" value="<?= $validator['email']['value'] ?>" placeholder="Correo electrónico" class="form-control" required>
    <small id="emailHelp" class="form-text text-muted">Campo único</small>
    <label for="email" class="error"><?= $validator['email']['error'] ?></label>
  </div>
    
<fieldset class="col-md-12">
  <b>Sexo *</b>
  <div class="form-row">
    <div class="col-12 col-md-12 form-group">
        <label class="form-check-inline">          
          <input type="radio" name="gender" value="M" <?= $validator['gender']['value'] == 'M' ? 'checked' : '' ?> required data-msg-required="Por favor seleccione una opción"> Masculino                         
        </label>
        <label class="form-check-inline">
          <input type="radio" name="gender" value="F" <?= $validator['gender']['value'] == 'F' ? 'checked' : '' ?>> Femenino
        </label>
        <label for="gender" class="error"><?= $validator['gender']['error'] ?></label>
    </div>
  </div>
</fieldset>    
    
<fieldset class="col-md-12">
  <b>Roles *</b>
  <div class="form-row">
    <div class="col-12 col-md-12 form-group">
    <?php $j = 1;
      foreach ($roles as $idr => $rol): ?>          
        <label class="form-check-inline">          
            <input type="checkbox" name='roles[]' value="<?= $idr ?>" <?= isset($roles_empleado[$idr]) ? 'checked' : '' ?>> <b><?= $rol ?></b>                         
        </label>
    <?php $j++;
         endforeach ?>   
        <label for="roles[]" class="error"></label>
    </div>
  </div>
</fieldset>     
    
  <div class="form-group">
    <label >Area *</label>
    <?= form_dropdown('area', $areas, $validator['area']['value'], 'required id="area" class="form-control"') ?>
    <label for="area" class="error"><?= $validator['area']['error'] ?></label>
  </div>    
    
  <div class="form-group">
    <label>Descripción *</label>  
    <textarea name="description" class="form-control" rows="5" minlength="10" required><?= $validator['description']['value'] ?></textarea>
    <label for="description" class="error"><?= $validator['description']['error'] ?></label>
  </div>    
   
    <div class="form-group">       
        <span>                
            <label class="form-control"><b>Deseo Recibir boletín informativo</b>
                <input type="checkbox" name="boletin" value="1" <?= $validator['boletin']['value'] ? 'checked' : '' ?> class="pull-left">                     
            </label>
        </span>       
    </div> 
   <?= form_hidden('send', TRUE). form_hidden('id', $id) ?>
    <button type="submit" id='submit' class="btn btn-primary btn-block">GUARDAR</button>
</form>
</div>

<?= $this->endSection() ?>