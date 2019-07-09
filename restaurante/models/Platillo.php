<?php
require_once('../utils/config.php');
require_once(PATH.'utils/Tools.php');
require_once(PATH.'utils/Db.php');

class Platillo {

    private $id;
    private $nombre;
    private $precio;
    private $descripcion;
    private $presentacion;

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

    public function setPrecio($precio) {
        $this->precio = $this->tools->cleanInputText($precio);
    }
      
    public function getPrecio() {
        return $this->precio;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $this->tools->cleanInputText($descripcion);
    }
      
    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setPresentacion($presentacion) {
        $this->presentacion = $this->tools->cleanInputText($presentacion);
    }
      
    public function getPresentacion() {
        return $this->presentacion;
    }

    public function save() {

        $sql = "INSERT INTO platillos (
            nombre, precio, descripcion, presentacion)
            VALUES (
            '$this->nombre', 
            '$this->precio', 
            '$this->descripcion', 
            '$this->presentacion')";

        $db = new Db(SERVERNAME, USERNAME, PASSWORD, DBNAME);
        $insert = $db->query($sql);
        $db->close();

        return $insert->affectedRows() >= 1 ? true : false;
    }

    public function getPlatillos() {

        $db = new Db(SERVERNAME, USERNAME, PASSWORD, DBNAME);
        $platillos = $db->query('SELECT * FROM platillos')->fetchAll();
        $db->close();
        return $platillos;
    }

    public function getPlatillo($id) {

        $db = new Db(SERVERNAME, USERNAME, PASSWORD, DBNAME);
        $platillo = $db->query('SELECT * FROM platillos WHERE id = '.$id.' ')->fetchArray();
        $db->close();
        return $platillo;
    }

    public function updatePlatillo($id) {

        $sql = "UPDATE platillos SET 
        nombre = '$this->nombre', 
        precio = '$this->precio',
        descripcion = '$this->descripcion',
        presentacion = '$this->presentacion'
        WHERE id = '$id'";

        $db = new Db(SERVERNAME, USERNAME, PASSWORD, DBNAME);

        $platillo = $db->query($sql);
        $db->close();        

    }

    public function deletePlatillo($id){

        $sql = "DELETE FROM platillos WHERE id = '$id'";
        $db = new Db(SERVERNAME, USERNAME, PASSWORD, DBNAME);

        $platillo = $db->query($sql);
        $db->close(); 
    }
}