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

// function showInputField() {
// 	var selectElement = document.getElementById('coping');
// 	var otherInput = document.getElementById('otherInput');

// 	if (selectElement.value === 'Lainnya') {
// 		otherInput.classList.remove('hidden');
// 		otherInput.setAttribute('required', true);
// 	} else {
// 		otherInput.classList.add('hidden');
// 		otherInput.removeAttribute('required');
// 		otherInput.value = 'ya';
// 	}
// }