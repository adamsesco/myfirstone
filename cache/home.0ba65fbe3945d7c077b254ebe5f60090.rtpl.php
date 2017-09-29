<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?php echo htmlspecialchars( $title, ENT_COMPAT, 'UTF-8', FALSE ); ?></title>

	
<link href="<?php echo htmlspecialchars( $site, ENT_COMPAT, 'UTF-8', FALSE ); ?>templates/default/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/earlyaccess/droidarabickufi.css" />
	<link href="<?php echo htmlspecialchars( $site, ENT_COMPAT, 'UTF-8', FALSE ); ?>templates/default/assets/css/font-awesome.min.css" rel="stylesheet" media="screen">
	<link href="<?php echo htmlspecialchars( $site, ENT_COMPAT, 'UTF-8', FALSE ); ?>templates/default/assets/css/simple-line-icons.css" rel="stylesheet" media="screen">
	<link href="<?php echo htmlspecialchars( $site, ENT_COMPAT, 'UTF-8', FALSE ); ?>templates/default/assets/css/animate.css" rel="stylesheet">
    
	
	<link href="<?php echo htmlspecialchars( $site, ENT_COMPAT, 'UTF-8', FALSE ); ?>templates/default/assets/css/style.css?v=111" rel="stylesheet" media="screen">
    
    <script src="<?php echo htmlspecialchars( $site, ENT_COMPAT, 'UTF-8', FALSE ); ?>templates/default/assets/js/modernizr.custom.js"></script>
       
</head>
<body>

	

	<div id="preloader">
		<div id="status"></div>
	</div>

	

	<section id="home" class="pfblock-image screen-height">
        <div class="home-overlay"></div>
		<div class="intro">
			
			<h1>
رحلة اكتشاف اسرار الصين
  
            </h1>
            <div class="start">
                <p style="font-size:25px;">
               تشطيب وتجارة وسياحة


                    </p>
            </div>
            
			<div class="start">
                
                       
في هذه الرحلة نكشف لكم أسرار مهمة جدا من أسرار التجارة بالصين هذه الأسرار توفر عليك الكثير من المال بإذن الله
وتجعلك تتعرف على المخاطر المُحتملة في الصين وكيفية تجاوزها وغيرها الكثير من الاسرار ومن خلال التدريب الميداني الذي يتضمن:
<br>

1-	كيفية تأسيس مشاريع 
2-	البحث عن أفكار 
3-	تشطيب منزلك 
4-	سياحة وتسوق 

                            
                
            </div>
		</div>

        <a href="#services">
		<div class="scroll-down">
            <span>
                <i class="fa fa-angle-down fa-2x"></i>
            </span>
		</div>
        </a>

	</section>

	

	



	

    

	<section id="services" class="pfblock" style="background:#f8f8f8">
		<div class="container">
			<div class="row">
				
							<div class="signup-container signup">
				
				<h1 class="h1 text-center">التسجيل برحلاتنا</h1>
			
				<form method="POST" onsubmit="return false;">
				
					<input name="full_name" value="" class="form-control full_name"  placeholder="الاسم الكامل" required/><br />	
									
					<input name="country" value="" class="form-control country" required placeholder="الدولة " /><br />	
					
					<input name="city" value="" class="form-control city" placeholder="المدينة " required /><br />	
					
					<input name="email" value="" class="form-control email" required placeholder="البريد الالكتروني" /><br />			
					
					<input name="phone_number" value="" class="form-control phone_number" placeholder="رقم الهاتف" /><br />
					
					<select class="form-control trip_i_dl" required name="trip_i_d">
						<option>الرحلة</option>
						<?php $counter1=-1; $newvar1=getTrips(); if( isset($newvar1) && ( is_array($newvar1) || $newvar1 instanceof Traversable ) && sizeof($newvar1) ) foreach( $newvar1 as $key1 => $value1 ){ $counter1++; ?>

							<option value="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
						<?php } ?>

					</select>
					
					<br />
					
					<div class="btn-account">
					
						<input type="submit" class="btn btn-primary sub" value="Signup" />
						
					</div>
					
				</form>
				
			</div>
				<div class="msgshow">
				
					<p>
					تم تسجيل طلبك بنجاح.<br />
تم ارسال رسالة الى اميلك لتأكيد الحجز و تحويل المبلغ.
					</p>
					
				</div>
