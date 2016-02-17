<?php
require_once 'db_class.php';
class FriendModel extends DB{
    private static $conn=null;
    public function getIfFriend($friend_id){
        if(empty(self::$conn)){
                self::$conn= $this->connectPdo();
            }
        $friend=array(array()); 
        $sql="SELECT email FROM user,ifuser_type
            WHERE user.id=ifuser_type.user_id and user.id=$friend_id and ifuser_type.email_type!=1";
        $stmt=  self::$conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $temp=$stmt->fetch();
        $friend['email']=$temp['email'];
        $sql="SELECT user.phone FROM user,ifuser_type
            WHERE user.id=ifuser_type.user_id and user.id=$friend_id and ifuser_type.phone!=1";
        $stmt=  self::$conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $temp=$stmt->fetch();
        $friend['phone']=$temp['phone'];
        $sql="SELECT user.sothich FROM user,ifuser_type
            WHERE user.id=ifuser_type.user_id and user.id=$friend_id and ifuser_type.sothich!=1";
        $stmt=  self::$conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $temp=$stmt->fetch();
        $friend['sothich']=$temp['sothich'];
        $sql="SELECT user.addr FROM user,ifuser_type
            WHERE user.id=ifuser_type.user_id and user.id=$friend_id and ifuser_type.addr!=1";
        $stmt=  self::$conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $temp=$stmt->fetch();
        $friend['addr']=$temp['addr'];
        $sql="SELECT user.job FROM user,ifuser_type
            WHERE user.id=ifuser_type.user_id and user.id=$friend_id and ifuser_type.job!=1";
        $stmt=  self::$conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $temp=$stmt->fetch();
        $friend['job']=$temp['job'];
        $sql="SELECT user.name FROM user,ifuser_type
            WHERE user.id=ifuser_type.user_id and user.id=$friend_id and ifuser_type.name!=1";
        $stmt=  self::$conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $temp=$stmt->fetch();
        $friend['name']=$temp['name'];
        
            return $friend;
    }
    public function getDiaryOfFriend($friend_id){
        if(empty(self::$conn)){
                self::$conn= $this->connectPdo();
            }
        $sql="SELECT * FROM diary WHERE user_id=$friend_id and type!=1";
        $stmt=  self::$conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result=array(array());
            $i=0;
            while($row=$stmt->fetch()){
                $result[$i++]=$row;
            }
            $i--;
            return $result;
    }
    public function checkFriend($id1,$id2){
       if(empty(self::$conn)){
                self::$conn= $this->connectPdo();
            }
        $sql="SELECT * FROM friend WHERE user_id1=$id1 and flag=1";
        $stmt=  self::$conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result=array(array());
        $thu=array(array());
            $i=0;
            while($row=$stmt->fetch()){
                $result[$i++]=$row;
            }
            $i--;
           if($result!=$thu){
                foreach ($result as $value) {
                     if($value['user_id2']==$id2) return true;
                }
           }
            return false;
            //return $result;
    }
    public function getFlagFriend($id1,$id2){
        if(empty(self::$conn)){
                self::$conn= $this->connectPdo();
            }
            $sql="SELECT * FROM friend WHERE user_id1=$id1 and user_id2=$id2";
            $stmt= self::$conn->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $value=$stmt->fetch();
            return $value; 
    }
    public function checkUserId($id1,$id2){     //kiem tra $id1 co thuoc cot user_id1 ?
        if(empty(self::$conn)){
                self::$conn= $this->connectPdo();
            }
        $sql="SELECT * FROM friend WHERE user_id1=$id1 and user_id2=$id2" ;
        $stmt= self::$conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $value=array(); $thu=array();
        $value=$stmt->fetch();
        if($value!=$thu) return true;
        return false;
    }

    public function create($id1,$id2,$flag){
        if(empty(self::$conn)){
                self::$conn= $this->connectPdo();
            }
        $sql="INSERT INTO friend(user_id1,user_id2,flag)
                VALUE(?,?,?)";
            $stmt=  self::$conn->prepare($sql);
            $stmt->bindParam(1,$id1);
            $stmt->bindParam(2,$id2);
            $stmt->bindParam(3,$flag);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
    }
    public function update($id1,$id2,$flag){
        if(empty(self::$conn)){
                self::$conn= $this->connectPdo();
            }
            $sql="UPDATE friend SET flag=? WHERE user_id1=? and user_id2=?";
            $stmt=  self::$conn->prepare($sql);
            $stmt->bindParam(1,$flag);
            $stmt->bindParam(2,$id1);
            $stmt->bindParam(3,$id2);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
    }
    
    public function delete($id1,$id2){
            if(empty(self::$conn)){
                self::$conn = $this->connectPdo();
            }
            $sql="DELETE FROM friend WHERE user_id1=12 and user_id2=11";
            $stmt=  self::$conn->prepare($sql);
            //$stmt->bindParam(1,$id1);
            //$stmt->bindParam(2,$id2);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }
}
?>
