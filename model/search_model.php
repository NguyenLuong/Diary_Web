<?php
    class SearchModel extends DB{
        private static $conn=null;
        public function searchDiary($username){     //tim kiem diary theo username
            if(empty(self::$conn)){
                self::$conn= $this->connectPdo();
            }
            $sql="SELECT content,subject,name,email,image,diary.id,user.id,time_on FROM diary,user WHERE diary.user_id=user.id AND username=?";
            $stmt=  self::$conn->prepare($sql);
            $stmt->bindParam(1,$username);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $i=0;
            $diary=array(array());
            while($row=$stmt->fetch()){
                $diary[$i++]=$row;
            }
            $i--;
            return $diary;
        }
        public function searchByDate($time){    //tim kiem theo thoi gian
            if(empty(self::$conn)){
                self::$conn= $this->connectPdo();
            }
            $sql="SELECT content,subject,username,name,email,image,diary.id,user.id,time_on FROM diary,user WHERE diary.user_id=user.id AND time_on=?";
            $stmt=  self::$conn->prepare($sql);
            $stmt->bindParam(1,$time);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $i=0;
            $diary=array(array());
            while($row=$stmt->fetch()){
                $diary[$i++]=$row;
            }
            $i--;
            return $diary;
        }
    }
?>
