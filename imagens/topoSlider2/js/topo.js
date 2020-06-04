/*$('ID or class of the element containing the fading objects').innerfade({
	animationtype: Type of animation 'fade' or 'slide' (Default: 'fade'),
	speed: Fadingspeed in milliseconds or keywords (slow, normal or fast)(Default: 'normal'),
	timeout: Time between the fades in milliseconds (Default: '2000'),
	type: Type of slideshow: 'sequence', 'random' or 'random_start' (Default: 'sequence'),
	containerheight: Height of the containing element in any css-height-value (Default: 'auto')
	runningclass: CSS-Class which the container get’s applied (Default: 'innerfade')
});*/
	
$(document).ready(function(){
		
					$('#news').innerfade({
						animationtype: 'slide',
						speed: 800,
						timeout: 3000,
						type: 'random',
						containerheight: '1em'
					});
					
					$('#portfolio').innerfade({
						speed: 1000,
						timeout: 5000,
						type: 'sequence',
						//type: 'random_start',
						containerheight: '220px'
					});
					
					$('.fade').innerfade({
						speed: 1000,
						timeout: 6000,
						type: 'random_start',
						containerheight: '1.5em'
					});
					
					$('.adi').innerfade({
						speed: 'slow',
						timeout: 5000,
						type: 'random',
						containerheight: '150px'
					});
		
});