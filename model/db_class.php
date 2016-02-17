<?php
    //include '/config.php';
    class DB{
        private  $host='localhost';
        private  $db_username='root';
        private  $db_password='';
        //private  $db_name=null;
        /*public function __construct() {
            $this->host= Config:: $host;
            $this->db_username= Config::$db_username;
            $this->db_password= Config::$db_password;
            $this->db_name= Config::$db_name;
        }*/
        
        public function connectPdo(){       //ket noi database
            try{
                $conn=new PDO('mysql:host=localhost;dbname=web_diary',$this->db_username,$this->db_password,
                                array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
            }  catch (PDOException $e){
                echo "No connect to database";
                die($e->getMessage());
            }
            return $conn;
        }
    }
?>
