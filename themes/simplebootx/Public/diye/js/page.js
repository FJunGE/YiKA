$(document).ready(function(){
	var fk = $('.fk p');
	if( fk.length ){
		contact(fk);
	}
	var lxwmUl = $('.lxwm-ul li span');
	if( lxwmUl ){
		contact(lxwmUl);
	}
    var gys = $('.gys');
    if( gys.length > 0 ){
    	var init = 1;
		$('#purchase-dj').on('click',function(){
		    if( init ){
		        gys.hide();
		        gys.slideDown();
		        init = 0;
		    }
		    $('html,body').animate({scrollTop:$('#gysdj').offset().top},800);
		});
    }    
});

function contact(obj){
	for( var i=0; i<obj.length; i++ ){
		if( obj.eq(i).data('int') == 1 ){
			obj.eq(i).show();
		}else{
			obj.eq(i).hide();
		}
	}
}