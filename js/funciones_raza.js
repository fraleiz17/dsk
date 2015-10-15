$(document).ready(function() {
    $('.contenedor_slide_perro_mes').cycle({
    fx:    'fade', 
    speed:  2500 
	});
	});
	function Ocultar(id)
	{
		$("#"+id).slideUp();
		stop();
	};

	function Mostrar(id)
	{
		
		$("#"+id).slideDown();
		stop();
	};