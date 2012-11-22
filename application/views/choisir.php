 <div id="infos">

    <a href="<?= $url ?>"><?= $titreSite ?></a>
    <p><?= $url ?></p>
    <p><?= $description ?></p>
  </div>
<div id="formChoose">
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

      <button id="previous"><</button><button id="next">></button>
      <ul id="vignettes">
          <!--choisir Image-->
          <?php foreach($lienImg as $img): ?>
              <li>
              <div class="selection"><?= form_radio(array('name' => 'img',
              'value' => $img,
              'checked' => 'checked'
              ))?> 
            </div>
              <?= '<img src="'.$img.'" />'; ?>
              </li>
          <?php endforeach; ?>
          
      </ul> 
          <?
          $data = array(
                'name'        => 'mysubmit',
                'value'          => 'Partager',
                'class' => 'submitButton'
                );

          echo form_submit($data); ?>
          <?= form_close() ?>
      
  </div>

  
