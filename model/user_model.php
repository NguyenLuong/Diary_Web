
<?php
require_once 'db_class.php';
    class UserModel extends DB{
        private static $conn=null;
        
         public function getUserByLikeName($name){
            if(empty(self::$conn)){
                self::$conn= $this->connectPdo();
            }
            $sql="SELECT * FROM user WHERE username like '%".$name."%' or name like '%".$name."%'";
             $stmt=  self::$conn->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $user_r=array(array());
            $i=0;
            while($row=$stmt->fetch()){
                $user_r[$i++]=$row;
            }
            $i--;
            return $user_r;
        }
        public function getUserByUsername($username){
            if(empty(self::$conn)){
                self::$conn= $this->connectPdo();
            }
            $sql="SELECT * FROM user WHERE username=?";
            $stmt=  self::$conn->prepare($sql);
            $stmt->bindParam(1,$username);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $users=$stmt->fetch();
            return $users;
        }
        public function getUser($id){
            if(empty(self::$conn)){
                self::$conn= $this->connectPdo();
            }
            $sql="SELECT * FROM user WHERE id=?";
            $stmt=  self::$conn->prepare($sql);
            $stmt->bindParam(1,$id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $users=$stmt->fetch();
            return $users;
        }
        public function updateInfoUser(array $user){
           if(empty(self::$conn)){
                self::$conn= $this->connectPdo();
            }
            $sql="UPDATE user SET name=?,password=?,email=?,job=?,addr=?,phone=?,sothich=? WHERE id=?";
            $stmt=  self::$conn->prepare($sql);
            $stmt->bindParam(1,$user['name']);
            $stmt->bindParam(2,$user['password']);
            $stmt->bindParam(3,$user['email']);
            $stmt->bindParam(4,$user['job']);
            $stmt->bindParam(5,$user['addr']);
            $stmt->bindParam(6,$user['phone']);
            $stmt->bindParam(7,$user['sothich']);
            $stmt->bindParam(8,$user['id']);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function updateImage($id,$image){
           if(empty(self::$conn)){
                self::$conn= $this->connectPdo();
            }
            $sql="UPDATE user SET img='$image' WHERE id=$id";
            $stmt=  self::$conn->prepare($sql);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }
        /*public function friendList($id){
            if(empty(self::$conn)){
                self::$conn= $this->connectPdo();
            }
            $sql="SELECT user_id2,user.name,user.image FROM friend,user WHERE user_id2=id and user_id1=?";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(1,$id);
            $friend=array(array());
             $i=0;
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                $friend[$i++]=$row;
            }
            $i--;
            return $friend; //friend[1]['name']
        }*///error
        public function ifUserType($id){
            if(empty(self::$conn)){
                self::$conn= $this->connectPdo();
            }
            $sql="SELECT * FROM ifuser_type WHERE id=?";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(1,$id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $usertype=$stmt->fetch();
            return $usertype;   //$usertype['phone']
        }
        public function getComment($diary_id){
          if(empty(self::$conn)){
                self::$conn= $this->connectPdo();
            }
            $sql="SELECT * FROM comment WHERE diary_id=?";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(1,$diary_id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $comment=$stmt->fetch();
            return $comment;  
        }
        public function getIfOtherUser($friend_id){
            if(empty(self::$conn)){
                    self::$conn= $this->connectPdo();
                }
            $friend=array(array()); 
            $sql="SELECT email FROM user,ifuser_type
                WHERE user.id=ifuser_type.user_id and user.id=$friend_id and ifuser_type.email_type=3";
            $stmt=  self::$conn->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $temp=$stmt->fetch();
            $friend['email']=$temp['email'];
            $sql="SELECT user.phone FROM user,ifuser_type
                WHERE user.id=ifuser_type.user_id and user.id=$friend_id and ifuser_type.phone=3";
            $stmt=  self::$conn->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $temp=$stmt->fetch();
            $friend['phone']=$temp['phone'];
            $sql="SELECT user.sothich FROM user,ifuser_type
                WHERE user.id=ifuser_type.user_id and user.id=$friend_id and ifuser_type.sothich=3";
            $stmt=  self::$conn->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $temp=$stmt->fetch();
            $friend['sothich']=$temp['sothich'];
            $sql="SELECT user.addr FROM user,ifuser_type
                WHERE user.id=ifuser_type.user_id and user.id=$friend_id and ifuser_type.addr=3";
            $stmt=  self::$conn->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $temp=$stmt->fetch();
            $friend['addr']=$temp['addr'];
            $sql="SELECT user.job FROM user,ifuser_type
                WHERE user.id=ifuser_type.user_id and user.id=$friend_id and ifuser_type.job=3";
            $stmt=  self::$conn->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $temp=$stmt->fetch();
            $friend['job']=$temp['job'];
            $sql="SELECT user.name FROM user,ifuser_type
                WHERE user.id=ifuser_type.user_id and user.id=$friend_id and ifuser_type.name=3";
            $stmt=  self::$conn->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $temp=$stmt->fetch();
            $friend['name']=$temp['name'];

                return $friend;
        }
    }
?>
