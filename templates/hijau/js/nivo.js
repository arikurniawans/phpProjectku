$(window).load(function() {
	$('#slider5').nivoSlider({ pauseTime:4000, pauseOnHover:false });
	setTimeout(function(){
		$('#slider2').nivoSlider({ pauseTime:4000, pauseOnHover:false });
	}, 1000);
	setTimeout(function(){
		$('#slider3').nivoSlider({
			pauseTime:4000,
			pauseOnHover:false,
			controlNavThumbs:true
		});
	}, 2000);
	setTimeout(function(){
		$('#slider4').nivoSlider({
			effect:'random',
			animSpeed:1000,
			pauseTime:4000,
			startSlide:2,
			directionNav:false,
			controlNav:true,
			keyboardNav:false,
			pauseOnHover:false
		});
	}, 000);
});