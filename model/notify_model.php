<?php
require_once 'db_class.php';
?>
<?php
    class NotifyModel extends DB{
        private static $conn=null;
        
        public function create(array $notify){
            if(empty(self::$conn)){
                self::$conn= $this->connectPdo();
            }
            $sql="INSERT INTO notify(id_from,id_to,content,time_on,flag,page_id) VALUE(?,?,?,?,1,?)";
            $stmt=  self::$conn->prepare($sql);
            $stmt->bindParam(1,$notify['id_from']);
            $stmt->bindParam(2,$notify['id_to']);
            $stmt->bindParam(3,$notify['content']);
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $t=time();
            $time=date("y/m/d h:i:s",$t);
            $stmt->bindParam(4,$time);
            $stmt->bindParam(5,$notify['page_id']);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }
        
        public function delete($id){
            if(empty(self::$conn)){
                self::$conn = $this->connectPdo();
            }
            $sql="DELETE FROM notify WHERE id=?";
            $stmt=  self::$conn->prepare($sql);
            $stmt->bindParam(1,$id);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }
//hai   
        public function notifyReed($id){
            if(empty(self::$conn)){
                self::$conn = $this->connectPdo();
            }
            $sql="UPDATE notify SET flag= 0 WHERE id=?";
            $stmt=  self::$conn->prepare($sql);
            $stmt->bindParam(1,$id);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }     
        public function countNotifyNotRead($id_to){
            if(empty(self::$conn)){
                self::$conn = $this->connectPdo();
            }
            $sql="SELECT count(id) AS num FROM notify WHERE id_to=? and flag=1";
            $stmt=  self::$conn->prepare($sql);
            $stmt->bindParam(1,$id_to);
            $dem=$stmt->execute();
            $dem=$stmt->fetchColumn();
            return $dem;
        }
//hai
        public function getNotifyNotRead($id_to){
             if(empty(self::$conn)){
                self::$conn = $this->connectPdo();
            }
            $sql="SELECT distinct n.id as idnf,n.page_id,id_from,id_to,u.username as username1,u2.username as username2,content,time_on
                    FROM notify AS n
                        LEFT JOIN user AS u ON u.id=n.id_from
                        LEFT JOIN user AS u2 ON u2.id=n.id_to
                    WHERE id_to=? and flag=1 ORDER BY n.time_on DESC";
            $stmt=  self::$conn->prepare($sql);
            $stmt->bindParam(1,$id_to);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $i=0;
            $notify=array(array());
            while($row=$stmt->fetch()){
                $notify[$i++]=$row;
            }
            $i--;
            return $notify;
        }

        public function getNotify($id_to){
            if(empty(self::$conn)){
                self::$conn = $this->connectPdo();
            }
            $sql="SELECT distinct n.id,id_from,id_to,u.username,u2.username,content,time_on
                    FROM notify AS n
                        LEFT JOIN user AS u ON u.id=n.id_from
                        LEFT JOIN user AS u2 ON u2.id=n.id_to
                    WHERE id_to=? ORDER BY n.time_on DESC";
            $stmt=  self::$conn->prepare($sql);
            $stmt->bindParam(1,$id_to);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $i=0;
            $notify=array(array());
            while($row=$stmt->fetch()){
                $notify[$i++]=$row;
            }
            $i--;
            return $notify;
        }
        
        
    }
?>
