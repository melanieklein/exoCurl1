


<p class="intro">Salut <em><?php echo $this->session->userdata('email'); ?></em></br> Tu peux maintenant partager un lien&nbsp;!</p>

<div id="formAdd">
<h1	class="titreOutliner">Partager un lien</h1>
<?= form_open('lien/choisir'); ?>
<?php 
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
<p class="intro">Ou voir les <a href="http://dreamdesgn.com/ptfmelacrud/lien/afficher">liens deja ajoutes</a></p>
</div>