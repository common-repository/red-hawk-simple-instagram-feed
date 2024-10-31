jQuery(document).ready(function($){
	$('#redhawk_alert_close').on('click', function() {
		$('#redhawk_alert').hide();
	});
	$('#rhsif_example').on('click', function() {
		$('.rhsif_example').fadeIn().show();
	});
	$('#rhsif_close_example').on('click',function() {
		$('.rhsif_example').fadeOut().hide();
	});
});