</div>	
			

		</div>
		
		
	</section>


	<footer id="footer">
		<div class="container">
			<div class="row">

				<div class="col-sm-12">

					<ul class="social-links">
						<li><a href="index.html#" class="wow fadeInUp"><i class="fa fa-facebook"></i></a></li>
						<li><a href="index.html#" class="wow fadeInUp" data-wow-delay=".1s"><i class="fa fa-twitter"></i></a></li>
						<li><a href="index.html#" class="wow fadeInUp" data-wow-delay=".2s"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="index.html#" class="wow fadeInUp" data-wow-delay=".4s"><i class="fa fa-pinterest"></i></a></li>
						<li><a href="index.html#" class="wow fadeInUp" data-wow-delay=".5s"><i class="fa fa-envelope"></i></a></li>
					</ul>

				
				</div>

			</div>
		</div>
	</footer>

	

	

	<div class="scroll-up">
		<a href="#home"><i class="fa fa-angle-up"></i></a>
	</div>
    
    

	

	<script src="<?php echo htmlspecialchars( $site, ENT_COMPAT, 'UTF-8', FALSE ); ?>templates/default/assets/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo htmlspecialchars( $site, ENT_COMPAT, 'UTF-8', FALSE ); ?>templates/default/assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo htmlspecialchars( $site, ENT_COMPAT, 'UTF-8', FALSE ); ?>templates/default/assets/js/jquery.parallax-1.1.3.js"></script>
	<script src="<?php echo htmlspecialchars( $site, ENT_COMPAT, 'UTF-8', FALSE ); ?>templates/default/assets/js/imagesloaded.pkgd.js"></script>
	<script src="<?php echo htmlspecialchars( $site, ENT_COMPAT, 'UTF-8', FALSE ); ?>templates/default/assets/js/jquery.sticky.js"></script>
	<script src="<?php echo htmlspecialchars( $site, ENT_COMPAT, 'UTF-8', FALSE ); ?>templates/default/assets/js/smoothscroll.js"></script>
	<script src="<?php echo htmlspecialchars( $site, ENT_COMPAT, 'UTF-8', FALSE ); ?>templates/default/assets/js/wow.min.js"></script>
    <script src="<?php echo htmlspecialchars( $site, ENT_COMPAT, 'UTF-8', FALSE ); ?>templates/default/assets/js/jquery.easypiechart.js"></script>
    <script src="<?php echo htmlspecialchars( $site, ENT_COMPAT, 'UTF-8', FALSE ); ?>templates/default/assets/js/waypoints.min.js"></script>
    <script src="<?php echo htmlspecialchars( $site, ENT_COMPAT, 'UTF-8', FALSE ); ?>templates/default/assets/js/jquery.cbpQTRotator.js"></script>
	<script src="<?php echo htmlspecialchars( $site, ENT_COMPAT, 'UTF-8', FALSE ); ?>templates/default/assets/js/custom.js"></script>
	<script type="text/javascript">
	
		$(document).ready(function(){
			

			
			$(".sub").click(function(){
				
				
				var fullname,email,phone,trip,city,country;
				
				fullname = $(".full_name").val();
				email = $(".email").val();
				phone = $(".phone_number").val();
				trip = $(".trip_i_dl").val();
				city = $(".city").val();
				country = $(".country").val();
				
				if(fullname && city != '' && email != '' && parseInt(trip) > 0 && country != ''){
					
					$(this).attr("disabled", true);

					
					 $.ajax({
						 
					type: 'POST',
                    url: "<?php echo htmlspecialchars( $site, ENT_COMPAT, 'UTF-8', FALSE ); ?>jsonM?ds=8adsa8d81d189x9gje",
                    data: {full_name: fullname, country: country, phone_number: phone, trip_i_d: trip, city: city, email: email},
                    success: function(mData){
						
													alert(mData);

						
						if(mData == 1){
							
							
						$(".signup").html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:100px; display:block; text-align:center" aria-hidden="true"></i>');
						
						 $(".signup").delay(2000).fadeOut(800);
						
						$(".msgshow").delay(2000).fadeIn(100);

            			$(".sub").attr("disabled", false);
						
							
						}
						
					}
						 
					 });
						 
                   
                   
					
				}
				
			});
			
			
		});
		
	</script>
</body>
	<style>
	
		.signup-container {
			display: block;
			width: 525px;
			margin: 30px auto;
			border: 1px solid #e9ecef;
			box-shadow: 1px 1px 6px #e9ecef;
			background: #fff;
			    padding: 54px;
		}

..signup {

    background-color: #FFFFFF;
}

		.form-control{
			direction: rtl;
		}
		
		.btn-primary {
    color: #FFFFFF;
    background-color: #489be8;
    border-color: #1a82e2;
    margin: 20px auto;
    display: block;
}
		
	 .btn-account {
    display: block;
    margin-left: auto;
    margin-right: auto;
    max-width: 200px;
}
.msgshow {
    display: none;
    background: #fff;
    padding: 20px;
    border: 1px solid #ddd;
    width: 450px;
    border-radius: 3px;
    font-weight: bold;
    text-align: center;
    color: green;
    margin: 10px auto;
}
	</style>
</html>