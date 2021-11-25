( function($) {

	$(document).ready(function(){
		$('.right-content').on('click', '.delete-btn', function(){
		var advId = $(this).attr('id');
		var $ele = $(this).parent().parent();

		// console.log(advId);
		// console.log($ele);

		$.ajax({
			url: 'http://localhost/advertApp/public/ajax/delete_result.php',
			type: "POST", 
			data: {advId:advId},
			success: function(result){
				console.log(result);
				$ele.css('background', '#ebebeb');
				$ele.fadeOut(1000, function(){
				$ele.remove();
					});
				}
			});
		});
	});

})(jQuery);	