<?php

class DataBase {
    public $db;
    protected $resultado;
    protected $prep;
    protected $consulta;
    
    public function __construct($dbhost, $dbuser, $dbpass, $dbname){
        $this->db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        if($this->db->connect_errno){
            trigger_error("Fallo la conexion con mysql, tipo error -> ({$this->db->connect_error})", E_USER_ERROR);
            exit;
        }
        
        $this->db->set_charset( 'utf8');
    }
    
    
    public function getUsuarios(){
        $this->resultado = $this->db->query("SELECT * FROM usuarios");
        return $this->resultado->fetch_all();
    }
    
    public function getAssoc(){
        return $this->resultado->fetch_assoc();
    }
    
    public function preparar( $consulta ){
        $this->consulta = $consulta;
        $this->prep = $this->db->prepare( $this->consulta );
        if(!$this->prep){
            trigger_error( "Error al preparar la consulta", E_USER_ERROR );
        } else {
            return true;
        }
    }
    
    public function ejecutar(){
        if (!$this->prep->execute()) {
            echo "Falló la ejecución: (" . $this->prep->errno . ") " . $this->prep->error;
        }
    }
    
    public function prep(){
        return $this->prep;
    }
    
    public function resultado() {
        return $this->prep->fetch();
    }
    
    public function cambiarDatabase( $db ) {
        $this->db->select_db( $db );
    }
    
    public function validarDatos( $columna, $tabla, $condicion) {
        $this->resultado = $this->db->query( "SELECT $columna FROM $tabla WHERE $columna = '$condicion'");
        $chequear = $this->resultado->num_rows;
        return $chequear;
    }
    
    public function filasAfectadas(){
        return $this->prep->affected_rows;
    }
    
    public function liberar(){
        $this->prep->free_result();
    }
    
    public function cerrar(){
        $this->db->close();
        $this->prep->close();
    }
}