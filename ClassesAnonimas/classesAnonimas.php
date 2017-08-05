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

$anonymousClass->setName('Thiago Paz');

print $anonymousClass->getName();