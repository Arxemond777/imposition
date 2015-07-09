<?php
function colorAndTexture($onePicture, $color, $texture, $quantityPictureForHorizontal, $quantityPictureForVertical){
    if ($color != null){
        $img = new Imagick($onePicture);
        $img->setImageAlphaChannel(Imagick::ALPHACHANNEL_EXTRACT);
        $img->setImageBackgroundColor($color);
        $img->setImageAlphaChannel(Imagick::ALPHACHANNEL_SHAPE);
        header("Content-Type: image/png");
        echo $img;
    }
    if ($texture != null && $quantityPictureForHorizontal > 0 && $quantityPictureForVertical > 0){
        $img = new \Imagick();
        $img->newImage(640, 480, new \ImagickPixel('pink'));
        $img->setImageFormat("jpg");
        $texture = new \Imagick(realpath($texture));
        $texture->scaleimage($img->getimagewidth() / $quantityPictureForHorizontal, $img->getimageheight() / $quantityPictureForVertical);
        $img = $img->textureImage($texture);
        header("Content-Type: image/jpg");
        echo $img;
    }
}
colorAndTexture($onePicture = 'source.png',$color = null/*'red'*/, $texture = 'good.jpg', $quantityPictureForHorizontal = 2, $quantityPictureForVertical = 2);