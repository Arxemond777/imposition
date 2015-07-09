<?php
function createMask($firstPicture, $twoPicture, $mask, $maskX, $masky, $x, $y){
$img = new Imagick($firstPicture);
$mask = new Imagick($mask);
$width = $mask->getImageWidth();
$height = $mask->getImageHeight();


$img->resizeImage($width, $height, Imagick::FILTER_LANCZOS, 1);

$img->compositeImage($mask, Imagick::COMPOSITE_DSTIN, $maskX, $masky);

header("Content-Type: image/jpeg");
$img2 = new Imagick('goodMasks.jpg');
$img2->compositeImage($img, $img->getImageCompose(), $x, $y);
echo $img2;
}
createMask($firstPicture = "sourceMasks.png", $twoPicture = 'goodMasks.jpg',
    $mask = 'maskMasks.png', $maskX = 20, $masky = 70, $x = 5, $y = 162);