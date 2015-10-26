<?php $this -> load -> view('admin/menu_view.php') ?>
<link rel="stylesheet" href="<?php echo base_url()?>css/validator/validationEngine.jquery.css" type="text/css"/>
<script src="<?php echo base_url()?>js/funciones_.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/validator/languages/jquery.validationEngine-es.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/validator/jquery.validationEngine.js"></script>
 



<script>
jQuery(document).ready(function(){
	
	 
	
	 
	 $(".editarG").click(function() {		 	
             var grupoID = $(this).attr('data-rel');   
			 console.log(grupoID);  
			 muestra('contenedor_modificaciones'+grupoID);
     });

      $(".addEstado").click(function(e){
        e.preventDefault(); 
		 var grupoID = $(this).attr('data-rel'); 		 
       	 var estadoID = $('#estadoA'+grupoID).val();
       	 if(estadoID != ''){
       	 var estadoNombre = $('#estadoA'+grupoID+' option:selected').html();
		 var contador = 0; 
		 console.log(estadoID,estadoNombre);  

		  $('<p id="estadoP'+grupoID+'"><select name="estado[]" class=""><option value="'+estadoID+'"> '+estadoNombre+' </option><?php foreach ($estados as $edo) : ?><option value="<?php echo $edo->estadoID ?>" > <?php echo $edo->nombreEstado ?> </option><?php endforeach; ?></select><a href="#" id="eliminar" class="eliminar" style="color:#fff; font-size:9px;">Eliminar</a><br></p>').appendTo('#destinos'+grupoID);
		  var estadoID = $('#estadoA'+grupoID).val('');
		contador++;
		}
        
   	 });
	 
	 $("body").on("click",".eliminar", function(e){
            $(this).parent('p').remove(); 
        return false;
     });
	 
	
	

	 
});

function ajaxValidationCallback(status, form, json, options){
  if (status === true) {
        
        var data = json;
        console.log(data.response);
        if(data.response == true){
                               
                              location.reload();                                                                            
          
        }                                                                          
  }
}

jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("form").validationEngine({
				promptPosition           : "topRight",
				scroll                   : false,
				ajaxFormValidation       : false,
				ajaxFormValidationMethod : 'post'
			});

     
});

</script>

</head>
<body>
<?php if($gruposEnvio != null):
      foreach($gruposEnvio as $grupo):
	 	$grupoID = $grupo->grupoID; ?>
<div class="contenedor_modificaciones" id="contenedor_modificaciones<?=$grupoID?>" style="display:NONE"> <!-- Contenedor negro imagenes-->
<div class="cerrar_modificaciones"> <img src="<?php echo base_url()?>images/cerrar.png" onclick="oculta('contenedor_modificaciones<?=$grupoID?>');"/> </div>


<div class="modificaciones"> 
<form id="addProduct" method="post" action="<?=base_url()?>admin/tiendaAdmin/editGrupo/<?=$grupoID?>" enctype="multipart/form-data" class="addProduct">
<div class="titulo_modificaciones"> 
EDITAR GRUPO <?=$grupoID?>
</div>

<div class="texto_inputs">
<p style="margin-top:15px;"> Costo: </p>
<p style="margin-top:15px;"> Destinos: </p>
</div>

<div class="contendeor_inputs">
<p><input name="costo" type="text" class="validate[required,custom[number]" id="sku" style="min-width:153px; height:20px;" maxlength="4" value="<?=$grupo->costo?>"/></p>
<br>
<input type="hidden" name="estado[]" id="estado[]" value="0" />
<p id="estadoP<?=$grupoID?>">
<select name="estado[]" class="" id="estadoA<?=$grupoID?>">
                                        <option value=""> --- </option>
                                        <?php foreach ($estados as $edo) : ?>
                                            <option value="<?php echo $edo->estadoID ?>"> <?php echo $edo->nombreEstado ?> </option>
                                        <?php endforeach; ?>
                                    </select> <a href="#" id="addEstado" class="addEstado" style="color:#fff; font-size:9px; margin-top:8px;" data-rel="<?=$grupoID?>">Agregar</a><br>
<p id="destinos<?=$grupoID?>">
<?php foreach ($destinos as $ds ) { 
			if($ds->grupoID == $grupoID){ ?>
<p>

 <select name="estado[]" class="">
                                        <option value=""> --- </option>
                                        <?php foreach ($estados as $edo) : ?>
                                            <option value="<?php echo $edo->estadoID ?>" <?php echo $ds->estadoID === $edo->estadoID ? 'selected' : ''; ?>> <?php echo $edo->nombreEstado ?> </option>
                                        <?php endforeach; ?>
                                    </select> <a href="#" id="eliminar" class="eliminar" style="color:#fff; font-size:9px;">Eliminar</a><br>
</p>
 <?php } 
	} ?>

</p>
</div>


<br>
<br>

<ul class="morado_reg">
<li>
<input type="submit" value="Editar" id="addButton"/>
</li>
</ul>
</form>
</div>


</div> <!-- Fin contenedor negro imagenes -->
<?php endforeach;
endif;?>















<div class="contenedor_central">
<div class="titulo_seccion">
GASTOS DE ENV&Iacute;O
</div>
<br>
<table class="tabla_carrito" width="990">
<tr>
<th width="77">
ID del Grupo
</th>
<th width="67">
Costo
</th>
<th width="135">
Destinos
</th>

<th width="72">
Editar
</th>
</tr>

<?php if($gruposEnvio != null){
		foreach ($gruposEnvio as $gpo) { ?>

		<tr>
<td width="77">
<?=$gpo->grupoID?>
</td>
<td width="67">
$ <?=$gpo->costo?>.00
</td>
<td width="135">
<?php if($destinos != null){
		foreach ($destinos as $ds ) { 
			if($ds->grupoID == $gpo->grupoID){
				echo $ds->nombreEstado.'<br>';
			}

		}
	}?>
</td>

<td>
<img src="<?=base_url()?>images/editar.png" class="editarG" id="editarG" data-rel="<?=$gpo->grupoID?>"/>
</td>
</tr>
			
<?php 
	  	}
	  } ?>


</table>

</div>

</body>
