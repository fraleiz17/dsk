<?php

if (!defined('BASEPATH'))
    die("No hay acceso directo a este script");

/*
 * Modelo para manejar datos defaults
 */

class Venta_model extends CI_Model {

    var $tablas = array();

    function __construct() {
        parent::__construct();
        $this->load->config('tables', TRUE);
        $this->tablas = $this->config->item('tablas', 'tables');
    }

    function getAnuncios($seccion = null) {
        $this->db->select("*,(select foto from fotospublicacion f where f.publicacionID = p.publicacionID group by f.publicacionID limit 1) as foto");
        $this->db->from("publicaciones p");
        //$this->db->join("fotospublicacion fp", "p.detalleID=fp.detalleID AND p.paqueteID=fp.paqueteID AND p.publicacionID=fp.publicacionID AND p.servicioID=fp.servicioID");
        $this->db->join("serviciocontratado sc", "p.detalleID=sc.detalleID AND p.paqueteID=sc.paqueteID AND p.servicioID=sc.servicioID");
        $this->db->join("detallepaquete dp", "sc.paqueteID=dp.paqueteID AND sc.detalleID=dp.detalleID");
        $this->db->join("raza r", "p.razaID=r.razaID");
        /*
         * No se debe relacionar porque puede traer uno a n links debe traerse por ajax
          $this->db->join("videos v", "p.detalleID=v.detalleID AND p.paqueteID=v.paqueteID AND p.publicacionID=v.publicacionID AND p.servicioID=v.servicioID");
         */
        $this->db->join("paquete pa", "dp.paqueteID=pa.paqueteID");
        $this->db->join("seccion se", "p.seccion=se.seccionID");
        $this->db->join("usuario u", "sc.idUsuario=u.idUsuario");

        $this->db->where("p.aprobada", 1);
        $this->db->where("p.vigente", 1);
        
        if(!is_null($seccion)){
             $this->db->where("p.seccion", $seccion);
        }

        $resultSet = $this->db->get();

        return $resultSet->result();
		
		
    }

    public function getCountSalePets() {
        $this->db->from("publicaciones");
        $this->db->where("seccion", 2);

        return $this->db->count_all_results();
    }

    public function getCountCrossPets() {
        $this->db->from("publicaciones");
        $this->db->where("seccion", 3);

        return $this->db->count_all_results();
    }

    public function getCountAdoptionPets() {
        $this->db->from("publicaciones");
        $this->db->where("seccion", 6);

        return $this->db->count_all_results();
    }

    public function getCountLostPets() {
        $this->db->from("publicaciones");
        $this->db->where("seccion", 7);

        return $this->db->count_all_results();
    }

    public function getCountDirectory() {
        $this->db->from("publicaciones");
        $this->db->where("seccion", 4);

        return $this->db->count_all_results();
    }

    function deleteDetalle($id, $detalle) {
        $this->db->where('productoID', $id);
        $this->db->where('detalle', $detalle);
        $this->db->delete($this->tablas['productodetalle']);
        return true;
    }

    function deleteFoto($id) {
        $this->db->where('productoID', $id);
        $this->db->delete($this->tablas['fotostienda']);
        return true;
    }

    function updatePaquete($paqueteID, $data) {
        $this->db->where('paqueteID', $paqueteID);
        $this->db->update($this->tablas['detallepaquete'], $data);
        return true;
    }

    function deleteCupon($paquete) {
        $this->db->where('paqueteID', $paquete);
        $this->db->delete($this->tablas['cupon']);
        return true;
    }

