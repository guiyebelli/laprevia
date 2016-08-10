$(function(){ 
	

	$(document).on("click", "[class*='boton_restar']", function(e) {
		if (Number($('#cantidad').val()) > Number(1) )
		{
			var cant = Number($('#cantidad').val()) - Number(1);
			$('input[name=cantidad]').val(cant);
			$(this).parent().find("span").html(cant);
		}
	});

	$(document).on("click", "[class*='boton_sumar']", function(e) {
		if (Number($('#cantidad').val()) >= Number(1) )
		{
			var cant = Number($('#cantidad').val())+Number(1);
			$('input[name=cantidad]').val(cant);
			$(this).parent().find("span").html(cant);
		}
	});

});