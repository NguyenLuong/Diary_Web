<?php
    session_start();
    include 'model/notify_model.php';
    ?>
<?php
    class NotifyControler{
        private $notify=null;
        public function index(){
            if(isset($_SESSION['id'])){
                $this->notify = new NotifyModel();
                $n=array(array());
                $n=  $this->notify->getNotify($_SESSION['id']);
            }
        }
    }
?>
