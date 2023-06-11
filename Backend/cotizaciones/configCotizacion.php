<?php

    require_once('../Config/conectar.php');
    class Cotizacion extends Conexion{
        private $cotizacionId;
        private $productoId;
        private $clienteId;
        private $empleadoId;
        private $fecha;
        private $hora;
        private $duracion;
        private $total;


        public function __construct($cotizacionId=0,$productoId="",$clienteId="",$empleadoId="",$fecha="",$hora="",$duracion="",$total="",$dbCnx=""){
            $this->cotizacionId;
            $this->productoId;
            $this->clienteId;
            $this->empleadoId;
            $this->fecha;
            $this->hora;
            $this->duracion;
            $this->total;
            parent :: __construct($dbCnx);       
        }

        public function setCotizacionId($cotizacionId){
            return $this->cotizacionId=$cotizacionId;
        }

        public function setProductoId($productoId){
            return $this->productoId=$productoId;
        }

        public function setClienteId($clienteId){
            return $this->clienteId=$clienteId;
        }

        public function setEmpleadoId($empleadoId){
            return $this->empleadoId=$empleadoId;
        }

        public function setFecha($fecha){
            return $this->fecha=$fecha;
        }

        public function setHora($hora){
            return $this->hora=$hora;
        }

        public function setDuracion($duracion){
            return $this->duracion=$duracion;
        }

        public function setTotal($total){
            return $this->total=$total;
        }


        public function getCotizacionId(){
            return $this->cotizacionId;
        }

        public function getProductoId(){
            return $this->productoId;
        }

        public function getClienteId(){
            return $this->clienteId;
        }

        public function getEmpleadoId(){
            return $this->empleadoId;
        }

        public function getFecha(){
            return $this->fecha;
        }

        public function getHora(){
            return $this->hora;
        }

        public function getDuracion(){
            return $this->duracion;
        }

        public function getTotal(){
            return $this->total;
        }

        public function insertData(){
            try {
                $stm = $this->dbCnx->prepare('INSERT INTO cotizacion(productoId,clienteId,empleadoId,fecha,hora,duracion) VALUES(?,?,?,?,?,?)');
                $stm->execute([$this->productoId,$this->clienteId,$this->empleadoId,$this->fecha,$this->hora,$this->duracion]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectAll(){
            try {
                $stm= $this->dbCnx->prepare('SELECT * FROM cotizacion');
                $stm->execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectOne(){
            try {
                $stm=$this->dbCnx->prepare("SELECT * FROM cotizacion WHERE cotizacionId=?");
                $stm->execute([$this->cotizacionId]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this->dbCnx->prepare('DELETE  FROM cotizacion WHERE cotizacionId=?');
                $stm->execute([$this->cotizacionId]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function update(){
            try {
                $stm=$this->dbCnx->prepare("UPDATE cotizacion SET clienteId=?,productoId=?,empleadoId=?,fecha=?,hora=?,duracion=? WHERE cotizacionId = ?");
                $stm->execute([$this->clienteId,$this->productoId,$this->empleadoId,$this->fecha,$this->hora,$this->duracion,$this->cotizacionId]); 
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectId(){
            try {
                $stm=$this->dbCnx->prepare("SELECT cotizacion.cotizacionId, clientes.nombre, productos.nombreProducto , empleados.username, cotizacion.fecha, cotizacion.hora, cotizacion.duracion, productos.precio
                FROM cotizacion
                JOIN productos  ON cotizacion.productoId = productos.productoId
                JOIN clientes  ON cotizacion.clienteId = clientes.clienteId
                JOIN empleados  ON cotizacion.empleadoId = empleados.empleadoId;"
                );
                $stm->execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

    }
?>