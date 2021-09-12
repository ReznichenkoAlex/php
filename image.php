<?php
require_once './vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;

$source = getcwd() . DIRECTORY_SEPARATOR . 'cat.png';
$result = getcwd() . DIRECTORY_SEPARATOR . 'cat_result.png';
echo $source;
echo "<br>" . $result;
$image = Image::make($source)->resize(500, null, function ($image) {
    $image->aspectRatio();
});
watermark($image);
$image->save($result, 80);


$image->response('png');
function watermark(\Intervention\Image\Image $image)
{
    $image->text(
        "Кот пьет воду",
        100,
        100,
        function ($font) {
            $font->file(getcwd() . DIRECTORY_SEPARATOR . 'font.ttf')->size('30'); //требуется расширение freetype
            $font->color('#44EED0');
            $font->align('center');
            $font->valign('bottom ');
        });
}

