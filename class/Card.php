<?php

use GDText\Box;
use GDText\Color;

class Card
{
    function createCardWithCan($text)
    {
        require __DIR__.'/../vendor/autoload.php';

        $im = imagecreatefromjpeg('image/clouds_background.jpg');;
        $backgroundColor = imagecolorallocate($im, 0, 18, 64);
        imagefill($im, 0, 0, $backgroundColor);

        $box = new Box($im);
        $box->setFontFace(realpath('style/font/apolonia/Apolonia-BoldItalic 2016.ttf'));
        $box->setFontColor(new Color(255, 255, 255));
        $box->setTextShadow(new Color(0, 0, 0, 50), 2, 2);
        $box->setFontSize(57);
        $box->setLineHeight(1.5);
        //$box->enableDebug();
        $box->setBox(30, 30, 840, 640);
        $box->setTextAlign('center', 'center');
        $box->draw($text);


        // Stopka z podaniem źródła

        $box->setBox(730, 655, 150, 25);
        $box->setTextAlign('right', 'bottom');
        $box->setTextShadow(new Color(0, 0, 0, 100), 1, 1);
        $box->setFontSize(17);
        $box->draw("źródło: mozesz.eu");

        imagejpeg($im, 'image/cards/mozesz.jpg', 100, PNG_ALL_FILTERS);
        imagedestroy($im);
    }
}
