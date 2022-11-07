jQuery( document ).ready(function( $ ) {
	
	'use strict';
	  $('.particle-ground').particleground({
		dotColor: '#ffffff',
		lineColor: '#ffffff',
		density: 9000,
		particleRadius: 7, // Dot size
		lineWidth: 1,
		curvedLines: false,
		proximity: 100,
		lineWidth: 0.2
	  });
	  $('.pg-canvas').parents().find('.vc_column-inner').css({'padding-left' : '0', 'padding-right' : '0'});
});