<?php

include("application/functions.php");


$router->get("/", function() use($tpl){
    
    $tpl->assign("title", "التسجيل برحلاتنا");
    $tpl->draw("home");
    
    
});

$router->get("o/(\w+)", function($tocken) use($tpl, $db){
	
	if(!$db::display_db("orders", "WHERE `tocken` = '$tocken'", "id", "DESC", "")){
		
		exit();
		
	}
	
	$dbData = $db::display_db("orders", "WHERE `tocken` = '$tocken'", "id", "DESC", "")[0];
	
	$tpl->assign("title", "طلب رقم ".$dbData['id']);
	
	
	$tpl->draw("orderreplys");
	
});

$router->post("/jsonM", function() use($tpl, $db){
	
	
	$full_name = xss_clean($_POST['full_name']);
	$country = xss_clean($_POST['country']);
	$city = xss_clean($_POST['city']);
	$email = xss_clean($_POST['email']);
	$phone_number = xss_clean($_POST['phone_number']);
	$trip_i_d = xss_clean($_POST['trip_i_d']);
	
	//Some updating here
	
	$db::insert("users", array(
		
		"full_name" => $full_name,
		"country" => $country,
		"city" => $city,
		"email" => $email,
		"phone_number" => $phone_number,
		"trip_i_d" => $trip_i_d,
		"date" => "date_func"
	
	));
	
	$db::insert("orders", array(
		"email" => $email,
		"tocken" => md5(time() +1),
		"last_update" => "date_func"
	));
	
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <ghoste.xp12@gmail.com>' . "\r\n";
$headers .= 'Cc:$email' . "\r\n";

	$message = "تم التسجيل بالرحلة : ";
	$message .= $db::display_db("trips", "WHERE `id` = '$trip_i_d'", "id", "DESC", "")[0]['title'];
	$message .= "<br /> الرجاء التفعيل بالضغط على الرابط التالي: ";
	$message .= "http://localhost/alpha/activate/".md5(time() +1);
	
	mail($email, "التسجيل بالرحلة",$message,$headers);
	
	echo 1;
	
});
	

$router->run();
?>