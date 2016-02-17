<?php
require_once 'db_class.php';
?>
<?php

    class DiaryModel extends DB{
        private static $conn=null;
        public function create(array $diary){
            if(empty(self::$conn)){
                self::$conn = $this->connectPdo();
            }
            $sql="INSERT INTO diary(user_id,content,subject,type,time_on)
                VALUE(?,?,?,?,?)";
            $stmt=  self::$conn->prepare($sql);
            $stmt->bindParam(1,$diary['user_id']);
            $stmt->bindParam(2,$diary['content']);
            $stmt->bindParam(3,$diary['subject']);
            $stmt->bindParam(4,$diary['type']);
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $t=time();
            $time=date("y/m/d h:i:s:a",$t);
            $stmt->bindParam(5,$time);
            
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }
        
        public function getDiarySeachLimitTime($timeStart,$timeEnd,$user_id){
            if(empty(self::$conn)){
                self::$conn = $this->connectPdo();
            }
            $sql="SELECT * FROM diary WHERE time_on > '".$timeStart."' AND time_on < '".$timeEnd."' AND user_id=".$user_id." ORDER BY time_on DESC";
            $stmt=  self::$conn->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $diary=array(array());
            $i=0;
            while($row=$stmt->fetch()){
                $diary[$i++]=$row;
            }
            $i--;
            return $diary;
             }
        
        public function edit($edit,$id){
         if(empty(self::$conn)){
                self::$conn = $this->connectPdo();
            }
            $sql="UPDATE diary SET subject=?,content=?,type=?,time_on=? WHERE id=?";
            $stmt=  self::$conn->prepare($sql);
            $stmt->bindParam(1,$edit['subject']);
            $stmt->bindParam(2,$edit['content']);
            $stmt->bindParam(3,$edit['type']);
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $t=time();
            $time=date("y/m/d h:i:s:a",$t);
            $stmt->bindParam(4,$time);
            $stmt->bindParam(5,$id);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }
        
        public function delete($id){        // truyen vao diary_id
            if(empty(self::$conn)){
                self::$conn = $this->connectPdo();
            }
            $sql="DELETE FROM diary WHERE id=?";
            $stmt=  self::$conn->prepare($sql);
            $stmt->bindParam(1,$id);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function getDiarybyid($id){
            if(empty(self::$conn)){
                self::$conn = $this->connectPdo();
            }
            $sql="SELECT * FROM diary WHERE id=?";
            $stmt=  self::$conn->prepare($sql);
            $stmt->bindParam(1,$id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $diary=$stmt->fetch();
            return $diary;
        }
        
        public function getDiary($id){  //by user_id
            if(empty(self::$conn)){
                self::$conn = $this->connectPdo();
            }
            $sql="SELECT diary.id,diary.content,user.name,diary.time_on,subject,type FROM diary,user
                WHERE diary.user_id=user.id AND diary.id=?";
            $stmt=  self::$conn->prepare($sql);
            $stmt->bindParam(1,$id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $diary=$stmt->fetch();
            return $diary;
        }
        
        public function getDiaryOfUser($user_id){
            if(empty(self::$conn)){
                self::$conn = $this->connectPdo();
            }
            $sql="SELECT d.id,d.content,u.name,d.user_id,d.time_on,d.subject,d.type FROM diary AS d
                LEFT JOIN user AS u ON u.id=d.user_id
                WHERE d.user_id=? ORDER BY d.time_on DESC";
            $stmt=  self::$conn->prepare($sql);
            $stmt->bindParam(1,$user_id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $diary=array(array());
            $i=0;
            while($row=$stmt->fetch()){
                $diary[$i++]=$row;
            }
            $i--;
            return $diary;
            
        }
        
        public function countDiary($user_id){
            if(empty(self::$conn)){
                self::$conn = $this->connectPdo();
            }
            $sql="SELECT count(id) AS num FROM diary WHERE user_id=? GROUP BY user_id";
            $stmt=  self::$conn->prepare($sql);
            $stmt->bindParam(1,$user_id);
            $stmt->execute();
            $num=$stmt->fetch();
            return $num['num'];
        }

        public function getDiaryOfUserfriend($user_id){     //public+friend
            if(empty(self::$conn)){
                self::$conn= $this->connectPdo();
            }
            $sql=" SELECT * FROM diary WHERE type=2 and user_id=$user_id UNION 
                SELECT * FROM diary WHERE type=3 and user_id=$user_id ORDER BY time_on DESC";
            $stmt=  self::$conn->prepare($sql);
            //$stmt->bindParam(1,$user_id);
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
        public function getDiaryOfHomePage($user_id){
            if(empty(self::$conn)){
                self::$conn= $this->connectPdo();
            }
            $sql="SELECT * FROM diary WHERE user_id in
                (SELECT user_id2 FROM friend WHERE user_id1=$user_id and friend.flag=1)and diary.type=2 
                 UNION SELECT * FROM diary WHERE user_id=$user_id
                UNION SELECT * FROM diary WHERE type=3 and user_id !=$user_id ORDER BY time_on DESC";
            $stmt=  self::$conn->prepare($sql);
            //$stmt->bindParam(1,$user_id);
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

        public function getCommentOfDiary($id){
            if(empty(self::$conn)){
                self::$conn=  $this->connectPdo();
            }
            $sql="SELECT * FROM comment WHERE diary_id=?";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(1,$id);
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
        
        public function getDiaryOfOtherUser($id){
            if(empty(self::$conn)){
                self::$conn= $this->connectPdo();
            }
            $sql="SELECT * FROM diary WHERE user_id=$id and type=3";
            $stmt= self::$conn->prepare($sql);
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
        
        public function getDiarySeachSub($subDiary,$user_id){
            if(empty(self::$conn)){
                self::$conn = $this->connectPdo();
            }
            $sql="SELECT diary.id,diary.user_id as user_id,content,time_on,subject,type FROM diary,friend
                WHERE diary.subject like '%".$subDiary."%' AND diary.type=2 AND diary.user_id=friend.user_id1 AND flag=1
                    UNION SELECT diary.id,diary.user_id as user_id,content,time_on,subject,type FROM diary WHERE diary.type=3 AND diary.subject like '%".$subDiary."%'
                    UNION SELECT diary.id,diary.user_id as user_id,content,time_on,subject,type FROM diary WHERE user_id=".$user_id." AND diary.subject like '%".$subDiary."%'
                    ORDER BY time_on DESC
";
            $stmt=  self::$conn->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $diary=array(array());
            $i=0;
            while($row=$stmt->fetch()){
                $diary[$i++]=$row;
            }
            $i--;
            return $diary;
            
        }


    }
?>
