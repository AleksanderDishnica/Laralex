$(function() {
	var value = $('.text').val();

	$('.up').click(
		function(){
			$('.text').val(parseInt($('.text').val())+1);
		}
	);

	$('.down').click(
		function(){
			$('.text').val(parseInt($('.text').val())-1);
		}
	);
});
