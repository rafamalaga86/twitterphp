(function(){

var id;

$('.answer-button').on('click', function(){

	id = $(this).data('ttid');
	$('#ttid').attr('value', id);
});


})();