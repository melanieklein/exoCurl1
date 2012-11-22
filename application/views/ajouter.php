<p class="intro">Tu peux maintenant partager tes liens&nbsp;!</p>
<div id="formAdd">
<?= form_open('lien/choisir'); ?>
<?php 
		echo form_label('Entrez une url', 'url');
	 	$data = array(
	              'name'        => 'champ',
	              'value'          => '',
	              'placeholder' => 'http://exemple.com',
	              'autofocus' => 'autofocus',
	              'maxlength'  => '75',
	              'size' => '30'
	              );

		echo form_input($data);
	
		$data = array(
	              'name'        => 'mysubmit',
	              'value'          => 'ok',
	              'id' => 'envoi',
	              'class' => 'submitButton'
	              );

		echo form_submit($data); 
	?>
<?= form_close() ?>
</div>