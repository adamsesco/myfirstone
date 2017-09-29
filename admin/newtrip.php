<?php 
ob_start();
include("tpl/head.php");
     $check_login = mysql_query("SELECT * FROM `admins` WHERE `password` = '" . mysql_real_escape_string($_COOKIE['news_panel']) . "'");
    if(mysql_num_rows($check_login)==0){
            setcookie("news_panel", $_COOKIE["news_panel"], time()-3600*24*12, "/");
            header("location: login.php");
    }
?>
<title>اضافة رحلة جديدة</title>
<?php include("tpl/header.php");
    $title = "";
    $description = "";
    $link_youtube = "";
    $date = "";
?>
<div class="center_column white">
    <h1>اضافة رحلة جديدة</h1>
    <?php 
        
    if(isset($_POST["new_article"])){
        
        $title = mysql_real_escape_string($_POST["title"]);
        $description = mysql_real_escape_string($_POST["description"]);
        $total = intval($_POST["total"]);
        $price = mysql_real_escape_string($_POST["price"]);
        $date = mysql_real_escape_string($_POST["date"]);
        
        
        if(!$title || !$description){
			echo "<div class='alert alert-danger'>المرجو ادخال كافة المعلومات</div>";
        }
        else{

                $a = mysql_query("INSERT INTO `trips` (`title`, `description`, `price`, `total`, `date`) VALUES ('$title', '$description','$price', '$total', now())");
            
                            $sql_get_last = mysql_query("SELECT * FROM `trips` ORDER BY `id` DESC");
                            
                            $get_sql = mysql_fetch_object($sql_get_last);
            
        }
    }
    
    ?>
    <form method="POST" enctype="multipart/form-data">
		<table class="table">

        <tr>
			<td><label for="title">عنوان الرحلة</label></td>
			<td>
				<input name="title" id="type" type="text" class="form-control" placeholder="عنوان الرحلة" value="<?php echo $title; ?>" />
			</td>
		</tr>
		<tr>
			<td><label for="description">محتوى الرحلة</label></td>
			<td>
				<textarea name="description" id="description" class="form-control" placeholder=" محتوى الرحلة"><?php echo $description; ?></textarea>
			</td>
		</tr>
		<tr>
			<td><label for="date">تاريخ الرحلة</label></td>
			<td>
				<input name="date" id="date" type="date" class="form-control"  placeholder="تاريخ الرحلة" value="<?php echo $title; ?>" />
			</td>
		</tr>
		<tr>
			<td><label for="total">العدد المطلوب</label></td>
			<td>
				<input name="total" id="total" class="form-control"  placeholder="العدد المطلوب" value="<?php echo $total; ?>" type="number" />
			</td>
		</tr>
		<tr>
			<td><label for="price">سعر الرحلة</label></td>
			<td>
				<input name="price" id="price" class="form-control"  placeholder="سعر الرحلة بالدولار" value="<?php echo $price; ?>" type="number" />
			</td>
		</tr>

		<tr>
			<td id="div"><label></label></td>
			<td><input type="submit" name="new_article" class="btn btn-success" value="اضافة" style="float:left" /></td>
		</tr>
	</table>
	</form>
</div>    
<script>
      $(function(){
        $('#description').editable({
			inlineMode: false,
			theme: 'Gray',
			language: 'ar',
			imageUploadURL: 'upload.php'
			})
      });
</script>