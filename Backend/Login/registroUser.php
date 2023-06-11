<?php

    require_once("../Config/conectar.php");
    require_once("loginUser.php");


    class User extends Conexion{
        private $empleadoId;
        private $email;
        private $username;
        private $password;

        public function __construct($empleadoId=0,$email="",$username="",$password="",$dbCnx=""){
            $this->empleadoId=$empleadoId;
            $this->email=$email;
            $this->username=$username;
            $this->password=$password;
            parent ::__construct($dbCnx);
        }

        public function setEmpleadoId($empleadoId){
            $this->empleadoId=$empleadoId;
        }

        public function getEmpleadoId(){
            return $this->empleadoId;
        }

        public function setEmail($email){
            $this->email=$email;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setUsername($username){
            $this->username=$username;
        }

        public function getUsername(){
            return $this->username;
        }

        public function setPassword($password){
            $this->password=$password;
        }

        public function getPassword(){
            return $this->password;
        }

        public function checkUser($email){
            try {
                $stm= $this->dbCnx->prepare("SELECT * FROM empleados WHERE email = '$email' ");
                $stm->execute();
                if($stm->fetchColumn()){
                    return true;
                }
                else{
                    return false;
                }
            } catch (Exception $e) {
                $e->getMessage();
            }
        }

        public function insertData(){
            try {
                $stm= $this->dbCnx->prepare("INSERT INTO empleados (email,username,password) VALUES(?,?,?)" );
                $stm->execute([$this->email, $this->username,md5($this->password)]);

                $login = new LoginUser();

                $login -> setEmail($_POST['email']);
                $login -> setPassword($_POST['password']);

                $succes = $login->login();
            } catch (Exception $e) {
                $e->getMessage();
            }
        }
    }




?>