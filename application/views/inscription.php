<p class="intro">Inscris toi&nbsp;!</p>
<div id="formSignin">

	<?php if(isset($error)):?>
	<div class="error"><?php echo $error; ?>
	<?php endif;?>

	<?= form_open_multipart('membre/signin', 
	array( 
			'method' => 'post',		
	)); 

	//champ pseudo
	echo form_label('Pseudo', 'pseudo');

	$data = array(
              'name'        => 'pseudo',
              'id'          => 'pseudo',
              'maxlength'   => '100',
              'size'        => '30',
            );
	echo form_input($data);

	//champ adresseMail
	echo form_label('Adresse mail', 'email');

	$data = array(
              'name'        => 'email',
              'id'          => 'email',
              'maxlength'   => '100',
              'size'        => '30',
            );
	echo form_input($data);

	//champ upload image
	echo form_upload('userfile');
	
	//champ mdp
	echo form_label('Mot de passe', 'mdp');

	$data = array(
              'name'        => 'mdp',
              'id'          => 'mdp',
              'maxlength'   => '100',
              'size'        => '30',
            );
	echo form_password($data);

	//Bouton submit
	$data = array(
	              'name'        => 'upload',
	              'value'          => 'S\'inscrire',
	              'class' => 'submitButton'
	              );

	echo form_submit($data); 


	//Fermeture du formulaire
	form_close(); ?>
	</div>