$(document).ready(function(){
	var moreLis = $('#more').find('.filter-modal-ul').children(), //弹框的选择
		modalTitle, //弹框的标题
		filterTitle,//筛选的标题
		filterUl = $('.filter').find('.filter-ul'),//筛选的ul
		modalClassName = 'filter-modal-bg',//弹框选择后添加的样式
		filterClassName = 'filter-active',//筛选选择后添加的样式
		modalSubmit = $('#more').find('.modal-submit');//弹框的确认按钮
	/*选择*/
	moreLis.each(function(){
		$(this).click(function(){
		clearFirstClass(moreLis,modalClassName);
			if(!$(this).hasClass(modalClassName)){
				$(this).addClass(modalClassName);
			}
		});
	});
	/*点击确定按钮*/
	modalSubmit.click(function(){
		modalTitle = $('#more').find('.modal-title').text();
		$('.filter').find('.filter-title').each(function(){
			if($(this).text() != modalTitle){
				return true;
			}else{
				var filterLis = $(this).parent().next().children().children();//获取当前的lis
				filterLis.each(function(){
					clearFirstClass($(this),filterClassName);
					if($(this).text() == $('#more').find('.' + modalClassName ).text()){
						$(this).addClass(filterClassName);
					}
				});
				return false;
			}
		})
	});
	/*点击筛选的li添加事件*/
	filterUl.children().each(function(){
		$(this).click(function(){
			var thislis = $(this).siblings();//该选项的所有li
			thislis.each(function(){
				$(this).removeClass(filterClassName);
			});
			$(this).addClass(filterClassName);
		})
	});
	$('.recruit-table').find('tbody').find('tr').each(function(){
		$(this).attr( {'data-toggle':'modal','data-target':'#recruit'} );
	});
});
function clearFirstClass(obj,className){
	obj.each(function(){
		if($(this).hasClass(className)){
			$(this).removeClass(className);
			return false;
		}
	});
}