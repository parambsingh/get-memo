<?php

function pr($a = []) {
    echo "<pre>";
    print_r($a);
    echo "</pre>";
}


// Create objects
$image = new Imagick('files/391769245.jpg');
$watermark = new Imagick();
$mask = new Imagick();
$draw = new ImagickDraw();

// Define dimensions
$width = $image->getImageWidth();
$height = $image->getImageHeight();

 
// Create some palettes
$watermark->newImage($width, $height, new ImagickPixel('grey30'));
$mask->newImage($width, $height, new ImagickPixel('black'));

// Watermark text

// Set font properties
$draw->setFont('pirulenrg.ttf');
$draw->setFontSize(20);
$draw->setFillColor('grey70');
$draw->setFillColor('white');
// Position text at the bottom right of the image
$draw->setGravity(Imagick::GRAVITY_SOUTHWEST);
// Draw text on the watermark palette
//$watermark->annotateImage($draw, 10, 12, 0, $text);


// Draw text on the mask palette
$mask->annotateImage($draw, 20, 1000, 0, "PARAM");
$mask->annotateImage($draw, 20, 80, 0, "Class: A");


//$mask->annotateImage($draw, 0, 12, 0, $text);
//$draw->setFillColor('black');
//$mask->annotateImage($draw, 9, 11, 0, $text);

// This is needed for the mask to work
$mask->setImageMatte(false);

// Apply mask to watermark
$watermark->compositeImage($mask, Imagick::COMPOSITE_COPYOPACITY, 0, 0);

// Overlay watermark on image
$image->compositeImage($watermark, Imagick::COMPOSITE_DISSOLVE, 0, 0);

// Set output image format
$image->setImageFormat('jpg');

// Output the new image
header('Content-type: image/jpeg');
echo $image;
