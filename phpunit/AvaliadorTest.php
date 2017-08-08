<?php
    require "Usuario.php";
    require "Lance.php";
    require "Leilao.php";
    require "Avaliador.php";


    class AvaliadorTest extends \PHPUnit_Framework_TestCase
    {
        public function testLeilao(){
              $leilao = new Leilao("Prisma 2018");
        $thiago  = new Usuario("Thiago");
        $rafael  = new Usuario("Rafael");
        $clayton  = new Usuario("Clayton");

        $leilao->propoe(new Lance($thiago, 400));
        $leilao->propoe(new Lance($rafael, 500));
        $leilao->propoe(new Lance($clayton, 700));

        $leiloeiro = new Avaliador();
        $leiloeiro->avalia($leilao);
        $maiorEsperado = 700 ;
        $menorEsperado = 400 ;
        $this->assertEquals($leiloeiro->getMaiorLance(), $maiorEsperado);
      //  $this->assertEquals($leiloeiro->getMenorLance(), $menorEsperado);
        
        }
      
    }
?>