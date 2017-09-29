<?php
    require("config.php");

    include("vendor/autoload.php");

    include("class_db.php");

    use Rain\Tpl;

    use Bramus\Router\Router;
   

    $router = new Router();

    $db = new Lestroisw\Adam\Dodb();
 
    $config = array(
    "base_url"      => null,
    "tpl_dir"       => "templates/default/",
    "cache_dir"     => "cache/",
    "remove_comments" => true,
    "debug"         => true, // set to false to improve the speed
    );

    Tpl::configure( $config );
    
    $tpl = new Tpl;

    $tpl->assign("site", $site);


    //Start our functions

    function xss_clean($data)
        {
        // Fix &entity\n;
        $data = mysql_real_escape_string(str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data));
        $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
        $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
        $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

        // Remove any attribute starting with "on" or xmlns
        $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

        // Remove javascript: and vbscript: protocols
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

        // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

        // Remove namespaced elements (we do not need them)
        $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

        do
        {
            // Remove really unwanted tags
            $old_data = $data;
            $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
        }
        while ($old_data !== $data);

        // we are done...
        return $data;
        }

function mimeImg($val){
    
        
         $info = pathinfo($val);
         switch ($info["extension"]) {
         case "gif":
                 
                return "gif";
                 
         break;
                 
         case "jpeg":
                 
            return "jpeg";
                 
         break;
                 
         case "jpg":
                 
            return "jpg";
                 
         break;
                 
         case "png":
                 
            return "png";
                 
         break;
                 
         case "GIF":
                 
            return "gif";
                 
         break;
                 
         case "JPEG":
                 
            return "jpeg";
                 
         break;
                 
         case "JPG":
                 
            return "jpg";
                 
         break;
                 
         case "PNG":
                 
            return "png";
                 
         break;
         default:
                 
            return false;   
                 
         break;
            }   
    
}
function userinfo($user_id, $type){
        if(is_numeric($user_id)){
            $sql = mysql_query("SELECT * FROM users WHERE id = '" . intval($user_id) . "'");
        }
        else{
            $sql = mysql_query("SELECT * FROM users WHERE secret_tkn = '" . mysql_real_escape_string($user_id) . "'");
        }
		
		$sql_r = mysql_fetch_object($sql);
			return $sql_r->$type;
			mysql_free_result($sql);
	}

function getRealUserIp(){
    switch(true){
      case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
      case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
      case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
      default : return $_SERVER['REMOTE_ADDR'];
    }
 }

function rateSystem($post_id){
    
    $db = new Lestroisw\Adam\Dodb();
    
    $post_id = intval($post_id);
    
    if(!$db::checkifexiste("rates", "WHERE `adress_ip` = '" . getRealUserIp() ."' AND `post_id` = '$post_id'")){
        
         $db::insert("rates", array("adress_ip" => getRealUserIp(), "post_id" => $post_id, "date" => "date_func"));
         
         $db::updateDb("users", " `id` = '$post_id'", " `rates` = rates+1");
         
         return true;
         
         
     }
    return false;
    
}

function checkIfvoted($post_id){
    
    $db = new Lestroisw\Adam\Dodb();
    
    if($db::checkifexiste("rates", "WHERE `adress_ip` = '" . getRealUserIp() ."' AND `post_id` = '$post_id'")){
        
        return true;
        
    }
    
    return false;
}

function get_likes($post_id){
    
    $db = new Lestroisw\Adam\Dodb();
    
    return $db::countDb("WHERE `post_id` = '$post_id'", "rates");
    
}


function resize_image($fn, $w, $h) {
    
    if(getMimeType($fn)){
        $info = pathinfo($fn);
        $size = getimagesize($fn);
        $ratio = $size[1]/$size[0]; // width/height
        if( $ratio > 1) {
            $width = $w;
            $height = $h/$ratio;
        }
        else {
            $width = $w*$ratio;
            $height = $h;
        }
        $src = imagecreatefromstring(file_get_contents($fn));
        $dst = imagecreatetruecolor($width,$height);
        imagecopyresampled($dst,$src,0,0,0,0,$width,$height,$size[0],$size[1]);
        imagedestroy($src);
        switch ($info['extension']) {
        case "gif":
         imagegif($img_base, $fn);
         break;
            case "jpeg":
         imagejpeg($img_base, $fn);
         break;
                 case "jpg":
         imagejpeg($img_base, $fn);
         break;
            case "png":
         imagepng($img_base, $fn);
         break;
                 case "GIF":
         imagegif($img_base, $fn);
         break;
            case "JPEG":
         imagejpeg($img_base, $fn);
         break;
                 case "JPG":
         imagejpeg($img_base, $fn);
         break;
         case "PNG":
         imagepng($img_base, $fn);
         break;
            default:
                return false;    
            break;
            }

        imagedestroy($dst);
        
        return true;
    }
    
    return false;
}

function get_setting($type){
    
    $db = new Lestroisw\Adam\Dodb();
    
    $db_return =  $db::getData("`id` = '1'", "setting");
    
    return $db_return[$type];
        
}

function getTrips(){
	
    $db = new Lestroisw\Adam\Dodb();
	
	return $db::display_db("trips", "", "id","DESC", "");
	
}

function setting($type){
    
        $sql = mysql_query("SELECT * FROM `setting`WHERE `id` = '1'");
    
       $sql_r = mysql_fetch_object($sql);
    
        return @$sql_r->$type;
    
}


?>