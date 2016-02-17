<?php
    class IfUserType extends DB{
        private static $conn=null;
        public function getUserType($user_id){
            if(empty(self::$conn)){
                self::$conn= $this->connectPdo();
            }
            $sql="SELECT * FROM ifuser_type WHERE user_id=?";
            $stmt=  self::$conn->prepare($sql);
            $stmt->bindParam(1,$user_id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $user_type=$stmt->fetch();
            return $user_type;
        }
    }
?>
