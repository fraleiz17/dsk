<?php

class datatest extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->helper('array');
        $this->load->model('test/test_model');
    }

    public function insert_usuario() {
        $data = array();

        $data['usuario'] = array();
        $data['usuariodetalle'] = array();
        $data['usuariodato'] = array();
        $data['ubicacionusuario'] = array();

        $rows = 801;
        for ($i = $rows; $i <= $rows + 300; $i++) {
            $data['usuario'][$i] = array(
                'idUsuario' => $i,
                'apellido' => 'apellido ' . $i,
                'authKey' => '9FA9CDFB3835D3B45F0B',
                'codigoConfirmacion' => 'B1E02B934AE20001B6BF05E8B',
                'contrasena' => 'c1eb40405ff63b6c3671ddf9351e340a1910227976066de5f5',
                'correo' => 'correo_' . $i . '@interkreativa.com',
                'fechaRegistro' => '2014-07-17 17:24:18',
                'last_ip_access' => NULL,
                'nivel' => '3',
                'nombre' => 'nombre ' . $i,
                'paqueteGratis' => '1',
                'recepcionCorreo' => '1',
                'status' => '1',
                'telefono' => '1231231234',
                'tipoUsuario' => 2,
                'useragent' => NULL,
            );

            $data['usuariodetalle'][$i] = array(
                'idUsuarioDetalle' => $i,
                'calle' => 'calle ' . $i,
                'colonia' => 'colonia ' . $i,
                'correo' => 'correo__' . $i,
                'cp' => '70707',
                'descripcion' => 'ninguna',
                'giro' => '???',
                'idEstado' => '22',
                'idUsuario' => $data['usuario'][$i]['idUsuario'],
                'logo' => null,
                'nombreContacto' => 'Contacto ' . $i,
                'nombreNegocio' => 'Negocio ' . $i,
                'numero' => '00' . $i,
                'paginaWeb' => 'ninguna.',
                'telefono' => '1231231231',
                'tipoUsuario' => 2
            );

            $data['usuariodato'][$i] = array(
                'idUsuarioDato' => $i,
                'calle' => 'F calle ' . $i,
                'cp' => '90909',
                'estadoID' => '12',
                'idPais' => '146',
                'idUsuario' => $data['usuario'][$i]['idUsuario'],
                'municipio' => 'municipio ' . $i,
                'noExterior' => '800' . $i,
                'noInterior' => '900' . $i,
                'razonSocial' => 'Empresa ' . $i . ' sa de cv',
                'rfc' => 'eas871011ki' . str_pad($i, 2, '0', STR_PAD_LEFT),
            );

            $data['giroempresa'][$i] = array(
                'giroID' => 3,
                'idUsuarioDetalle' => $data['usuariodetalle'][$i]['idUsuarioDetalle']
            );

            $data['ubicacionusuario'][$i] = array(
                'estadoID' => 22,
                'idUsuarioDato' => $data['usuariodato'][$i]['idUsuarioDato'],
                'latitud' => '20.5593958',
                'longitud' => '-100.4190292',
                'tipoUsuario' => 3,
                'zonageograficaID' => 5
            );
        }

        $this->insert_data($data);
    }

    function insert_anuncios_admin() {

        $data = array();


        $data['serviciocontratado'] = array();
        $data['publicaciones'] = array();
        $data['fotospublicacion'] = array();
        $data['videos'] = array();


        $rows = 801;

        $obj_date = new DateTime(date('Y-m-d H:i:s'));
        $obj_date_end = new DateTime($obj_date->format('Y-m-d H:i:s'));
        $obj_date_end->add(new DateInterval('P1M'));

        for ($i = $rows; $i < $rows + 300; $i++) {
            $paq = rand(1,3);
            
            $data['serviciocontratado'][$i] = array(
                'servicioID' => $i,
                'cantFotos' => rand(0, 3),
                'caracteres' => 100,
                'vigencia' => 30,
                'cupones' => 2,
                'videos' => 1,
                'precio' => rand(0, 1000),
                'detalleID' => $paq,
                'paqueteID' => $paq,
                'idUsuario' => $i,
            );

            $data['publicaciones'][$i] = array(
                'publicacionID' => $i,
                'seccion' => random_element(array(1,3,6,7,4,2)),
                'titulo' => 'Titulo ' . $i,
                'vigente' => 1,
                'fechaCreacion' => $obj_date->format('Y-m-d H:i:s'),
                'fechaVencimiento' => $obj_date_end->format('Y-m-d H:i:s'),
                'numeroVisitas' => 1,
                'estadoID' => 22,
                'genero' => $i % 2 ? 1 : 0,
                'razaID' => rand(1, 83),
                'precio' => rand(0, 1000),
                'descripcion' => 'Descripcion ' . $i,
                'muestraTelefono' => rand(0, 1),
                'aprobada' => rand(0, 1),
                'servicioID' => $data['serviciocontratado'][$i]['servicioID'],
                'detalleID' => $data['serviciocontratado'][$i]['detalleID'],
                'paqueteID' => $data['serviciocontratado'][$i]['paqueteID'],
                'ciudad' => 'Guanasebi'
            );

            $data['fotospublicacion'][$i] = array(
                'detalleID' => $data['serviciocontratado'][$i]['detalleID'],
                'paqueteID' => $data['serviciocontratado'][$i]['paqueteID'],
                'publicacionID' => $data['publicaciones'][$i]['publicacionID'],
                'servicioID' => $data['serviciocontratado'][$i]['servicioID'],
                'foto' => 'images/negocio_logo/mundo_mascotas.png',
            );

            $data['videos'][$i] = array(
                'detalleID' => $data['serviciocontratado'][$i]['detalleID'],
                'paqueteID' => $data['serviciocontratado'][$i]['paqueteID'],
                'publicacionID' => $data['publicaciones'][$i]['publicacionID'],
                'servicioID' => $data['serviciocontratado'][$i]['servicioID'],
                'link' => ''
            );
        }

        $this->insert_data($data);
    }
    
    public function insert_paquete_negocio(){
        
        $data['paquete'] = array();
        $data['detallepaquete'] = array();
        $data['cupon'] = array();
        $data['cupondetalle'] = array();
        
        $init = 200;
        
        for($i = $init; $i < $init+4; $i++){
            $data['paquete'][$i] = array(
                'paqueteID' => $i,
                'nombrePaquete' => 'Nombre '.$i,
            );
            
            $data['detallepaquete'][$i] = array(
                'detalleID' => $i,
                'cantFotos' => 1,
                'caracteres' => 400,
                'vigencia' => 30, 
                'cupones' => 1,
                'videos' => 0,
                'precio' => 85,
                'paqueteID' => $data['paquete'][$i]['paqueteID'],
                'tipoPaquete' => 2
            );
            
            $data['cupon'][$i] = array(
              'cuponID' => $i,
                'nombreCupon' => 'nombre cupon '.$i,
                'paqueteID' => $data['paquete'][$i]['paqueteID']
            );
            
            $data['cupondetalle'][$i] = array(
                'cuponDetalleID' => $i,
                'cuponID' => $data['cupon'][$i]['cuponID'],
                'descripcion' => 'descripcion '.$i,
                'tipoCupon' => 2,
                'valor' => 10,
                'vigencia' => 0 // se asigna a cero por que el cupon de aplica de inmediato a la compra
            );
        }
        $this->insert_data($data);
    }

    private function insert_data($data) {
        $this->db->trans_start();
        $this->test_model->insertData($data);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo "<div class='alert alert-warning'>Fallo</div>";
        } else {
            $this->db->trans_commit();
            echo '<div class="alert alert-success">Agregados</div>';
        }
    }

}
