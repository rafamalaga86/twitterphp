(function(){

var id;

$('.answer-button').on('click', function(){

	id = $(this).data('ttid');
	$('#answer-tweet-form').attr('action', 'http://testing.clickcreacion.com/twitterphp/app/scripts/answer.php?id=' + id);
});


})();