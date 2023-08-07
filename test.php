<?php

class fruit{
    public $name;
    private $color;

    public function __construct($name,$color){
        $this->name=$name;
        $this->color=$color;
    }
    protected function intro(){
        echo "this fruit is {$this->name} with {$this->color} color";
    }
}

class Strawberry extends fruit{
    const ali="this  is";
    public function massage(){
        $ali= "Am I a fruit or berry";
        echo self::ali;
    }
}

$strawberry=new strawberry("strawberry","red");
echo $strawberry->massage();



?>