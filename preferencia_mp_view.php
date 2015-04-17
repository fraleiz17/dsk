<?php 
$preference_data = array(
            "items" => array(
                array(
                    "title" => "Publicacion de anuncio",
                    "quantity" => 1,
                    "currency_id" => "MXN",
                    "unit_price" => floatval(10.00)
                )
            ),
            "payer" => array(
                'name' => $this->session->userdata('nombre'),
                'surname' => $this->session->userdata('apellido'),
                'email' => $this->session->userdata('correo')
            ),
        );


        $preference = $this->mercadopago->create_preference($preference_data);
?>
<ul class="boton_verde">
 <li>
  <script type="text/javascript" src="http://mp-tools.mlstatic.com/buttons/render.js"></script>
<a href="<?php echo $preference['response']['sandbox_init_point']; ?>" name="MP-Checkout" class="lightblue-ar-s-ov" mp-mode="modal" onreturn="execute_my_onreturn" style="padding: 0px;">Pagar</a>

 <script type="text/javascript">
  function execute_my_onreturn(json) {
    console.log(json.back_url, json.collection_id, json.collection_status, json.external_reference, json.preference_id);

 if (json.collection_status == 'approved' || json.collection_status == 'in_process') {
     
                var form = $('#p_form');
                $.ajax({
                    url:'<?php echo base_url('venta/anuncio') ?>',
                    type:'post',
                    dataType: 'JSON',
                    data: form.serialize(),
                    success: function(data){
                        window.location = '<?php echo base_url() ?>principal/miperfil';
                    }
                });


} else if (json.collection_status == 'pending') {
    alert('El usuario no completó el pago');
	} else if (json.collection_status == 'rejected') {
      alert('El pago fué rechazado, el usuario puede intentar nuevamente el pago');
}
}
                                                                        </script>
                                                                    </li>
                                                                </ul>                        
                        <!--<div id="iframe"></div>-->
                        <br/>