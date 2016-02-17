<?php
    include '../model/singup_model.php';
?>
<?php 
    class SingupControler{
        private $singup=null;
        public function index(){
            $this->singup= new SingupModel();
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $error=array();
                $user=array();
                if(empty($_POST['username'])){
                    $nameerr="username empty";
                }else if($this->singup->checkUsername($_POST['username'])){
                    $nameerr="username da co nguoi dung";
                }else{
                    $user['username']= strip_tags($_POST['username']);
                }
                if($this->singup->checkEmail($_POST['email'])){
                    $error[]="email da su dung";
                }else{
                    $user['email']=  strip_tags($_POST['email']);
                }
                if(empty($_POST['password'])){
                    $error[]="password empty";
                }else if(empty ($_POST['repassword'])){
                    $error[]="re-password empty";
                }elseif ($_POST['password']!=$_POST['repassword']){
                    $error[]="sai password";
                } else{
                    $user['password']=$_POST['password'];
                }
               if(empty($error)){
                   if($this->singup->singUp($user))
                        return true;
               }else{
                   return false;
               }
            }
        }
    }
?>
