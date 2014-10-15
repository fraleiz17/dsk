<?php
if (!defined('BASEPATH'))
        die();

class TiendaAdmin extends CI_Controller {
    
    

        public function __construct(){
        parent::__construct();
        if(!is_logged()){
            $query = $_SERVER['QUERY_STRING'] ? '?'.$_SERVER['QUERY_STRING'] : '';
            $redir = str_replace('/', '-', uri_string().$query);
            redirect('principal');
        } // checamos si existe una sesión activa
            
       
        $this->load->helper(array('form', 'url'));
        $this->load->model('defaultdata_model');
        $this->load->model('file_model');
        $this->load->library('googlemaps');
        $this->load->model('admin_model');

        //is_authorized($nivelesReq, $idPermiso, $nivelUsuario, $rolUsuario)
        if (!is_authorized(array(0), 4, $this->session->userdata('nivel'), $this->session->userdata('rol'))) {
                $this->session->set_flashdata('error', 'userNotAutorized');
                redirect('principal');
        }

        }

        
    
    
    public function index() {
        $data['SYS_metaTitle']           = '';
        $data['SYS_metaKeyWords']       = '';
        $data['SYS_metaDescription']    = '';  
        $data['catalogoProductos']    = $this->admin_model->getCatalogoProductos();
        $data['fotostienda']    = $this->defaultdata_model->getTable('fotostienda');
        $data['detalleProducto']    = $this->defaultdata_model->getTable('productodetalle');
        $this->load->view('admin/adminT_view',$data);
    }


    function addProduct(){
        
        $data = array(
            'sku' => $this->input->post('sku'), 
            'nombre' => $this->input->post('nombre'), 
            'descripcion' => $this->input->post('descripcion'), 
            'precio' => $this->input->post('costo')
        );

        $productoID = $this->admin_model->insertItem('catalogoproductos',$data);
         
        //REGISTRO OPCIONES
        $talla = $this->input->post('talla');
                if( $talla != null){
                    for($i=0;$i<=count($talla)-1;$i++){
                        
                        if($talla[$i] != '0'){
                        $arrTalla= array(
                            'productoID'   => $productoID,
                            'detalle' => 'talla',
                            'valor' =>$talla[$i]
                        );
                            $e = $this->admin_model->insertItem('productodetalle',$arrTalla);
                            //var_dump($e);
                        }
                        $arrTalla = null;
                    }
                }

        $color = $this->input->post('color');
                if( $color != null){
                    for($i=0;$i<=count($color)-1;$i++){
                        
                        if($color[$i] != '0' && $color[$i] != ''){
                        $arrColor= array(
                            'productoID'   => $productoID,
                            'detalle' => 'color',
                            'valor' =>$color[$i]
                        );
                            $e = $this->admin_model->insertItem('productodetalle',$arrColor);
                            //var_dump($e);
                        }
                        $arrColor = null;
                    }
                }


        //REGISTRO FOTOS
        $this->load->library('upload'); 

      
        $config['upload_path'] = 'images/productos';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '5120';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $this->upload->initialize($config);

        if ($this->upload->do_multi_upload("fotoproducto")) { 
            $imagenes = $this->upload->get_multi_upload_data(); 
            foreach ($imagenes as $imagen) {
               $data = array(
                    'foto' => $imagen['file_name'], 
                    'productoID' => $productoID
                );

                $fotoID = $this->admin_model->insertItem('fotostienda',$data);
            }
        }

        redirect('admin/tiendaAdmin');

    }

    function deleteProduct(){
        $productoID = $this->input->post('productoIDE');
        $this->admin_model->deleteItem('productoID',$productoID,'catalogoproductos');
        redirect('admin/tiendaAdmin');
    }


    

    function uploadBanner(){
        $posicion = $this->input->post('posicion');//$this->input->post('posicion'); // '1 - superior 2 - centro - 3 abajo - 4 lateral'
        $seccionID = $this->input->post('numeroSeccionR'); // inici, venta, perros perdidos, etc.
        $zonaID = $this->input->post('zonaIDR');

        
        switch ($posicion) {
            case 1:
                 $alto = 93;
                 $ancho = 638;
                 $folder = 'banner_superior';
            break;

            case 2:

                switch ($seccionID) {
                    case 1:
                        $alto = 400;
                        $ancho = 644;
                        $folder = '';
                    break;

                    case 8:
                        $alto = 166;
                        $ancho = 136;
                        $folder = 'raza_mes';
                    break;

                    case 9:
                        $alto = 170;
                        $ancho = 220;
                        $folder = 'eventos';
                    break;

                    case 10:
                        $alto = 164;
                        $ancho = 86;
                        $folder = 'curiosos';
                    break;
                }
                
            break;

            case 3:
                 $alto = 93;
                 $ancho = 638;
                 $folder = 'banner_inferior';
            break;

            case 4:
                 $alto = 190;
                 $ancho = 215;
                 $folder = 'banner_lateral';
            break;
            
            
        }

        $file_data = array(
                'date'=>false,
                'random' => true,
                'user_id' => null,
                'width'=> $ancho,
                'height' => $alto
        );
        //var_dump($file_data);

        $imagen = $this->file_model->uploadBanner($folder, $file_data, 'banner', true);
            if (is_array($imagen)) {                // $data['response'] = 'false';
                // $data['error'] = $imagen['error'];
                //$this -> session -> set_flashdata('custom_error', $imagen['error']);
                echo 'error';
                //var_dump($imagen);
            }else{

                $data = array(
                    'imgbaner' => $folder.'/'.$imagen, 
                    'zonaID' => $zonaID,
                    'posicion' => $posicion,
                    'seccionID' => $seccionID
                );

                $banner = $this->admin_model->insertBanner($data);
            }

         redirect('admin/principal/getAdminP');
    }


