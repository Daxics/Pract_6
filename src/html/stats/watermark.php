<?php
function add_watermark($image_name): void
{
    $image = imagecreatefrompng($image_name);

    // First we create our stamp image manually from GD
    $stamp = imagecreatetruecolor(100, 70);
    imagefilledrectangle($stamp, 0, 0, 99, 69, 0x0000FF);
    imagefilledrectangle($stamp, 9, 9, 90, 60, 0xFFFFFF);

    imagestring($stamp, 5, 20, 20, 'Turenko', 0x0000FF);

    imagestring($stamp, 3, 20, 40, '(c) 2022', 0x0000FF);

    // Set the margins for the stamp and get the height/width of the stamp image
    $right = 200;

    $bottom = 200;

    $sx = imagesx($stamp);

    $sy = imagesy($stamp);

    // Merge the stamp onto our photo with an opacity of 50%
    imagecopymerge($image, $stamp, imagesx($image) - $sx - $right, imagesy($image) - $sy - $bottom, 0, 0, imagesx($stamp), imagesy($stamp), 15);

    // Save the image to file and free memory
    imagepng($image, $image_name);

    imagedestroy($image);
}