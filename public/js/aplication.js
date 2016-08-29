$(function () {

	// TOOLTIP
	$("[data-toggle='tooltip']").tooltip();

	// CAROUSEL
	$('.carousel').carousel();

	// MODAL VIEW
	$(document).on("click",'[class*="modal-view"]', function(e){
		e.preventDefault();
		modal = $("#genericDialog");
		$.get( $(this).attr('href'), function( data ) {
		  if((data.title != undefined)&&(data.html != undefined)){
			  modal.find('.modal-title').html(data.title);
			  modal.find('.modal-body').html(data.html);
			  if (data.size != undefined)
			  {
			  	modal.find('.modal-dialog').addClass(data.size);
			  }
		  }
		  else{
		  	//revisar si existe otro caso en el que no se retorne respuesta en ajax
		  	//si estan bien restringidas las opciones desde la vista, este mensaje no se ve nunca
		  	modal.find('.modal-title').html('<span class="glyphicon glyphicon-record"></span> P&aacute;gina restringida');
				modal.find('.modal-body').html('<center><p>No tiene permisos para acceder a esta p&aacute;gina.</p></center>');
		  }
		  if(modal.find('form').size() > 0){
		  	modal.find('.modal-footer').hide();
		  }else{
		  	modal.find('.modal-footer').show();
		  }
		  modal.modal();
		});
	});
	

});