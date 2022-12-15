<?php
require_once "shapeObject.php";
require_once "bitOperations.php";
$num = 0;

function invalid_request(){
    echo '<br/>Неверный формат! Следуйте формату, который указан ниже: <br/>
    Формат числа: сfwwwhhh<br/>
    с - цвет: 0 - черный, 1 - красный, 2 - зеленый, 3 - синий<br/>
    f - форма фигуры: 1 - круг, 2 - прямоугольник, 3 - треугольник<br/>
    www - ширина холста: 000-999 <br/>
    hhh - высота холста: 000-999 <br/>
    <br/>
    Пример: 21256256 <br/>
    Фигура:<br/>';
    $circle = new circleObject(118);
    $circle->setFillColor('green');
    echo "<svg width='256' height='256'>";
    echo $circle->getCircleTag();
    echo "</svg>";
    exit();
}


if(isset($_GET["num"])){
  
    $num = $_GET["num"];
}

echo "num = $num<br/>";

if (is_numeric($num)) {

    if ($num > 40000000) {
        invalid_request();
    }
	$height = mod($num,1000);
    $num = div($num,1000);
    $weight = mod($num,1000);
    $num = div($num,1000);
    $form = mod($num,10);
    $num = div($num,10);
    $color = mod($num,10);

    echo "color = $color<br/>";
    echo "form = $form<br/>";
    echo "weight = $weight<br/>";
    echo "height = $height<br/>";
    echo "<br/>";

    switch ($color) {
        case 1:
            $color = 'red';
            break;
        case 2:
            $color = 'green';
            break;
        case 3:
            $color = 'blue';
            break;
    }

    switch ($form) {
        case 1:
            $circle = new circleObject($weight/2-10);
            $circle->setFillColor($color);
            echo "<svg width='$weight' height='$height'>";
            echo $circle->getCircleTag();
            echo "</svg>";
            break;
        case 2:
            $square = new rectangleObject($weight, $height);
            $square->setFillColor($color);
            echo "<svg width='$weight' height='$height'>";
            echo $square->getRectangleTag();
            echo "</svg>";
            break;
        case 3:
            $x1 = $weight/2;
            $y1 = 0;
            $x2 = 0;
            $y2 = $height;
            $x3 = $weight;
            $y3 = $height;
            $polygon = new polygonObject($x1, $y1, $x2, $y2, $x3, $y3);
            $polygon->setFillColor($color);
            echo "<svg width='$weight' height='$height'>";
            echo $polygon->getPolygonTag();
            echo "</svg>";
            break;
        default:
            invalid_request();
            break;
    }
}
else{
    invalid_request();
}

