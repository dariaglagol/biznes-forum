$(document).ready(function(){
	
	$('.header__call, .banner__button-take-part, .features__btn-take-part, .impression__btn-take-part').click(function(){
		$('body').addClass('open');
	});
	
	$('.first-form, .second-form').submit(function(e){
		e.preventDefault();
        var form = $(this),
            data = form.serialize();
        form.find('input,button').prop('disabled', true);
		$.ajax({
            'url': form.attr('action'),
            'type': 'post',
            'dataType': 'json',
            'data': data,
			'success' : function(ajax){
				if(ajax.hash){
					form.hide();
					if(ajax.company){

						$('.only-org').show().prop('disabled', false);
					}else{
						$('.only-org').hide().prop('disabled', true);
					}
					$('.second-form').show();
					$('.reg_second-form').show().append('<input type="hidden" name="hash" value="' + ajax.hash + '">');
				}
				if(ajax.msg){
					form.html(ajax.msg);
				}
                form.find('input,button').prop('disabled', false);
			},
			'error' : function(){
                form.find('input,button').prop('disabled', false);
			}
		});
	});
	
	$('#info').change(function(){
		if($(this).val() == 'Иное'){
			$('#user_info_other').show();
		}else{
			$('#user_info_other').hide();
		}
	});
	
});