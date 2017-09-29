<?php 
ob_start();
include("tpl/head.php"); ?> 
<title>تسجيل الدخول</title>   


<body class="darklinear" style="background:#22272A !important;">

    <div class="login_panel">
            
        <i class="fa fa-user" style="font-size:100px; margin:10px auto; display:block;"></i><br />
        <h2>Login to News panel</h2>
        <form method="POST">
            <?php
            
                if(isset($_POST["login"])){
                    

                    $user_name = trim(strip_tags($_POST['username']));
				    $password = md5(strip_tags($_POST['password']));
                    
                    $check_login = mysql_query("SELECT * FROM `admins` WHERE `username` = '$user_name' and `password` = '$password'");
                    
					$check_login_row = mysql_num_rows($check_login);
                    
                    
					if($check_login_row == 0){
//						header('location: ../index.php');
					}else{
                        
						$get = mysql_fetch_object($check_login);
                        
                        
						setcookie("news_panel", $get->password, time()+3600*24*12);
                        
						header('location: index.php');
					}
                }
                
            ?>
            <input class="inputpanel" name="username" type="text" placeholder="اسم المستخدم" />
            <input class="inputpanel" name="password" type="password" placeholder="password" />
            <input type="submit" value="login" name="login" class="login_btn" /> 
        
        </form>    
    </div>
    
</body>    