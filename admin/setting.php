<?php 
ob_start();
include("tpl/head.php"); ?>
<title>اعدادات خاصة</title>
<?php include("tpl/header.php"); 
     $check_login = mysql_query("SELECT * FROM `subadmins` WHERE `password` = '" . mysql_real_escape_string($_COOKIE['news_panel']) . "'");
    if(mysql_num_rows($check_login)==0){
            setcookie("news_panel", $_COOKIE["news_panel"], time()-3600*24*12, "/");
            header("location: login.php");
    }
    
    $check_success = mysql_fetch_array($check_login);
    $username = $check_success["username"];
    $password = $check_success["password"];

?>
<div class="center_column white">
    <h1>اعدادات خاصة</h1>
    <div class="info">
        <b>إليك بعض النصائح حول كيفية إنشاء كلمة مرور قوية للحفاظ على أمان حسابك:</b><br />
        <ul>
            <li>استخدام كلمة مرور فريدة لكل حساب من حساباتك المهمة</li>
            <li>استخدام مزيج من الحروف والأرقام والرموز في كلمة المرور</li>
            <li>عدم استخدام المعلومات الشخصية أو الكلمات الشائعة ككلمة مرور</li>
        </ul>
    </div>
    <?php 
            if(isset($_POST["change"])){
                $username = strip_tags(mysql_real_escape_string($_POST["username"]));
                
                if(!$username){
                    
                    echo "<div class='alert alert-danger'>المرجو ادخال كافة المعلومات</div>";
                    
                }
                else{
                    
                    if(isset($_POST["password"])){
                        $password = md5(mysql_real_escape_string($_POST["password"]));
                    }
                    
                    $sql = mysql_query("UPDATE `subadmins` SET `username` = '$username', `password` = '$password'  WHERE password = '" . mysql_real_escape_string($_COOKIE['news_panel']) . "'");
                    
                }
            }
    ?> 
    <form method="POST">
        <table class="table">
		<tr>
			<td><label for="username">إسم العضوية</label></td>
			<td>
				<input name="username" id="username" type="text" class="form-control" placeholder="إسم العضوية" value="<?php echo $username; ?>" />
			</td>
		</tr>
        <tr>
            <td><label for="password">كلمة المرور</label></td>
			<td>
				<input name="password" id="password" type="password" class="form-control" placeholder="إسم العضوية" value="" />
			</td>
        </tr>
            <tr>
            <td></td>
			<td>
				<input name="change" type="submit" class="btn btn-primary" value="تغيير" />
			</td>
        </tr>
        </table>
    </form>
</div>    