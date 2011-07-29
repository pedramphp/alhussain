$(document).ready(function(){
	$( ".datePicker" ).datepicker();
	$('[name]').blur(function(){
		if($('[name=eventEndDate]').val() == ''){
			$('[name=eventEndDate]').val($('[name=eventStartDate]').val())
		}
	})
});