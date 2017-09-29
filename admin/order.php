<?php 
        ob_start();
        include("tpl/head.php");

        if(!$_GET["id"] || intval($_GET["id"]) == 0 || !$_GET["do"]){
			header("location: index.php");
		}

            $id = intval($_GET["id"]);
			$checkif = mysql_query("SELECT * FROM `orders` WHERE id = '$id'");
			if(mysql_num_rows($checkif) == 0){
				header("location: index.php");
			}
            if($_GET["do"] == "delete"){
                   mysql_query("DELETE FROM `orders` WHERE id = '$id'");
	               header('location: index.php');
            }

            $order = mysql_fetch_array($checkif);

			$checkinfos = mysql_query("SELECT * FROM `users` WHERE email = '" . $order['email'] . "'");

			$sql_tr = mysql_fetch_array($checkinfos);
			$full_name = mysql_real_escape_string($sql_tr["full_name"]);
			$email = mysql_real_escape_string($sql_tr["email"]);
			$phone_number = intval($sql_tr["phone_number"]);
			$country = mysql_real_escape_string($sql_tr["country"]);
			$city = mysql_real_escape_string($sql_tr["city"]);
			$trip_i_d = mysql_real_escape_string($sql_tr["trip_i_d"]);
			$statue = mysql_real_escape_string($sql_tr["statue"]);
			$date = mysql_real_escape_string($sql_tr["date"]);


?>

<style>

	.reply_item {
    display: block;
    padding: 10px;
    border-top: 1px solid #c7c7c7;
    margin-top: 13px;
}
.reply_item .head{
	 padding: 10px 0;
    background: #f9f9f9;
}

</style>

<title>الطلب رقم  <?php echo $id; ?></title>

<?php include("tpl/header.php"); ?>

<div class="center_column white">
    <h1>الطلب رقم  <?php echo $id; ?></h1>
	
	<table class="table table-bordered">
	
		<thead>
		
			<tr>
			
				<th class="text-right">الاسم الكامل</th>
				<th class="text-right">الاميل</th>
				<th class="text-right">الهاتف</th>
				<th class="text-right">الدولة</th>
				<th class="text-right">المدينة</th>
				<th class="text-right">الرحلة</th>
				
			</tr>
			
		</thead>
		
		<tbody>
		
		<tr>
			
				<td><?php echo $full_name; ?></td>
				<td><?php echo $email; ?></td>
				<td><?php echo $phone_number; ?></td>
				<td><?php echo $country; ?></td>
				<td><?php echo $city; ?></td>
				<td><?php echo getInfo('trips', "id = $trip_i_d", 'title'); ?></td>
		
				
			</tr>
			
			
		</tbody>
	
	</table>
	
	<h3 class="h3">الردود</h3>
	
		<form method="post">
		
				<?php 
		
		
			if(isset($_POST['sendreply'])){
				
				$message = xss_clean($_POST['message']);
				
				$sql = mysql_query("INSERT INTO `replys`(`message`, `order_id`, `adminoruser`, `date`) VALUES ('$message', '$id', '1', now())");
				
				if($sql == true){
					
					echo "<div class='alert alert-success'>تم ارسال رسالتك بنجاح</div>";
					
				}
				
			}
		
		?>
	

		<textarea class="form-control textarea" placeholder="" name="message"></textarea><br />
		
		<input type="submit" value="Reply" class="btn btn-success" name="sendreply" />
	
	</form>
	
	<?php $replys = mysql_query("SELECT * FROM `replys` WHERE `order_id` = '$id' ORDER BY `id` DESC");
				
			while($replys_r = mysql_fetch_array($replys)){
	?>
	
		<div class="reply_item">
			
			<div class="head">
			
					<?php if($replys_r['adminoruser'] == 1){ $by = "المدير";}else{$by = $full_name;} ?>
				
					<b class="name"><?php echo $by; ?></b>		
				
			</div>
			<div class="message"><p><?php echo xss_clean($replys_r['message']); ?></p></div>
			
		</div>
	
	<?php } ?>

	
</div>	