<?php 

/** 
    * classes
*/

$anonymousClass = new class{
    private $name ;

    public function getName(){
        return $this->name;        
    } 

    public function setName($name){
        $this->name = $name ;
    }
};

class Car {
    private $anonymous;
    
    public function __construct($anony){
        $this->anonymous = $anony ;
    }

    public function getAnonymoys(){
        return $this->anonymous;
    }
}

$car = new Car($anonymousClass);

$car->getAnonymoys()->setName('Fusca');

print $car->getAnonymoys()->getName();