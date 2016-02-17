<?php 
    include 'db_class.php';
?>
<?php
    class LoginModel extends DB{
        private static $conn=null;
        
        public function getUsername(){     //lay thong tin nguoi dung
            if(empty(self::$conn)){
                self::$conn=  $this->connectPdo();
            }
            $sql="SELECT * FROM user";
            $stm=  self::$conn->query($sql);
            $users=array(array());
            $i=0;
            while($row=$stm->fetch(PDO::FETCH_ASSOC)){
                $users[$i++]=$row;
            }
            $i--;
            return $users;
        }
        
        public function getUserById($user_id){      //lau thong tin nguoi dung tu id
            if(empty(self::$conn)){
                self::$conn=  $this->connectPdo();
            }
            $sql="SELECT * FROM user WHERE id=?";
            $stmt=  self::$conn->prepare($sql);
            $stmt->bindParam(1,$user_id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $users=array(array());
            $i=0;
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                $users[$i++]=$row;
            }
            $i--;
            return $users;
        }
    }
?>
