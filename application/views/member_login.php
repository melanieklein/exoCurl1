<p class="intro">Connecte toi et partage tes liens favoris&nbsp;!</p>
<div id="formRegister">
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
	              'value'          => 'Evnoyer',
	              'class' => 'submitButton'
	              );

	echo form_submit($data); 
	//Fermeture du formulaire
	form_close();

	?>
</div>