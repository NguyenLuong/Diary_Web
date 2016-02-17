<?php
require_once 'db_class.php';
?>
<?php

    class CommentModel extends DB{
        private static $conn=null;
        public function create(array $comment){
           if(empty(self::$conn)){
                self::$conn = $this->connectPdo();
            }
           $sql="INSERT INTO comment(user_id,diary_id,content,time_on)
                VALUE(?,?,?,?)";
           $stmt=  self::$conn->prepare($sql);
            $stmt->bindParam(1,$comment['user_id']);
            $stmt->bindParam(2,$comment['diary_id']);
            $stmt->bindParam(3,$comment['content']);
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $t=time();
            $time=date("y/m/d h:i:s",$t);
            $stmt->bindParam(4,$time);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function countComment($diary_id){
            if(empty(self::$conn)){
                self::$conn = $this->connectPdo();
            }
            $sql="SELECT COUNT(content) FROM comment WHERE diary_id=?";
            $stmt=  self::$conn->prepare($sql);
            $stmt->bindParam(1,$diary_id);
            $dem=$stmt->execute();
            $dem=$stmt->fetchColumn();
            return $dem;
        }
    }
 ?>