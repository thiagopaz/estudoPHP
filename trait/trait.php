<?php

trait MyTrait {
    public function showName()
    {
        print __METHOD__;
    }
}

trait MySecondTrait{
     public function showName1()
     {
         print __CLASS__ ;
     }
}

class User
{
    use MyTrait ;
    use MySecondTrait;
}

$user = new User();
$user->showName();
$user->showName1();