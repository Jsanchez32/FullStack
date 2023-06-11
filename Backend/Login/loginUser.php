<?php


    ini_set("display_errors", 1);

    ini_set("display_startup_errors", 1);

    error_reporting(E_ALL);
    
    require_once("../Config/conectar.php");


    class LoginUser extends Conexion{
        private $empleadoId;
        private $email;
        private $password;

        public function __construct($empleadoId=0,$email="",$password="",$dbCnx=""){
            $this->empleadoId=$empleadoId;
            $this->email=$email;
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

        public function setPassword($password){
            $this->password=$password;
        }

        public function getPassword(){
            return $this->password;
        }


        public function fetchAll(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM empleados");
                $stm -> execute();
                return $stm-> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }    

        public function login(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM empleados WHERE email = ? AND password = ?");
                $stm -> execute([$this->email, md5($this->password)]);
                $user = $stm ->fetchAll();
                
                if(count($user)>0){
                    session_start();
                    $_SESSION['empleadoId'] = $user[0]['empleadoId'];
                    $_SESSION['email'] = $user[0]['email'];
                    $_SESSION['password'] = $user[0]['password'];
                    $_SESSION['username'] = $user[0]['username'];
                    return true;
                }
                else{
                    false;
                }
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }




?>