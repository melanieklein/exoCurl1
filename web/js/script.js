( function ( $ ) {
	
	//selection des images
	var $images = $("#vignettes li"); 

	//rajoute attribut checked avec valeur checked au bouton radio du premier input
	$images.first().children('ul').children('input').attr("checked","checked"); 

	//cache les images sauf la première
	$images.not(':first').hide();

	//cache les boutons radio
	$(".selection").hide();

	//Au clique sur button next, lance function switchNext
	$("#next").on("click", switchNext);

	//Au clique sur button previous, lance function switchPrevious
	$("#previous").on("click", switchPrevious);

	//function qui pase à l'image suivante
	function switchNext(e)
	{
		e.preventDefault();
		var $nextImage = $images.filter(':visible').next("li");
		
		if( $nextImage.size() == 0 )
			$nextImage = $images.first();
		
		$images.filter(':visible').fadeOut('fast', function(){
			$nextImage.fadeIn('fast');
		});
		
		//ajoute attribut checked avec valeur checked au bouton radio
		$nextImage.children('div').children('input').attr("checked", "checked");
	}

	//function qui passe à l'image précédente
	function switchPrevious(e){
			e.preventDefault();
			var $nextImage = $images.filter(':visible').prev("li");
			
			if( $nextImage.size() == 0 )
				$nextImage = $images.last();
			
			$images.filter(':visible').fadeOut('fast', function(){
				$nextImage.fadeIn('fast');
			});
			
			//ajoute attribut checked avec valeur checked au bouton radio
			$nextImage.children('div').children('input').attr("checked", "checked");
	}

	
	
}(jQuery));

