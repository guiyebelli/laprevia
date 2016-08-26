$(function(){ 
	
	$(document).on("click", "[class*='boton_restar']", function(e) {
		var id = $(this).data('id');
		$('input[id=metodo_'+id+']').val('restar');
		actualizar($(this).closest('form'));
	});

	$(document).on("click", "[class*='boton_sumar']", function(e) {
		var id = $(this).data('id');
		$('input[id=metodo_'+id+']').val('sumar');
		actualizar($(this).closest('form'));
	});
});

function actualizar(form)
{
  $.ajax({
    type:"POST",
    url: form.attr("action"),
    data: form.serialize(),
    dataType: 'json',
    success: function(data)
    {
      if (data['status'] == 'success')
      { 
     		$('#td_total').html(data['total']);
     		$('#td_subtotal_'+data['id_item']).html(data['subtotal']);
     		$('#span_cantidad_'+data['id_item']).html(data['cantidad']);
      }
      else
      {
        Notify(data['msj'], null, null, 'danger');
      }
    },
  })
}