<?php
require_once 'db_class.php';
class LikeModel extends DB{
     private static $conn=null;
     public function countLike($diary_id){
         if(empty(self::$conn)){
                self::$conn = $this->connectPdo();
            }
            $sql="SELECT COUNT(user_id) FROM like_diary WHERE diary_id=?";
            $stmt=  self::$conn->prepare($sql);
            $stmt->bindParam(1,$diary_id);
            $dem=$stmt->execute();
            $dem=$stmt->fetchColumn();
            return $dem;
     }
     public function checkUserLike($diary_id,$user_id){
         if(empty(self::$conn)){
                self::$conn= $this->connectPdo();
            }
        $sql="SELECT id,user_id FROM like_diary WHERE diary_id=?";
        $stmt=  self::$conn->prepare($sql);
        $stmt->bindParam(1,$diary_id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result=array(array()); $err=array(array());
        $i=0;
        while($row=$stmt->fetch()){
            $result[$i++]=$row;
        }
        $i--;
        if($result!=$err){
            foreach ($result as $value) {
                if($value['user_id']==$user_id) return true;
            }
        }
        return false;
        
        }
        public function create($diary_id,$user_id){
            if(empty(self::$conn)){
                self::$conn = $this->connectPdo();
            }
           $sql="INSERT INTO like_diary(diary_id,user_id)
                VALUE(?,?)";
           $stmt=  self::$conn->prepare($sql);
            $stmt->bindParam(1,$diary_id);
            $stmt->bindParam(2,$user_id);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }
}
?>
