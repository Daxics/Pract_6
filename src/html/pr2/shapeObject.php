<?php
abstract class shapeObject{
    private $fillColor;
    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function setID()
    {
        try {
            $this->id = chr(random_int(97, 122));
            for($i=0; $i<10; $i++){
                $this->id .= chr(random_int(97, 122));
            }
        } catch (Exception $e) {
            $this->id = $e;
        }
    }

    /**
     * @return mixed
     */
    public function getFillColor()
    {
        return $this->fillColor;
    }

    /**
     * @param mixed $fillColor
     */
    public function setFillColor($fillColor): void
    {
        $this->fillColor = $fillColor;
    }

}

class circleObject extends shapeObject{
    private $radius;

    /**
     * circleObject constructor.
     * @param $radius
     */
    public function __construct($radius)
    {
        $this->radius = $radius;
        $this->setID();
    }

    public function getCircleTag(){
        $center = $this->radius + 10;
        $css = "fill: " . $this->getFillColor() . ";";

        $circleTag = "<circle id='".$this->getID()."' cx='$center' cy='$center' r='$this->radius' style='$css'/>";

        return $circleTag;
    }

}

class rectangleObject extends shapeObject{
    private $width;
    private $height;

    /**
     * rectangleObject constructor.
     * @param $width
     * @param $height
     */
    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
        $this->setID();
    }

    public function getRectangleTag()
    {
        $css = "fill: " . $this->getFillColor() . ";";

        $rectangeTag = "<rect id='".$this->getID()."' width='$this->width' height='$this->height' style='$css'/>";

        return $rectangeTag;
    }
}

class polygonObject extends shapeObject{
    private $x1;
    private $x2;
    private $x3;
    private $y1;
    private $y2;
    private $y3;

    /**
     * polygonObject constructor.
     * @param $width
     * @param $height
     */
    public function __construct($x1, $y1, $x2, $y2, $x3, $y3)
    {
        $this->x1 = $x1;
        $this->y1 = $y1;
        $this->x2 = $x2;
        $this->y2 = $y2;
        $this->x3 = $x3;
        $this->y3 = $y3;
        $this->setID();
    }

    public function getPolygonTag()
    {
        $css = "fill: " . $this->getFillColor() . ";";

        $polygonTag = "<polygon id='".$this->getID()."' points='$this->x1,$this->y1 $this->x2,$this->y2 $this->x3,$this->y3' style='$css'/>";

        return $polygonTag;
    }
}