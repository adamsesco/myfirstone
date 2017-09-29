<?php 
        ob_start();
        include("tpl/head.php");

        if(!$_GET["id"] || intval($_GET["id"]) == 0 || !$_GET["do"]){
			header("location: index.php");
		}

            $id = intval($_GET["id"]);
			$checkif = mysql_query("SELECT * FROM `trips` WHERE id = '$id'");
			if(mysql_num_rows($checkif) == 0){
				header("location: index.php");
			}
            if($_GET["do"] == "delete"){
                   mysql_query("DELETE FROM `trips` WHERE id = '$id'");
	               header('location: index.php');
            }
            $sql_tr = mysql_fetch_array($checkif);
			$title = mysql_real_escape_string($sql_tr["title"]);
			$description = mysql_real_escape_string($sql_tr["description"]);
			$total = intval($sql_tr["total"]);
			$price = mysql_real_escape_string($sql_tr["price"]);
			$date = mysql_real_escape_string($sql_tr["date"]);

        
?>

<title><?php echo $sql_tr["title"]; ?></title>

<?php include("tpl/header.php"); ?>

<div class="center_column white">
    <h1>تعديل المقال</h1>
    <?php 
        if(isset($_POST["edit_news"])){
        $title = mysql_real_escape_string($_POST["title"]);
        $description = mysql_real_escape_string($_POST["description"]);
        $total = intval($_POST["total"]);
        $price = mysql_real_escape_string($_POST["price"]);
        $date = mysql_real_escape_string($_POST["date"]);

				$a = mysql_query("UPDATE `trips` SET `title` = '$title', `description` = '$description', `total` = '$total', `price` = '$price', `date` = '$date'  WHERE `id` = '$id'");
				if($a==true){
					echo "<div class='alert alert-success'>تم التحديث بنجاح</div>";
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
				<input name="date" id="date" type="date" class="form-control"  placeholder="تاريخ الرحلة" value="<?php echo $date; ?>" />
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
			<td><input type="submit" name="edit_news" class="btn btn-success" value="تحديث" style="float:left" /></td>
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