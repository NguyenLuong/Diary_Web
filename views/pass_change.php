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
                        <label>Email</label>
                        <input type="text" name="email" size="30" />
                </div>
                <div>
                        <div>
                                <label>New password</label>
                                <input type="password" name="password" />
                        </div>
                        <div>
                                <label>Re-enter new password</label>
                                <input type="password" name="repassword" />
                        </div>
                </div>
                <div>
            <input class="button" type="submit" value="SUBMIT" />
            <input class="button" type="button" onclick="location.href='login_views.php'" value="CANCEL" />
                </div>
            </form>
        </div>
        
        
    </body>
</html>