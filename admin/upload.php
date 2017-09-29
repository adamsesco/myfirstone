<?php
    // Allowed extentions.
    
    $hoste = "http://localhost/beta/";
    function isImage($mediapath){
        if(is_array(getimagesize($mediapath))){
            $image = true;
        } else {
            $image = false;
        }
    }
    $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "PNG", "JPEG");

    // Get filename.
    $temp = explode(".", $_FILES["file"]["name"]);

    // Get extension.
    $extension = end($temp);

    // An image check is being done in the editor but it is best to
    // check that again on the server side.
    if ((($_FILES["file"]["type"] == "image/gif")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ( ! isImage($_FILES["file"]["tmp_name"]))
    || ($_FILES["file"]["type"] == "image/jpg")
    || ($_FILES["file"]["type"] == "image/pjpeg")
    || ($_FILES["file"]["type"] == "image/x-png")
    || ($_FILES["file"]["type"] == "image/png"))
    && in_array($extension, $allowedExts)) {
        // Generate new random name.
        $name = sha1(microtime()) . "." . $extension;

        // Save file in the uploads folder.
        move_uploaded_file($_FILES["file"]["tmp_name"], "../images/" . $name);

        // Generate response.
        $response = new StdClass;
        $response->link = "http://mefxtraders.com/beta/images/" . $name;
        echo stripslashes(json_encode($response));
    }

?>