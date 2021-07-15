<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title><?= isset($title) ? $title : 'Our Site' ?></title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <!-- STYLES -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('fontawesome/css/all.min.css') ?>">

    <?php $this->renderSection('css') ?>
</head>
<body>   
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">PRUEBA TECNICA</a>                                                                                                                                                     
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="<?= site_url('empleados') ?>">Empleados</a></li>	  
        </ul>
		<?php if(session()->get('name')): ?>		
          <ul class="nav navbar-nav navbar-right">
            <li><a href="javascript:void()"><i class="icon-user"></i> <?= session()->get('name') ?></a></li>
            <li><a href="<?= site_url('logout') ?>">Salir</a></li>
          </ul>      	
		<?php endif ?>	
      </div>
    </nav>
    
<!-- CONTENT -->
<section>
  <?php $this->renderSection('content') ?>
</section>

<div class="further">
   Footer
</div>

<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->
<footer>
	<div class="environment">

		<p>Page rendered in {elapsed_time} seconds</p>

		<p>Environment: <?= ENVIRONMENT ?></p>

	</div>

	<div class="copyrights">

		<p>&copy; <?= date('Y') ?> CodeIgniter Foundation. CodeIgniter is open source project released under the MIT
			open source licence.</p>

	</div>
</footer>

<!-- SCRIPTS -->
<?php $this->renderSection('scripts') ?>
<script>
	function toggleMenu() {
		var menuItems = document.getElementsByClassName('menu-item');
		for (var i = 0; i < menuItems.length; i++) {
			var menuItem = menuItems[i];
			menuItem.classList.toggle("hidden");
		}
	}
</script>

<!-- -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    

<script>
    
$(document).ready(function() {
  $("#basic-form").validate();
});    
    
</script>

</body>
</html>
