<?php 
require_once('../utils/config.php');
require_once(PATH.'utils/Tools.php');
require_once(PATH.'utils/Db.php');


class Orden {

    private $id;
    private $fecha;
    private $hora;
    private $mesa;
    private $cliente;
    private $estado;

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

    public function setFecha($fecha) {
        $this->fecha = $this->tools->cleanInputText($fecha);
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setHora($hora) {
        $this->hora = $this->tools->cleanInputText($hora);
    }

    public function getHora() {
        return $this->hora;
    }

    public function setMesa($mesa) {
        $this->mesa = $this->tools->cleanInputText($mesa);
    }

    public function getMesa() {
        return $this->mesa;
    }

    public function setCliente($cliente) {
        $this->cliente = $this->tools->cleanInputText($cliente);
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function setEstado($estado) {
        $this->estado = $this->tools->cleanInputText($estado);
    }

    public function getEstado() {
        return $this->estado;
    }

    public function save() {

        $sql = "INSERT INTO ordenes (
            fecha, hora, mesa, cliente, estado)
            VALUES (
            '$this->fecha', 
            '$this->hora', 
            '$this->mesa', 
            '$this->cliente', 
            '$this->estado')";

        $db = new Db(SERVERNAME, USERNAME, PASSWORD, DBNAME);
        $insert = $db->query($sql);
        $db->close();

        if($insert->affectedRows() >= 1){
            
            $db = new Db(SERVERNAME, USERNAME, PASSWORD, DBNAME);
            $insertPlatillos = $db->query('SELECT * FROM ordenes ORDER BY id DESC LIMIT 1')->fetchArray();
            $db->close();

            return $insertPlatillos;
        }
        
    }

    public function getOrdenes() {

        $db = new Db(SERVERNAME, USERNAME, PASSWORD, DBNAME);

        $sql = "SELECT ordenes.id as ordenid, ordenes.fecha, ordenes.hora, ordenes.mesa, clientes.id 
        as clienteid, clientes.nombre, ordenes.estado 
        FROM ordenes 
        INNER JOIN clientes 
        ON clientes.id = ordenes.cliente";
        $ordenes = $db->query($sql)->fetchAll();        
        $db->close();
        return $ordenes;
    }

    public function getOrden($id) {

        $db = new Db(SERVERNAME, USERNAME, PASSWORD, DBNAME);

        $sql = "SELECT ordenes.id, ordenes.fecha, ordenes.hora, ordenes.mesa, clientes.id 
        as clienteid, clientes.nombre, ordenes.estado 
        FROM ordenes 
        INNER JOIN clientes 
        ON clientes.id = ordenes.cliente
        WHERE ordenes.id = '$id'";
        $orden = $db->query($sql)->fetchArray();
        $db->close();
        return $orden;
    }

    public function getPlatillosByOrden($ordenId) {

        $sql = "SELECT platillos.nombre, platillos.precio, platillos.descripcion, platillos.presentacion
        FROM orden_platillos
        INNER JOIN platillos
        ON platillos.id = orden_platillos.id_platillo
        WHERE orden_platillos.id_orden = '$ordenId'";

        $db = new Db(SERVERNAME, USERNAME, PASSWORD, DBNAME);
        $platillos = $db->query($sql)->fetchAll();
        $db->close();
        return $platillos;
    }

    public function savePlatillosByOrden($orderId, $data){

        $result = '';
        $len = count($data);
        $i = 0;
        foreach($data as $platillo){
            $i++;
            $result .= "($orderId, $platillo)";
            $result .= ($i < $len) ? ',' : '';            
        }

        $sql = "INSERT INTO orden_platillos (
            id_orden, id_platillo)
            VALUES $result";

        $db = new Db(SERVERNAME, USERNAME, PASSWORD, DBNAME);
        $insert = $db->query($sql);
        $db->close();

        return $insert->affectedRows() >= 1 ? true : false;
    }

    public function updateOrden($id) {

        $sql = "UPDATE ordenes SET 
        fecha = '$this->fecha', 
        hora = '$this->hora',
        mesa = '$this->mesa',
        cliente = '$this->cliente',
        estado = '$this->estado'
        WHERE id = '$id'";

        $db = new Db(SERVERNAME, USERNAME, PASSWORD, DBNAME);

        $orden = $db->query($sql);
        $db->close();        

    }

    public function deleteOrden($id){

        $sql = "DELETE FROM ordenes WHERE id = '$id'";
        $db = new Db(SERVERNAME, USERNAME, PASSWORD, DBNAME);

        $orden = $db->query($sql);
        $db->close();
    }
}