    function getDatosAnunciante($publicacionID) {
        $query = $this->db->query("SELECT * FROM (`publicaciones` p) JOIN `serviciocontratado` sc ON `p`.`detalleID`=`sc`.`detalleID` AND p.paqueteID=sc.paqueteID AND p.servicioID=sc.servicioID 
        JOIN `detallepaquete` dp ON `sc`.`paqueteID`=`dp`.`paqueteID` AND sc.detalleID=dp.detalleID 
        JOIN `usuario` u ON `sc`.`idUsuario`=`u`.`idUsuario` 
        WHERE `p`.`publicacionID` = " . $publicacionID);
        if ($query->num_rows() == 1)
            return $query->row();
        return null;
    }

        function getFotos($id_anuncio){
        $this->db->from("publicaciones p");
        $this->db->join("fotospublicacion fp", "p.publicacionID=fp.publicacionID");
        $this->db->where("p.publicacionID", $id_anuncio);
         $resultSet = $this->db->get();
       // $this->output->enable_profiler(TRUE);
//var_dump($resultSet);
        return array('data' => $resultSet->result(), 'count' => $resultSet->num_rows);
        }
		
		
		  function getVideo($id_anuncio){
        $this->db->from("videos vi");
        $this->db->where("publicacionID", $id_anuncio);
         $resultSet = $this->db->get();
       // $this->output->enable_profiler(TRUE);
//var_dump($resultSet);
        return array('data' => $resultSet->result(), 'count' => $resultSet->num_rows);
        }

function getAnunciante($id_anuncio){
	    
		$this->db->from("publicaciones p");
        $this->db->join("serviciocontratado sc",
		 "p.servicioID=sc.servicioID");
		  $this->db->join("usuario u",
		 "sc.idUsuario=u.idUsuario");
		 $this->db->join("estado e",
		 "e.estadoID=p.estadoID");
		 
		
        $this->db->where("p.publicacionID", $id_anuncio);
         $resultSet = $this->db->get();
       // $this->output->enable_profiler(TRUE);
//var_dump($resultSet);
        return array('data' => $resultSet->result(), 'count' => $resultSet->num_rows);
	
	}



    function getPublicaciones($raza = null, $genero = null, $estado = null, $precio = null, $palabra_clave = null, $id_anuncio = null, $seccion = null) {
        /*
         * 
         * Posible recomentacion para pasarlo a una vista
         */
        //$this->db->select("*,(select foto from fotospublicacion f where f.publicacionID = p.publicacionID group by f.publicacionID limit 1) as foto");
        $this->db->from("publicaciones p");

        $this->db->join("serviciocontratado sc", "p.detalleID=sc.detalleID AND p.paqueteID=sc.paqueteID AND p.servicioID=sc.servicioID");
        $this->db->join("detallepaquete dp", "sc.paqueteID=dp.paqueteID AND sc.detalleID=dp.detalleID");

        $this->db->join("raza r", "p.razaID=r.razaID");
        $this->db->join("paquete pa", "dp.paqueteID=pa.paqueteID");
        $this->db->join("seccion se", "p.seccion=se.seccionID");
        $this->db->join("usuario u", "sc.idUsuario=u.idUsuario");
        $this->db->join("estado es", "p.estadoID=es.estadoID");
        /**
        *Se comenta para que no se traiga las fotos pues, estas se extraen de forma independiente.
        **/
        //$this->db->join("fotospublicacion fp", "p.publicacionID=fp.publicacionID"); $this->db->join("videos vi", "p.publicacionID=vi.publicacionID");

        
        


        if (!is_null($raza)) {
            $this->db->where('p.razaID', $raza);
        }

        if (!is_null($genero)) {
            $this->db->where("p.genero", $genero);
        }

        if (!is_null($estado)) {
            $this->db->where("p.estadoID", $estado);
        }
        if (!is_null($id_anuncio)) {
            $this->db->where("p.publicacionID", $id_anuncio);
        }
        
        if(!is_null($seccion)){
             $this->db->where("p.seccion", $seccion);
        }

        if (!is_null($palabra_clave)) {

            $clause = "(p.titulo like '%" . $palabra_clave . "%'";
            $clause .= "OR p.descripcion like '%" . $palabra_clave . "%'";
            $clause .= "OR r.raza like '%" . $palabra_clave . "%')";
            $this->db->where($clause);
        }

        $this->db->where("p.aprobada", 1);
        $this->db->where("p.vigente", 1);

        if (!is_null($precio)) {
            $this->db->order_by("p.precioVenta", $precio);
        }

        $resultSet = $this->db->get();
//        $this->output->enable_profiler(TRUE);

        return array('data' => $resultSet->result(), 'count' => $resultSet->num_rows);
    }

    function getIDusuario($id) {
        $this->db->from('publicaciones p');
        $this->db->join('serviciocontratado sc', 'p.servicioID=sc.servicioID');
        $this->db->join('usuario u', 'u.idUsuario=sc.idUsuario');
        $this->db->where('p.publicacionID', $id);


        return $this->db->get()->row();

        
    }

    function getPublicacionR($id_anuncio) {
        /*
         * 
         * Posible recomentacion para pasarlo a una vista
         */
        //$this->db->select("*,(select foto from fotospublicacion f where f.publicacionID = p.publicacionID group by f.publicacionID limit 1) as foto");
        $this->db->from("publicaciones p");

        $this->db->join("serviciocontratado sc", "p.detalleID=sc.detalleID AND p.paqueteID=sc.paqueteID AND p.servicioID=sc.servicioID");
        $this->db->join("detallepaquete dp", "sc.paqueteID=dp.paqueteID AND sc.detalleID=dp.detalleID");

        $this->db->join("raza r", "p.razaID=r.razaID");
        $this->db->join("paquete pa", "dp.paqueteID=pa.paqueteID");
        $this->db->join("seccion se", "p.seccion=se.seccionID");
        $this->db->join("usuario u", "sc.idUsuario=u.idUsuario");
        $this->db->join("estado es", "p.estadoID=es.estadoID");
        /**
        *Se comenta para que no se traiga las fotos pues, estas se extraen de forma independiente.
        **/
        //$this->db->join("fotospublicacion fp", "p.publicacionID=fp.publicacionID"); $this->db->join("videos vi", "p.publicacionID=vi.publicacionID");

        
        if (!is_null($id_anuncio)) {
            $this->db->where("p.publicacionID", $id_anuncio);
        }
        
        
        //$this->db->where("p.aprobada", 1);
        $this->db->where("p.vigente", 1);

    
        $resultSet = $this->db->get();
//        $this->output->enable_profiler(TRUE);

        return $resultSet->row();
    }

}

?>