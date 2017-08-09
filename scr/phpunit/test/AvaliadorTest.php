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
        $leilao->propoe(new Lance($rafael, 350));
        $leilao->propoe(new Lance($clayton, 250));

        $leiloeiro = new Avaliador();
        $leiloeiro->avalia($leilao);
        $maiorEsperado = 400 ;
        $menorEsperado = 250 ;
        $this->assertEquals($maiorEsperado,$leiloeiro->getMaiorLance() );
        $this->assertEquals($menorEsperado, $leiloeiro->getMenorLance());
      //  $this->assertEquals(400 , $leiloeiro->getMedia() , 0.0001);        
        }

    public function testLeilaoOrdemCrescente(){
        $leilao = new Leilao("Prisma 2018");
        $thiago  = new Usuario("Thiago");
        $rafael  = new Usuario("Rafael");
        $clayton  = new Usuario("Clayton");

        $leilao->propoe(new Lance($thiago, 2000));
        $leilao->propoe(new Lance($rafael, 3500));
        $leilao->propoe(new Lance($clayton, 4500));

        $leiloeiro = new Avaliador();
        $leiloeiro->avalia($leilao);
        $maiorEsperado = 4500 ;
        $menorEsperado = 2000 ;
      
        $this->assertEquals($maiorEsperado,$leiloeiro->getMaiorLance() );
        $this->assertEquals($menorEsperado, $leiloeiro->getMenorLance());        
    }

    public function testDeveAceitarApenasUmLance(){
        $leilao = new Leilao("Prisma 2018");
        $thiago = new Usuario("Thiago");

        $leilao->propoe(new Lance($thiago, 5000));

        $leiloeiro = new Avaliador();
        $leiloeiro->avalia($leilao);
        $maiorEsperado = 5000 ;
        $menorEsperado = 5000 ;
        
        $this->assertEquals($maiorEsperado, $leiloeiro->getMaiorLance());
        $this->assertEquals($menorEsperado, $leiloeiro->getMaiorLance());
    }

    public function testDevePegarOsMaiores(){
        $leilao = new Leilao("Prisma 2018");
        $thiago = new Usuario("Thiago");
        $paulo = new Usuario("Paulo");

        $leilao->propoe(new Lance($thiago, 200));
        $leilao->propoe(new Lance($paulo, 300));
        $leilao->propoe(new Lance($thiago, 400));
        $leilao->propoe(new Lance($paulo, 500));

        $leiloeiro = new Avaliador();
        $leiloeiro->avalia($leilao);

        $this->assertEquals(3, count($leiloeiro->getMaiores()));
        $this->assertEquals(500, $leiloeiro->getMaiores()[0]->getValor());
        $this->assertEquals(400, $leiloeiro->getMaiores()[1]->getValor());
        $this->assertEquals(300, $leiloeiro->getMaiores()[2]->getValor());
    }
      
}
?>