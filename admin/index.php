<?php 
    ob_start();
    include("tpl/head.php"); 

    $check_login = mysql_query("SELECT * FROM `admins` WHERE `password` = '" . mysql_real_escape_string($_COOKIE['news_panel']) . "'");
    if(mysql_num_rows($check_login)==0){
            setcookie("news_panel", $_COOKIE["news_panel"], time()-3600*24*12, "/");
            header("location: login.php");
    }

    if(isset($_GET["page"])){
        if($_GET["page"] == "signout"){
            setcookie("news_panel", $_COOKIE["news_panel"], time()+3600*24*12, "/");
            header("location: login.php");
        }
    }
?>
<title>الطلبات</title>
<?php include("tpl/header.php"); ?>

<div class="center_column white" style="overflow: hidden;">
    <a href="newtrip.php" class="left add_new">اضافة رحلة </a>
    <h1>اخر الطلبات</h1>
    <table class="flat-table">
        <?php $sql_news = mysql_query("SELECT * FROM `orders` ORDER BY `id` DESC LIMIT 0, 10");
            while($sql_news_r = mysql_fetch_array($sql_news)){
                
        ?>
        <tr>
            <td><?php echo $sql_news_r["id"]; ?></td>
           <td><?php echo mb_substr($sql_news_r["email"], 0, 100, "utf-8"); ?>... 
				
			</td>
			<td style="width:300px; text-align:center"><?php if($sql_news_r['statue'] == 0){ echo "<span class='btn btn-xs btn-default'>معلق</span>";}else{
					echo "<span class='btn btn-success  btn-xs'>مفعل</span>";
		} ?></td>
            <td><span class="small"><?php echo $sql_news_r["last_update"]; ?></span></td>
            <td>
                    <a class="edit" href="order.php?id=<?php echo $sql_news_r["id"]; ?>&do=edit"><i class="fa fa-eye"></i></a>
                    <a class="delete" href="edit.php?id=<?php echo $sql_news_r["id"]; ?>&do=delete"><i class="fa fa-times"></i></a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <a href="news.php" class="btn btn-link left">المزيد...</a>
</div>