    function tablasDinamicas(){
            var_dump($_POST);
            echo '------------------';
            $seccionID = 1;//$this->input->post('numeroSeccionR');
            $zonaID = 1;//$this->input->post('zonaIDR');
            $data['contenido'] = $this->admin_model->getBanner($seccionID,$zonaID);
            $data['seccionID'] = $seccionID;
            $data['zonaID'] = $zonaID;
            
            $this->load->view('admin/contenido_dinamico_view',$data);
        
    }

    function deleteContent(){
        $idZona = $this->input->post('zonaContent');
        $idSeccion = $this->input->post('seccionContent');
        $posicion = $this->input->post('posicionContent');
        $idContent = $this->input->post('bannerIDContent');

        
        $this->admin_model->deleteContent($idContent,$idZona, $idSeccion,$posicion);
        return true;
         redirect('admin/principal/getAdminP');
    }

    function updateBannerText(){
       
        $data = array(
            'texto' => $this->input->post('texto'), 
        );
        $idContent = $this->input->post('bannerIDContent');
        $this->admin_model->updateBannerText($idContent,$data);
        redirect('admin/principal/getAdminP');
    }

    function deleteBannerText(){
       
        $data = array(
            'texto' => $this->input->post('textoT'), 
        );
        $idContent = $this->input->post('bannerIDContentT');
        $this->admin_model->updateBannerText($idContent,$data);
        redirect('admin/principal/getAdminP');
    }

    function deleteTextApoyo(){
       
        
        $idContent = $this->input->post('bannerIDContentT');
        $this->admin_model->deleteContent($idContent,null, null,null);
        redirect('admin/principal/getAdminP');
    }


    function uploadText(){
        
       $data = array(
        'zonaID' => $this->input->post('zonaContentN'),
        'posicion' => $this->input->post('posicionContentN'),
        'seccionID' => $this->input->post('seccionContentN'),
        'texto' => $this->input->post('textoContentN')
       );
       $banner = $this->admin_model->insertBanner($data);
       redirect('admin/principal/getAdminP');
    }

    function editProduct(){
        $productoID = $this->input->post('productoID');
        $data = array(
            'sku' => $this->input->post('sku'), 
            'nombre' => $this->input->post('nombre'), 
            'descripcion' => $this->input->post('descripcion'), 
            'precio' => $this->input->post('costo')
        );
        $this->admin_model->updateItem('productoID',$productoID,$data,'catalogoproductos');

        $talla = $this->input->post('talla');
        $this->admin_model->deleteDetalle($productoID,'talla');
                if( $talla != null){
                    for($i=0;$i<=count($talla)-1;$i++){
                        
                        if($talla[$i] != '0'){
                        $arrTalla= array(
                            'productoID'   => $productoID,
                            'detalle' => 'talla',
                            'valor' =>$talla[$i]
                        );
                            $e = $this->admin_model->insertItem('productodetalle',$arrTalla);
                            //var_dump($e);
                        }
                        $arrTalla = null;
                    }
                }

         $color = $this->input->post('color');
         $this->admin_model->deleteDetalle($productoID,'color');
                if( $color != null){
                    for($i=0;$i<=count($color)-1;$i++){
                        
                        if($color[$i] != '0' && $color[$i] != ''){
                        $arrColor= array(
                            'productoID'   => $productoID,
                            'detalle' => 'color',
                            'valor' =>$color[$i]
                        );
                            $e = $this->admin_model->insertItem('productodetalle',$arrColor);
                            //var_dump($e);
                        }
                        $arrColor = null;
                    }
                }

         $imagen = $this->input->post('imagen');
         $this->admin_model->deleteFoto($productoID);
                if( $imagen != null){
                    for($i=0;$i<=count($imagen)-1;$i++){
                        
                        if($imagen[$i] != ''){
                        $data = array(
                            'foto' => $imagen[$i], 
                            'productoID' => $productoID
                        );

                            $fotoID = $this->admin_model->insertItem('fotostienda',$data);
                        }
                    }
                }


        //REGISTRO FOTOS
        $this->load->library('upload'); 

      
        $config['upload_path'] = 'images/productos';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '5120';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $this->upload->initialize($config);

        if ($this->upload->do_multi_upload("fotoproducto")) { 
            $imagenes = $this->upload->get_multi_upload_data(); 
            foreach ($imagenes as $imagen) {
               $data = array(
                    'foto' => $imagen['file_name'], 
                    'productoID' => $productoID
                );

                $fotoID = $this->admin_model->insertItem('fotostienda',$data);
            }
        }

        redirect('admin/tiendaAdmin');
    }
        

    



    

   


}