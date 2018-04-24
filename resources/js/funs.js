$(document).ready(function () {
	$('#horizontalTab').easyResponsiveTabs({
		type: 'default', //Types: default, vertical, accordion           
		width: 'auto', //auto or any width like 600px
		fit: true   // 100% fit in a container
	});
				
				
});		 
 
 $(function() {
	$("#startDatePicker").datepicker({ 
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		minDate: new Date(),
		maxDate: '+1y',
    	onSelect: function(date){
			var selectedDate = new Date(date);
        	var msecsInADay = 86400000;
        	var endDate = new Date(selectedDate.getTime() + msecsInADay);
			//Set Minimum Date of EndDatePicker After Selected Date of StartDatePicker
        	$("#endDatePicker").datepicker( "option", "minDate", endDate );
        	$("#endDatePicker").datepicker( "option", "maxDate", '+1y' );
			$("#endDatePicker").datepicker( "setDate", endDate );
		}
	});

	$("#endDatePicker").datepicker({ 
		dateFormat: 'yy-mm-dd',
		changeMonth: true
	});
							 
	$('#order_price').on('click', function(){
		$('#order').val('price').trigger('change');
		$('#searchForm').trigger('submit');
	});
	
	$('#order_star').on('click', function(){
		$('#order').val('star').trigger('change');
		$('#searchForm').trigger('submit');
	});
	  
	$('#searchForm input[type=submit]').on('click', function(){
		$('#maxStarRating').val('').trigger('change');
		$('#maxGuestRating').val('').trigger('change');
	});
   
	$('#clear').on('click', function(){
		$('#maxStarRating').val('').trigger('change');
		$('#maxGuestRating').val('').trigger('change');
		$('#searchForm').trigger('submit');
	});

 });