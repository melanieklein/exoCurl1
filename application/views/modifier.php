<div id="formModify">
    <?= form_open('lien/modifierDB'); 
    //titre
    $data = array(
                  'name'        => 'titre',
                  'value'          => $unLien->titre,
                  'size' => '30'
                  );

    echo form_input($data);

    //description
    $data = array(
                  'name'        => 'description',
                  'value'          => $unLien->description,
                  'size' => '50'
                  );
    echo form_input($data);

    //url
    $data = array(
                  'name'        => 'url',
                  'value'          => $unLien->url,
                  'size' => '50'
                  );

    echo form_input($data);?>

    <ul>
        <!--choisir Image-->
        <?php foreach($unLien as $img): ?>
            <?= form_radio(array('name' => 'img',
            'value' => $img
            ))?> 
            <?= '<img src="'.$img.'" />'; ?>
        <?php endforeach;?>
        <?= form_hidden('id',$unLien->id);?>
    </ul>
        <? 
        $data = array(
                'name'        => 'mysubmit',
                'value'          => 'Modifier',
                'class' => 'submitButton'
                );

        echo form_submit($data); ?>
        <?= form_close() ?>
</div>