$(document).ready(function(){
	var navCollapse = $('#navbar-collapse'),
		navCollapseUl = navCollapse.find("#navbar-collapse-ul"),
		navTitles = navCollapse.find('h1');
	//给每个title添加一个点击事件
	navTitles.each(function(){
		$(this).click(function(event){
			event.stopPropagation();
			console.log($(this).next().children('div.col-sm-9'));
			var thisUl = $(this).next().children('div.col-sm-9').length != 0 ? $(this).next().children('div.col-sm-9').find('.nav-ul') : $(this).next('.nav-ul');
			clearClassName(navTitles.next(),'db');
			thisUl.addClass('db');
			navCollapseUl.removeClass('navbar-xs-overflow').addClass('navbar-xs-right');
		});
	});
	//点击返回
	navCollapse.click(function(){
		navCollapseUl.removeClass('navbar-xs-right').addClass('navbar-xs-overflow');
	});
	/*导航经过自动下拉*/
	$('li.dropdown').hover(function(){			
		$(this).addClass('open');
	},function(){
		$(this).removeClass('open');
	});
	//页脚
	footer();
	//分页插入li
	var ulPage = $('ul.pagination'),
		ulPageDiv = ulPage.children(),
		lis = ulPageDiv.children(),
		html = "";
	if(ulPage.length){
		lis.each(function(){
			html += "<li>" + $(this).prop('outerHTML') + "</li>";
		});
		ulPage.html(html);
	}
});
function footer(){
	if($(window).innerWidth() <= 767){
		//页脚点击下拉
		$('.footer-h1').each(function(){
			$(this).click(function(){
				$(this).next('.footer-ul').slideToggle();
			});
		});
	}
}
//清楚样式
function clearClassName(obj,className){
	obj.each(function(){
		if( $(this).hasClass(className) ){
			$(this).removeClass(className);
		}
	});
}