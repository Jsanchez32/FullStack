<?php

    require_once('../Config/conectar.php');
    class Cliente extends Conexion{
        private $clienteId;
        private $nombre;
        private $telefono;
        private $productoId;
        private $fecha;
        private $hora;


        public function __construct($clienteId=0,$nombre="",$telefono="",$productoId="",$fecha="",$hora="",$dbCnx=""){
            $this->clienteId;
            $this->nombre;
            $this->telefono;
            $this->productoId;
            $this->fecha;
            $this->hora;
            parent :: __construct($dbCnx);       
        }

        public function setClienteId($clienteId){
            return $this->clienteId=$clienteId;
        }

        public function setNombre($nombre){
            return $this->nombre=$nombre;
        }

        public function setTelefono($telefono){
            return $this->telefono=$telefono;
        }

        public function setProductoId($productoId){
            return $this->productoId=$productoId;
        }

        public function setFecha($fecha){
            return $this->fecha=$fecha;
        }

        public function setHora($hora){
            return $this->hora=$hora;
        }


        public function getClienteId(){
            return $this->clienteId;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function getTelefono(){
            return $this->telefono;
        }

        public function getProductoId(){
            return $this->productoId;
        }

        public function getFecha(){
            return $this->fecha;
        }

        public function getHora(){
            return $this->hora;
        }

        public function insertData(){
            try {
                $stm = $this->dbCnx->prepare('INSERT INTO clientes(clienteId,nombre,telefono,productoId,fecha,hora) VALUES(?,?,?,?,?,?)');
                $stm->execute([$this->clienteId,$this->nombre,$this->telefono,$this->productoId,$this->fecha,$this->hora]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectAll(){
            try {
                $stm= $this->dbCnx->prepare('SELECT * FROM clientes');
                $stm->execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectOne(){
            try {
                $stm=$this->dbCnx->prepare("SELECT * FROM clientes WHERE clienteId=?");
                $stm->execute([$this->clienteId]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this->dbCnx->prepare('DELETE  FROM clientes WHERE clienteId=?');
                $stm->execute([$this->clienteId]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function update(){
            try {
                $stm=$this->dbCnx->prepare("UPDATE clientes SET nombre=?,telefono=?,productoId=?,fecha=?,hora=? WHERE clienteId = ?");
                $stm->execute([$this->nombre,$this->telefono,$this->productoId,$this->fecha,$this->hora,$this->clienteId]); 
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectId(){
            try {
                $stm=$this->dbCnx->prepare("SELECT clientes.clienteId, clientes.nombre, clientes.telefono , productos.nombreProducto, clientes.fecha, clientes.hora
                FROM clientes
                JOIN productos  ON clientes.productoId = productos.productoId;");
                $stm->execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

    }
?>