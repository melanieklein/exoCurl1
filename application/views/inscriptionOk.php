
<?php foreach($membres as $membre):?>
<p class="intro">Merci pour ton inscription <?= $membre->pseudo;?>&nbsp;!</p>
<p>Ton email est&nbsp;: <?= $membre->email; ?></p>
<!--<img src="<?=site_url() . THUMBS_DIR . $membre->avatar; ?>">-->
<p class="intro">Maintenant, <a href="<?=site_url();?>">connecte toi</a> et ajoute tes liens&nbsp;!</p>
<?php endforeach;?>
