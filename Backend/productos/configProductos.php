<?php

    require_once('../Config/conectar.php');
    class Producto extends Conexion{
        private $productoId;
        private $nombreProducto;
        private $precio;


        public function __construct($productoId=0,$nombreProducto="",$precio="",$dbCnx=""){
            $this->productoId;
            $this->nombreProducto;
            $this->precio;
            parent :: __construct($dbCnx);       
        }

        public function setProductoId($productoId){
            return $this->productoId=$productoId;
        }

        public function setNombreProducto($nombreProducto){
            return $this->nombreProducto=$nombreProducto;
        }

        public function setPrecio($precio){
            return $this->precio=$precio;
        }


        public function getProductoId(){
            return $this->productoId;
        }

        public function getNombreProducto(){
            return $this->nombreProducto;
        }

        public function getPrecio(){
            return $this->precio;
        }

        public function insertData(){
            try {
                $stm = $this->dbCnx->prepare('INSERT INTO productos(productoId,nombreProducto,precio) VALUES(?,?,?)');
                $stm->execute([$this->productoId,$this->nombreProducto,$this->precio]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectAll(){
            try {
                $stm= $this->dbCnx->prepare('SELECT * FROM productos');
                $stm->execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectOne(){
            try {
                $stm=$this->dbCnx->prepare("SELECT * FROM productos WHERE productoId=?");
                $stm->execute([$this->productoId]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this->dbCnx->prepare('DELETE  FROM productos WHERE productoId=?');
                $stm->execute([$this->productoId]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function update(){
            try {
                $stm=$this->dbCnx->prepare("UPDATE productos SET nombreProducto=?,precio=? WHERE productoId = ?");
                $stm->execute([$this->nombreProducto,$this->precio,$this->productoId]); 
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

    };






?>