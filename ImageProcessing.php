 <?php

function reSize($input,$output){
	
// Get new dimensions
$percent = 0.5;
list($width, $height) = getimagesize($input);
$new_width = $width * $percent;
$new_height = $height * $percent;

//Absolute dimensions
$new_width = 200;
$new_height = 200;

// Resample
$image_p = imagecreatetruecolor($new_width, $new_height);
$image = imagecreatefromjpeg($input);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);


// Output
imagejpeg($image_p, $output);

imagedestroy($image);
imagedestroy($image_p);


}





$path1 = "./temp/";
$path2 = "./temp_s/";
$dir_handle = @opendir($path1) or die("Unable to open $path please notify the administrator. Thank you.");

$i = 1;
while($file = readdir($dir_handle))
{
if($file != '.' && $file != '..' && $file !='.DS_Store')
{
echo $path1.$file;	
echo $path2.$file;
reSize($path1.$file,$path2.strval($i).'.jpg');
$i++;
echo $i;
}
}





//closing the directory
closedir($dir_handle);
?>