<p class="intro">Connecte toi&nbsp;!</p>
<div id="formRegister">
<h1	class="titreOutliner">Connexion</h1>
	<?= form_open('membre/login', 
	array( 
			'method' => 'post'
	)); 

	//champ adresseMail
	echo form_label('Adresse mail', 'email');

	$data = array(
              'name'        => 'email',
              'id'          => 'email',
              'maxlength'   => '100',
              'size'        => '30',
            );
	echo form_input($data);
	
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
	              'name'        => 'mysubmit',
	              'value'          => 'Se connecter',
	              'class' => 'submitButton'
	              );

	echo form_submit($data); 
	//Fermeture du formulaire
	form_close(); ?>
	</div>
	<h1	class="titreOutliner">Inscription</h1>
	
	<?= anchor(	'membre/registration',
						's\'inscrire',
						array(
							'title' => 'S\'inscrire',
							'hreflang' => 'fr',
							'id' => 'registration'
							)
						)?>

