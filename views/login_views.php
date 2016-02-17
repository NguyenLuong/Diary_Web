
<?php
include '../controler/login_controler.php';
$err='';
if(isset($_POST['LOGIN'])){
    $test= new LoginControler();
            if($test->index()){
                //echo 'dang nhap thanh cong';
                header("Location: home_page.php");
            }else {
                $err="Username or password error!";
            }
}
?>
<?php
// define variables and set to empty values
$nameErr = "";
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
        <title>My Diary</title>
        <link rel="stylesheet" type="text/css" href="login_styles.css"/>
    </head>
    <body>
        <div id="wrapper">
            
            <form class="login_form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                
                <div>
                    <span class="error"><?php echo $err.'</br>'; ?></span>
                    <label for="username">User name*</label>
                    <input id="username" type="text" name="username" size="25" />
                   
                </div>
                 <span class="error"><?php echo $nameErr;?></span>
                <div>
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" size="25" />
                </div>
                <a href="pass_change.php">Forgot password</a><br/>
                <input class="button" type="submit" value="LOGIN" name="LOGIN"/>
                <input class="button" type="button" onclick="location.href='singup_views.php'" value="REGISTER"/><br/>
            </form>
        </div>
        
        
    </body>
</html>

