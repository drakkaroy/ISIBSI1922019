<?php
require_once('../utils/config.php');
require_once(PATH.'utils/Tools.php');
require_once(PATH.'utils/Db.php');

class Cliente {

    private $id;
    private $nombre;
    private $cedula;
    private $telefono;
    private $correo;
    private $direccion;
    private $provincia;
    private $canton;
    private $distrito;  
    
    private $tools;

    public function __construct(){

        $this->tools = new Tools();
    }

    public function setId($id) {
        $this->id = $id;
    }
      
    public function getId() {
        return $this->id;
    }

    public function setNombre($nombre) {
        $this->nombre = $this->tools->cleanInputText($nombre);
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setCedula($cedula) {
        $this->cedula = $this->tools->cleanInputText($cedula);
    }

    public function getCedula() {
        return $this->cedula;
    }

    public function setTelefono($telefono) {
        $this->telefono = $this->tools->cleanInputText($telefono);
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setCorreo($correo) {
        $this->correo = $this->tools->cleanInputText($correo);
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function setDireccion($direccion) {
        $this->direccion = $this->tools->cleanInputText($direccion);
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setProvincia($provincia) {
        $this->provincia= $this->tools->cleanInputText($provincia);
    }

    public function getProvincia() {
        return $this->provincia;
    }

    public function setCanton($canton) {
        $this->canton = $this->tools->cleanInputText($canton);
    }

    public function getCanton() {
        return $this->canton;
    }

    public function setDistrito($distrito) {
        $this->distrito = $this->tools->cleanInputText($distrito);
    }

    public function getDistrito() {
        return $this->distrito;
    }

    public function save() {

        $sql = "INSERT INTO clientes (
            nombre, cedula, telefono, correo, direccion, provincia, canton, distrito)
            VALUES (
            '$this->nombre', 
            '$this->cedula', 
            '$this->telefono', 
            '$this->correo', 
            '$this->direccion', 
            '$this->provincia', 
            '$this->canton', 
            '$this->distrito')";

        $db = new Db(SERVERNAME, USERNAME, PASSWORD, DBNAME);
        $insert = $db->query($sql);
        $db->close();

        return $insert->affectedRows() >= 1 ? true : false;
    }

    public function getClientes() {

        $db = new Db(SERVERNAME, USERNAME, PASSWORD, DBNAME);
        $clientes = $db->query('SELECT * FROM clientes')->fetchAll();
        $db->close();
        return $clientes;
    }

    public function getCliente($id) {

        $db = new Db(SERVERNAME, USERNAME, PASSWORD, DBNAME);
        $cliente = $db->query('SELECT * FROM clientes WHERE id = '.$id.' ')->fetchArray();
        $db->close();
        return $cliente;
    }

    public function updateCliente($id) {

        $sql = "UPDATE clientes SET 
        nombre = '$this->nombre', 
        cedula = '$this->cedula',
        telefono = '$this->telefono',
        correo = '$this->correo',
        direccion = '$this->direccion',
        provincia = '$this->provincia',
        canton = '$this->canton',
        distrito = '$this->distrito'
        WHERE id = '$id'";

        $db = new Db(SERVERNAME, USERNAME, PASSWORD, DBNAME);

        $cliente = $db->query($sql);
        $db->close();        

    }

    public function deleteCliente($id){

        $sql = "DELETE FROM clientes WHERE id = '$id'";
        $db = new Db(SERVERNAME, USERNAME, PASSWORD, DBNAME);

        $cliente = $db->query($sql);
        $db->close(); 
    }

}

    