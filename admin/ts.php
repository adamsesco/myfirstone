<?php
                            include("tpl/head.php");

                            include("../newcp/global.php");

                            $sql_get_last = mysql_query("SELECT * FROM `news_prin` ORDER BY `id` DESC");
                            
                            $get_sql = mysql_fetch_object($sql_get_last);
            
                            $link = "http://fxinvestorgate.com/services/article.php?id=".$get_sql->id;
            
						      foreach(explode(",",$_GET["tshare"]) as $key => $val){
                            
                            $l_subtype = "#USDJPY #USDCAD #EURUSD #GOLD #OIL #Dollar #USD ";
                                  
                            $text_share = substr(strip_tags($get_sql->title), 0, 100)."...\n".$link;                                 
                            share_twitter($text_share, "http://fxinvestorgate.com/".$get_sql->pic, 1);
                            
                            shareTelegram(1, $link);

						}

include("tpl/header.php");		

?>

<div class="" style="padding:100px; text-align:center;">

    <div class='alert alert-success'>تم النشر بنجاح , <a href="news.php">رجوع</a></div>
    
</div>