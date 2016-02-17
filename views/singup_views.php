<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include '../controler/singup_controler.php';
?>
<?php
    
    if(isset($_POST['submit'])){
        $test= new SingupControler();
        if($test->index()){
            header("Location: login_views.php");
        }else{
            echo 'dang ky khong thanh cong';
        }
    }
?>
<?php
// define variables and set to empty values
$nameErr =$passErr=$repassErr=$emailErr= "";
$name ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["username"])) {
     $nameErr = "Name is required";
   } else {
     $name = test_input($_POST["username"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed"; 
     }
   }
   if(empty($_POST['password'])){
       $passErr="Password is required";
   }
   if(empty($_POST['repassword'])){
       $repassErr="Re-password is required";
   }
   if(empty($_POST['email'])){
       $emailErr="email is required";
   }else{
       $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
     }
   }
}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Đăng ký</title>
        <link rel="stylesheet" type="text/css" href="singup_style.css" />
    </head>
    <body>
        <div id="wrapper">
            <div id="top">
                
            </div>
            <div id="middle">
                <div class="reg_form">
                    <form action="singup_views.php" method="POST">
                        <div>
                            <label for="username">User name</label>
                            <input id="username" type="text" name="username" size="25" />
                        </div>
                        <span class="error"><?php echo $nameErr;?></span>
                        <hr/>
                        <div class="ex_div">
                            <div>
                                <label for="password">Password</label>
                                <input id="password" type="password" name="password" />
                            </div>
                            <span class="error"><?php echo $passErr;?></span>
                            <div>
                                <label for="repassword">Re-enter password</label>
                                <input id="repassword" type="password" name="repassword"/>
                            </div>
                            <span class="error"><?php echo $repassErr;?></span>
                        </div>                        
                        <hr/>
                        <div>
                            <label for="email">Email</label>
                            <input id="email" type="email" name="email" size="30" />
                        </div>
                        <span class="error"><?php echo $emailErr;?></span>
                        <div>
                            <input class="button" type="submit" value="SUBMIT" name="submit" />
                            <input class="button" type="button" onclick="location.href='login_views.php'" value="CANCEL" />
                        </div>
                    </form>
                </div>
            </div>
            <div id="bottom">
                
            </div>
        </div>
        
       
    </body>
</html>

 
