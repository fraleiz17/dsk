$(document).ready(function() {
    $('.slideshow').cycle({
	fx:     'scrollDown', 
    easing: 'easeOutBounce', 
    delay:  -2000 
	});
	 $('.slideshow_dos').cycle({
  
	});
	$('.slideshow_tres').cycle({ 
    fx:    'scrollRight', 
    delay: -1000 
 });
	 
	  $(".iconos_flotantes2").hide("fast");
});
function mostrar_icono(id){
	   
	  $("#"+id).show(900);
	}
function ocultar_icono(id){
	
	  $("#"+id).hide("fast");
	
	}
	
 function oculta(id){
         var elDiv = document.getElementById(id); //se define la variable "elDiv" igual a nuestro div
         elDiv.style.display='none'; //damos un atributo display:none que oculta el div     
		
       }
  
   function muestra(id){
        var elDiv = document.getElementById(id); //se define la variable "elDiv" igual a nuestro div
        elDiv.style.display='block';//damos un atributo display:block que  el div     
       }

$(function () {

  var $win = $(window);

  // definir mediente $pos la altura en píxeles desde el borde superior de la ventana del navegador y el elemento

  var $pos = 100;
 
function ver_resultado_iconos(id){

	document.getElementById(id).className="iconos_flotantes_dos";
  
  }
  
 function cambiarTipoFuente(id)
{
  var selecto=document.getElementById(id);
  selecto.className='estilo_select_dos';
}



function obtener_usuario(usuario){
	document.getElementById('elegir_usuario').value=usuario;	
	}
function mostrar_formulario(){
	
	div=document.getElementById('elegir_usuario').value;
    muestra(div);
	}