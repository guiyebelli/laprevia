$(function(){ 
	
	$(document).on("click", "[class*='boton_restar']", function(e) {
		var id = $(this).data('id');
		if (Number($('#cantidad_'+id).val()) > Number(1) )
		{
			var cant = Number($('#cantidad_'+id).val()) - Number(1);
			$('input[id=cantidad_'+id+']').val(cant);
			$(this).parent().find("span").html(cant);
		}
	});

	$(document).on("click", "[class*='boton_sumar']", function(e) {
		var id = $(this).data('id');
		if (Number($('#cantidad_'+id).val()) >= Number(1) )
		{
			var cant = Number($('#cantidad_'+id).val())+Number(1);
			$('input[id=cantidad_'+id+']').val(cant);
			$(this).parent().find("span").html(cant);
		}
	});

	$('.formCarrito').on('submit',function(e){
		e.preventDefault();

    $.ajax({
      type:"POST",
      url: $('.formCarrito').attr("action"),
      data:$(this).serialize(),
      dataType: 'json',
      success: function(data)
      {      
        $('#cantidad_carrito').html(data['cant_carrito']);
        Notify(data['msj'], null, null, 'success');
      },
    })
  });

});