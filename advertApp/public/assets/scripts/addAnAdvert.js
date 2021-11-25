( function($) {
	$(document).on('submit', 'form.advForm', function(e){
		//Stop form default behaviour
		e.preventDefault();

		var a=document.forms['advForm']['price'].value;
		var b=document.forms['advForm']['area'].value;
		var c=document.forms['advForm']['availableFor'].value;
    	var d=document.forms['advForm']['squareMeters'].value;
    	
    	var $price = parseInt(a);
    	var $sqrMet = parseInt(d);

    	// console.log($price);
    	// console.log(b);
    	// console.log(c);
    	// console.log($sqrMet);

    	if (($price < 50) || ($price > 5000000) || ($sqrMet < 20) || ($sqrMet > 1000)){
    		return false;
    	}
    	const formData = $(this).serialize();
		console.log(formData);
		
		//Ajax request
		$.ajax('http://localhost/advertApp/public/ajax/adding_result.php',
			{
				type: "GET", 
				datatype: "html",
				data: formData,
			}).done(function(result) {
				// Form disable on start
				$('form.advForm input, form.advForm select, form.advForm button').attr('disabled', true);
				
				// Append results to container
				$('#adContainer').append(result);	

				// Reset review form
				$('form.advForm').trigger('reset');	

			}).error(function(result) {
			}).always(function(result){

				// Form enable on result
				$('form.advForm input, form.advForm select, form.advForm button').attr('disabled', false);
			});
	});

})(jQuery);	
