$(function(){
	var textarea = $('textarea'),
		textDone = true,
		form = $('form').eq(0);
	form.submit(function(){
		textDone = true;
		textarea.each(function(){
			var textareaLength = $(this).val().length > 9 || $(this).val().length == 0;
			textDone = textDone && textareaLength;
		});
		textDone = textDone && testPassword();
		if(!textDone){
			return false;
		}
	});
	//textarea
	if(textarea.length){
		textarea.each(function(){
			$(this).bind('input propertychange',function(){
				if($(this).val().length > 9 || $(this).val().length == 0){
					$(this).parent().next().text('');
				}else{
					$(this).parent().next().text('字数应不少于10个');
				}
			});
		});
	}
	placeholderSupport('input');
	placeholderSupport('textarea');
	requiredSupport('input');
	patternSupport('input');
});
//兼容placeholder
function placeholderSupport(obj){
	var testElement = document.createElement(obj);
	var placeholderSupport = 'placeholder' in testElement;
	if(!placeholderSupport){
		var inputs = document.getElementsByTagName(obj);
		for(var i = 0;i < inputs.length;i++){
			var input = inputs[i],
				placeholder = input.placeholder ? input.placeholder : input.getAttribute('placeholder');
			if(!placeholder){
				continue;
			}
			if(input.getAttribute('type') == 'password'){
				$(input).attr('type','text').focus(function(){
					if( $(this).val() == $(this).attr('placeholder') ){
						$(this).attr('type','password');
					}
				}).blur(function(){
					if( $(this).val() == '' ){
						$(this).attr('type','text');
					}
				});
			}
			input.value = placeholder;
			input.onfocus = function(){
				if(this.value == this.getAttribute('placeholder')){
					this.value = '';
				}
			}
			input.onblur = function(){
				if(this.value == ''){
					this.value = this.getAttribute('placeholder');
				}
			}
		}
	}
}
//兼容required
function requiredSupport(obj){
	var testElement = document.createElement(obj);
	var requiredSupport = 'required' in testElement && !/Version\/[\d\.]+\s * Safari/i.test(navigator.userAgent);
	if(!requiredSupport){
		$('form').submit(function(){
			var inputs = document.getElementsByTagName(obj);
			for(var i = 0;i < inputs.length;i++){
				var input = inputs[i],
					placeholder = input.placeholder ? input.placeholder : input.getAttribute('placeholder'),
					required = input.required ? input.required : input.getAttribute('required');
				if( required != '' ){
					continue;
				}
				if( !input.value || (input.value == placeholder) ){
					$(input).parent().parent().addClass('has-error');
					$(document).scrollTop($(input).offset().top);
					$(input).focus(function(){
						$(this).parent().parent().removeClass('has-error');
					});
					return false;
				}
			}
		});
	}
}
//兼容pattern
function patternSupport(obj){
	var testElement = document.createElement(obj);
	var patternSupport = 'pattern' in testElement;
	if(!patternSupport){
		$('form').submit(function(){
			var inputs = document.getElementsByTagName(obj);
			for(var i = 0;i < inputs.length;i++){
				var input = inputs[i],
					pattern = input.pattern ? input.pattern : input.getAttribute('pattern');
				if( !pattern ){
					continue;
				}
				var reg = new RegExp(pattern);
				if( !reg.test(input.value) ){
					$(input).parent().addClass('has-error');
					$(document).scrollTop($(input).offset().top);
					$(input).focus(function(){
						$(this).parent().removeClass('has-error');
					});
					alert($(input).attr('title'));
					return false;
				}
			}
		});
	}
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
//文件上传图片
function updateImage(obj){
	var thisInput = $(obj),
		fileName = $(obj).val(),
		lastName = fileName.toLowerCase().substr(fileName.lastIndexOf('.') + 1),
		mes = thisInput.next();
	if( lastName == 'jpg' ){
		mes.text("");
		return ;
	}
	if( lastName == 'gif' ){
		mes.text("");
		return ;
	}
	if( lastName == 'png' ){
		mes.text("");
		return ;
	}
	if( lastName == 'jpeg' ){
		mes.text("");
		return ;
	}
	alert("只允许上传jpg,gif,png,jpeg格式的图片");
	mes.text("只允许上传jpg,gif,png,jpeg格式的图片");
	thisInput.prop('outerHTML',thisInput.prop('outerHTML'));
}
//确认密码
function testPassword(){
	var password = $('input[type=password]');
	if(password.length == 2){
		if(password.eq(0).val() != password.eq(1).val()){
			password.eq(1).parent().addClass('has-error');
			$(document).scrollTop(password.eq(1).offset().top);
			password.eq(1).focus(function(){
				password.eq(1).parent().removeClass('has-error');
			});
			alert("两次输入的密码不一致");
			return false;
		}
	}
	return true;
}