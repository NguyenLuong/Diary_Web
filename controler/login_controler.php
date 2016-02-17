<?php
    session_start();
?>
<?php 
include '../model/login_model.php';
?>
<?php
    class LoginControler{
        private $login=null;
        public function index(){
            $this->login= new LoginModel();
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $user=array();
                $error=array();
                if(!empty($_POST['username'])){
                    $user['username']=  strip_tags($_POST['username']);
                }else{
                    $error[]="username is empty";
                }
                if(!empty($_POST['password'])){
                    $user['password']=  strip_tags($_POST['password']);
                }else{
                    $error[]="password is empty";
                }
                if(empty($error)){
                    $user_data=array(array());
                    $user_data=  $this->login->getUsername();
                    $i=0;
                    $check_user=0;
                    $check_pass=0;
                    while(isset($user_data[$i])&& $user_data[$i]!= null){
                        if($user['username']==$user_data[$i]['username']){
                            $check_user=1;
                        if($user['password']==$user_data[$i]['password']){
                            $check_pass=1;
                            $_SESSION['id']=$user_data[$i]['id'];
                            $_SESSION['username']=$user_data[$i]['username'];
                            }
                        }
                        $i++;
                    }
                    if($check_pass==1&& $check_user==1){
                        return true;
                    }else{
                        return false;
                    }
                }
            }
        }
    }
?>
