<?php

trait MinhaTrait {
    public function showName()
    {
        print __METHOD__;
    }
}

trait MinhaSegundaTrait{
     public function showName1()
     {
         print __CLASS__ ;
     }
}

class Usuario
{
    use MinhaTrait ;
    use MinhaSegundaTrait;
}

$usuario = new Usuario();
$usuario->showName();
$usuario->showName1();