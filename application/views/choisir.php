 <div id="infos">

    <a href="<?= $url ?>"><?= $titreSite ?></a>
    <p><?= $url ?></p>
    <p><?= $description ?></p>
  </div>
<div id="formChoose">
  <h1 class="titreOutliner">Choix de l'image</h1>
      <?= form_open('lien/ajouterDB'); 
      //titre
      $data = array(
                    'name'        => 'titre',
                    'value'          => $titreSite
                    );

      echo form_input($data);

      //description
      $data = array(
                    'name'        => 'description',
                    'value'          => $description,
                    'size' => '100'
                    );
      echo form_input($data);

      //url
      $data = array(
                    'name'        => 'url',
                    'value'          => $url
                    );

      echo form_input($data);?>

      <button id="previous" type="button"><</button><button id="next" type="button">></button>
      <ul id="vignettes">
          <!--choisir Image-->
          <?php foreach($lienImg as $img): ?>
              <li>
              <div class="selection"><?= form_radio(array('name' => 'img',
              'value' => $img
              ))?> 
            </div>
              <?= '<img src="'.$img.'" />'; ?>
              </li>
          <?php endforeach; ?>
          
      </ul> 
          <?php
          $data = array(
                'name'        => 'mysubmit',
                'value'          => 'Partager',
                'class' => 'submitButton'
                );

          echo form_submit($data); ?>
          <?= form_close() ?>
      
  </div>

  
