<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>

<div class="container">
<div class="col-sm-12">
    <h1 class="text-center"><?= $title ?></h1>
</div>
 <?php if(@$errors){ echo @$errors; } ?>
    
<div class="col-sm-3"></div>
<form action="" method="post" class="col-sm-6">
    
  <div class="form-group">
    <label for="exampleInputPassword1">Nombre completo *</label>
    <input type="text" id="name" name="name" value="<?= $data['name'] ?>" placeholder="Nombre completo" required minlength="10" class="form-control">
  </div>
    
  <div class="form-group">
    <label>Correo electrónico *</label>
    <input type="email" id="email" name="email" value="<?= $data['email'] ?>" placeholder="Correo electrónico" class="form-control">
    <small id="emailHelp" class="form-text text-muted">Campo único</small>
  </div>
    
  <div class="form-group"> 
    <label >Sexo *</label>
        <div class="radio">
            <label><input type="radio" name="gender" value="M" <?= $data['gender'] == 'M' ? 'checked' : '' ?>>Masculino</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="gender" value="F" <?= $data['gender'] == 'F' ? 'checked' : '' ?>>Femenino</label>
        </div>
  </div> 
    
  <div class="form-group"> 
    <label>Roles *</label>
     <?php foreach ($roles as $idr => $rol): ?>
       <label><input type="checkbox" value="<?= $idr ?>" name="roles[]" isset($roles_empleado[$idf]) 'checked' : ''><?= $rol ?></label>
       <br>
     <?php endforeach ?>
  </div>     
    
  <div class="form-group">
    <label >Area *</label>
    <?= form_dropdown('area', $areas, $data['area'], 'required class="form-control"') ?>
  </div>    
    

  <div class="form-group">
    <label>Descripción *</label>
    <textarea name="description" class="form-control" required>
        <?= $data['description'] ?>
    </textarea>    
  </div>    
   
  <div class="form-group"> 
    <label>
        Deseo Recibir boletín informativo
        <input type="checkbox" id="boletin" name="boletin" value="1" <?= $data['boletin'] ? 'checked' : '' ?>><br>        
    </label>
  </div> 
   <?= form_hidden('send', TRUE) ?>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
</div>

<?= $this->endSection() ?>