<ul id="linksList">
<?php foreach($liens as $lien):?>	
	<li>
		<img src="<?= $lien->url_img; ?>"/>	
	    <div id="infosSite">
	    	<h2><?= $lien->titre; ?></h2>
	    	<h3><?= $lien->description; ?></h3>
	  	 	<a href="<?= $lien->url; ?>" title="Visiter le site <?= $lien->titre; ?>"><?= $lien->url; ?></a>
	    
	    	<div id="actions">
	    		<!--Lien supprimer-->
	    		<?= anchor ('lien/supprimer/' .$lien->id,
							'supprimer',
							array('title' => 'supprimer le lien '. $lien->url,
								'hreflang' => 'fr')
								)
							?>

				<!--Lien modifier-->
			    <?= anchor ('lien/modifier/' .$lien->id,
							'modifier',
							array('title' => 'modifier le lien '. $lien->url,
								'hreflang' => 'fr')
								)
							?>
			</div>
		</div>
	</li>
<?php endforeach;?>
</ul>