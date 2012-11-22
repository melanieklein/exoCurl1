<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title> <?= $titre ?> </title>
	<link rel="stylesheet" type="text/css" href="<?= site_url() . CSS_DIR . 'styles.css'; ?>">
</head>
<body>
	<div id="page">
		<div id="header">
			<h1><?= $titre ?></h1>
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
	
	<script src='<?php echo site_url(); ?>web/js/jquery.js'></script>
	<script src='<?php echo site_url(); ?>web/js/code.js'></script>
</body>
</html>