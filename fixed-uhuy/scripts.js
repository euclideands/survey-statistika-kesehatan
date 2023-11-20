$(document).ready(function() {       
	$('#current_select').multiselect({		
		nonSelectedText: 'Select Current'				
	});
});

$(function () {

 
 $('#current_select').multiselect({ 
 buttonText: function(options, select) {
 var labels = [];
 console.log(options);
 options.each(function() {
 labels.push($(this).val());
 });
 $("#current_select_values").val(labels.join(',') + '');
 return labels.join(', ') + '';
 //}
 }
 
 });
});