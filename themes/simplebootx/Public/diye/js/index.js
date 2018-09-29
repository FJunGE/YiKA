$(document).ready(function(){

	/*
	 * 新闻中心
	 */
	var newsLeft = $('#news').find('.news-btn-left'),
		newsRight = $('#news').find('.news-btn-right'),
		newsImg = $('#news').find('.industry-img');
	newsImg.index = 0;
	newsLeft.click(function(){
		if(newsImg.find(".industry-img-content").length > 4){
			clickImgMove(newsImg,-1,400);
		}
		
	});
	newsRight.click(function(){
		if(newsImg.find(".industry-img-content").length > 4){
			clickImgMove(newsImg,1,400);
		}
	});

	/*
	 * 图片轮播
	 */
	$('#banner').on('slide.bs.carousel',function(){
	  $(this).find('.item-section').animate({'opacity':'0'},100);
	});

	$('#banner').on('slid.bs.carousel',function(){
	  $(this).find('.item-section').animate({'opacity':'1'},400);
	});
	
	/*
	 * 新闻自动播放
	 */

	var newsTimer = setInterval(function(){
		newsRight.click();
	},3000);
	$('#news .industry-content').hover(
		function(){
			clearInterval(newsTimer);
		},
		function(){
			newsTimer = setInterval(function(){
				newsRight.click();
			},3000);
		}
	);

})

function clickImgMove(obj,int,speed){
	var imgWidth = obj.find('img').innerWidth();
	obj.index += int;
	if(obj.index > (obj.find('img').length - 4) ){
		obj.index = 0;
		speed = speed * 2.5;
	}else if(obj.index < 0){
		obj.index = (obj.find('img').length - 4);
		speed = speed * 2.5;
	}
	var left = obj.index * (imgWidth + 10);
	obj.animate({'left' : -left },speed);
}

//文件上传
function updateFiles(obj){
	var thisInput = $(obj),
		fileName = $(obj).val(),
		lastName = fileName.toLowerCase().substr(fileName.lastIndexOf('.') + 1),
		mes = thisInput.next();
	if( lastName == 'rar' ){
		mes.text("");
		return ;
	}
	if( lastName == 'zip' ){
		mes.text("");
		return ;
	}
	if( lastName == '7z' ){
		mes.text("");
		return ;
	}
	alert("只允许上传rar,zip,7z格式的文件");
	mes.text("只允许上传rar,zip,7z格式的文件");
	thisInput.prop('outerHTML',thisInput.prop('outerHTML'));
}