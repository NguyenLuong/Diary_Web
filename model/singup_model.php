<?php 
include 'db_class.php';
?>
<?php
    class SingupModel extends DB{
        private static $conn=null;
        
        public function singUp(array $users){       //dang ky tai khoan=>them user vao database
            if(empty(self::$conn)){
                self::$conn = $this->connectPdo();
            }
            $sql="INSERT INTO user(username,password,email,img) VALUE(?,?,?,?)";
            $stmt=  self::$conn->prepare($sql);
            //$stmt->bindParam(1,$name);
            $stmt->bindParam(1,$username);
            $stmt->bindParam(2,$password);
            $stmt->bindParam(3,$email);
            $stmt->bindParam(4,$img);
            
            //$name=$users['name'];
            $username=$users['username'];
            $password=$users['password'];
            $email=$users['email'];
            $img="default.png";
            
            if($stmt->execute()){
                   return true;
            }else{
                return false;
            }
        }
        
        public function checkEmail($email){ //kiem tra email da dang ki hay chua? da dang ki ->true
            if(empty(self::$conn)){
                self::$conn = $this->connectPdo();
            }
            $sql="SELECT email FROM user WHERE email=?";
            $stmt=  self::$conn->prepare($sql);
            
            $stmt->bindParam(1,$email);
            $stmt->execute();
            $num_row=$stmt->rowCount();
            if($num_row>0){
                return true;
            }else{
                return false;
            }
        }
         public function checkUsername($username){ //kiem tra username da dang ki hay chua? da dang ki ->true
            if(empty(self::$conn)){
                self::$conn = $this->connectPdo();
            }
            $sql="SELECT username FROM user WHERE username=?";
            $stmt=  self::$conn->prepare($sql);
            
            $stmt->bindParam(1,$username);
            $stmt->execute();
            $num_row=$stmt->rowCount();
            if($num_row>0){
                return true;
            }else{
                return false;
            }
        }
    }
?>
