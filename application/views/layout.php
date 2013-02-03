<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title> <?= $titre ?> </title>
	<link rel="stylesheet" type="text/css" href="<?= site_url() . CSS_DIR . 'style.css'; ?>">
	<link rel="shortcut icon" type="image/x-icon" href="<?= site_url() . IMAGES_DIR . 'favicon.png'; ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
	<div id="page" class="ajaxBox">
		<div id="header">
			<a href="<?= site_url();?>"><?= $titre ?></a>
		</div>

		<div id="contenu">	
		<?php	if($this->session->userdata('logged_in')): ?>
		<?= anchor(	'membre/disconnect',
						'se déconnecter',
						array(
							'title' => 'se déconnecter',
							'hreflang' => 'fr',
							'id' => 'disconnect'
							)
						)?>
		<?php endif;?>

			<?= $vue ?>
		
		</div>

	</div>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src='<?= site_url(); ?>web/js/script.js'></script>
</body>
</html>