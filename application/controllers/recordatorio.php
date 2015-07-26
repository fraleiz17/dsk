<?php if(!defined('BASEPATH')) exit("No direct script access allowed");

class Recordatorio extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('defaultdata_model');
        $this->load->model('email_model');

    }
    
    public function index($ID = null){  
        $anuncios = $this->db->defaultdata_model->recordatorio();
        $this->load->model('email_model');
        if ($anuncios != null){
        foreach ($anuncios as $anuncio) {
        $mensaje = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Notificacion-QuieroUnPerro.com</title>

</head>

<body>
<table width="647" align="center">
<tr>
<td width="231" height="129" colspan="2" valign="top">
<img src="http://quierounperro.com/psk/images/logo_mail.jpg"/>
</td>
</tr>
<!-- <tr>
<td align="center"><h4 style=" font-family:Verdana, Geneva, sans-serif; font-size:14px; padding-left:15px;">¡Bienvenido a QuieroUnPerro.com!</h4></td>
</tr> -->
<tr>
<td style="padding-left:15px;"> 
<font style=" font-family:Verdana, Geneva, sans-serif; margin-top:100px; font-size:13px; font-weight:bold; color:#6A2C91; " >Hola: '.$anuncio->nombre.' </font>
<br/>
<br/>

<font style="font-family:Verdana, Geneva, sans-serif; font-size:13px;">
Te informamos que tu anuncio <strong>"'.$anuncio->titulo.'"</strong> est&aacute; a punto de vencer. Recuerda que puedes consultar la vigencia de tus anuncio y renovarlo en caso de que lo desees, consultando en la secci&oacute;n de Administrador de Anuncios, en Mi Perfil.<br/><br/>
Cualquier duda, escr&iacute;benos a contacto@quierounperro.com
</font>
<p> </p>
</td>
</tr>

<tr>
<td colspan="7" >
<font style=" font-family:Verdana, Geneva, sans-serif; font-size:14px; padding-left:15px;"> ¡Muchas Gracias! </font>
<br/>
<font style=" font-family:Verdana, Geneva, sans-serif; font-size:12px; padding-left:15px;"> El Equipo de QuieroUnPerro.com </font>
<br/>
<font style=" font-family:Verdana, Geneva, sans-serif; font-size:10px; padding-left:15px;"> Todos los derechos reservados '.date('Y').' </font>
</td>
</tr>
</table>



</body>
</html>
';
   
    
    $this->email_model->send_email('', $anuncio->correo, 'Tu publicación '.$anuncio->titulo.' en QUP está por caducar',$mensaje);
    $mensaje = '';
        }
    }
    

    }

    function updateVencidos(){
        $vencidos =  $this->defaultdata_model->getVencidos();
        if($vencidos != null){
            foreach ($vencidos as $v) {
                $this->defaultdata_model->updateItem('publicacionID', $v->publicacionID, array('vigente' => 0, ),'publicaciones');
            }
        }
    }

}
?>