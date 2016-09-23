$(function(){

	$("a[id^='submit_']").on("click", function(e)
	{
		e.preventDefault();
		$('#estado').prop('value', $(this).data('estado'));
		$('#formCambioEstado').submit();
	});
});