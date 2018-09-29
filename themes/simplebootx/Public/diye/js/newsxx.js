$(document).ready(function(){
	var i = 1;
	$('.sidebar-news').children().each(function(){
		$(this).find('span').text(i);
		if(i <= 3){
			$(this).find('span').addClass('top3');
		}
		i += 1;
		if(i >= 9){
			return false;
		}
	});
});