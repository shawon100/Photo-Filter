<?php

if(isset($_POST['upload']))
{
	
	$image=$_FILES['image']['name'];
	$file_tmp=$_FILES['image']['tmp_name'];
	//echo "$file_tmp";
	$file ='images/'.$image;
	$store= move_uploaded_file($file_tmp, $file);
    //$filename="images/ruet13.jpg";

    list($width, $height) = getimagesize($file);
    $newwidth = 800;
    $newheight = 800;
	$thumb = imagecreatetruecolor($newwidth, $newheight);
    $source = imagecreatefromjpeg($file);
    imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    imagejpeg($thumb,$file);


        $base_image = imagecreatefrompng("images/base.png");
	    // Get the facebook profile image in 200x200 pixels
	    $photo = imagecreatefromjpeg($file);
		//echo "$photo";
		//$photo = imagecreatefromjpeg("http://graph.facebook.com/".$id."/picture?width=200&height=200");

		//resizeImage($photo,920,920);
	    // read overlay  
		$overlay = imagecreatefrompng("images/layer.png");
	    // keep transparency of base image
		imagesavealpha($base_image, true);
		imagealphablending($base_image, true);
	    // place photo onto base (reading all of the photo and pasting unto all of the base)
		imagecopyresampled($base_image, $photo, 0, 0, 0, 0, 800, 800, 800, 800);
		
	    // place overlay on top of base and photo
		imagecopy($base_image, $overlay, 0, 0, 0, 0, 800, 800);
	    // Save as jpeg
		imagejpeg($base_image, $file);

		//$input=file_get_contents($file);




}






?>

<!DOCTYPE html>
<html>
<head>
  
    
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Ruetians 13</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/vlab.css">
        <link rel="icon" type="image/png" href="images/icon.png">
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
        <script src="bootstrap-3.3.7/js/bootstrap.min.js" </script>
        <script src="bootstrap-3.3.7/js/bootstrap.js" </script>
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>







</head>
<body>
<div class="row area">

<div class="col-sm-3">

</div>
<div class="col-sm-6">
<div class="main">
<center><h2>Your Picture Is Ready</h2></center><br>
<div class="xmm">
<img class="img-responsive" src="<?php echo "$file"  ?>">
</div><br><br>
<center><a class="btn btn-primary" href="<?php echo "$file"  ?>" download target="_blank">Download</a></center>
<br><br><center><b>Developed By <a href="http://facebook.com/ashadullah.shawon">Shawon</a></b></center>
</div>

<div class="col-sm-3">
</div>
</div>
</body>
</html>