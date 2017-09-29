<?php if(!$_COOKIE["news_panel"]){
    header("location: login.php");
} ?>
</head>
<body>

<header>
    <div class="logo">ادارة الرحلات</div>
    <div class="menu">
            <a href="index.php"><i class="fa fa-home"></i></a>
            <a href="newtopic.php"><i class="fa fa-plus"></i></a>
            <a href="index.php?page=signout"><i class="fa fa-sign-out"></i></a>
    </div>
</header>
<div class="left_column">
    <img src="https://www.w3schools.com/w3css/img_avatar3.png" style="width:100px; height:100px; border-radius:100%; margin:20px auto; display:block; border:5px solid #ddd; background:#fff;" />
    <span style="display:block; color:#fff; text-align:center; padding:10px;">اهلا بك</span>
    
    <ul>
        <li><a href="index.php">الصفحة الرئيسية <i class="fa fa-home"></i></a></li>
        <li><a href="newtrip.php">اضافة رحلة <i class="fa fa-plus-circle"></i></a></li>
        <li><a href="trips.php">الرحلات <i class="fa fa-list"></i></a></li>
        <li><a href="orders.php">طلبات الانضمام <i class="fa fa-list"></i></a></li>
        <li><a href="setting.php">اعدادات خاصة <i class="fa fa-wrench"></i></a></li>
        
    </ul>
</div>