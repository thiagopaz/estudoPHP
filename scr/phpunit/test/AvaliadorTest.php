<?php
    require "Usuario.php";
    require "Lance.php";
    require "Leilao.php";
    require "Avaliador.php";


class AvaliadorTest extends \PHPUnit_Framework_TestCase
{   
    public function SetUp(){
        $this->leiloeiro = new Avaliador();
        var_dump("inicializando teste!");
    }
    public function testLeilao(){
        $leilao = new Leilao("Prisma 2018");
        $thiago  = new Usuario("Thiago");
        $rafael  = new Usuario("Rafael");
        $clayton  = new Usuario("Clayton");

        $leilao->propoe(new Lance($thiago, 400));
        $leilao->propoe(new Lance($rafael, 350));
        $leilao->propoe(new Lance($clayton, 250));

        
        $this->leiloeiro->avalia($leilao);
        $maiorEsperado = 400 ;
        $menorEsperado = 250 ;
        $this->assertEquals($maiorEsperado,$this->leiloeiro->getMaiorLance() );
        $this->assertEquals($menorEsperado, $this->leiloeiro->getMenorLance());
      //  $this->assertEquals(400 , $this->leiloeiro->getMedia() , 0.0001);        
        }

    public function testLeilaoOrdemCrescente(){
        $leilao = new Leilao("Prisma 2018");
        $thiago  = new Usuario("Thiago");
        $rafael  = new Usuario("Rafael");
        $clayton  = new Usuario("Clayton");

        $leilao->propoe(new Lance($thiago, 2000));
        $leilao->propoe(new Lance($rafael, 3500));
        $leilao->propoe(new Lance($clayton, 4500));

        $this->leiloeiro->avalia($leilao);
        $maiorEsperado = 4500 ;
        $menorEsperado = 2000 ;
      
        $this->assertEquals($maiorEsperado,$this->leiloeiro->getMaiorLance() );
        $this->assertEquals($menorEsperado, $this->leiloeiro->getMenorLance());        
    }

    public function testDeveAceitarApenasUmLance(){
        $leilao = new Leilao("Prisma 2018");
        $thiago = new Usuario("Thiago");

        $leilao->propoe(new Lance($thiago, 5000));

        $this->leiloeiro->avalia($leilao);
        $maiorEsperado = 5000 ;
        $menorEsperado = 5000 ;
        
        $this->assertEquals($maiorEsperado, $this->leiloeiro->getMaiorLance());
        $this->assertEquals($menorEsperado, $this->leiloeiro->getMaiorLance());
    }

    public function testDevePegarOsTresMaiores(){
        $leilao = new Leilao("Prisma 2018");
        $thiago = new Usuario("Thiago");
        $paulo = new Usuario("Paulo");

        $leilao->propoe(new Lance($thiago, 200));
        $leilao->propoe(new Lance($paulo, 300));
        $leilao->propoe(new Lance($thiago, 400));
        $leilao->propoe(new Lance($paulo, 500));

        
        $this->leiloeiro->avalia($leilao);

        $this->assertEquals(3, count($this->leiloeiro->getMaiores()));
        $this->assertEquals(500, $this->leiloeiro->getMaiores()[0]->getValor());
        $this->assertEquals(400, $this->leiloeiro->getMaiores()[1]->getValor());
        $this->assertEquals(300, $this->leiloeiro->getMaiores()[2]->getValor());
    }

    public function tearDown() {
     var_dump("fim");
    }
      
}
?>