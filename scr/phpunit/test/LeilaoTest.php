<?php 

require "Leilao.php";
require "Usuario.php";
require "Lance.php";

class LeilaoTest extends \PHPUnit_Framework_TestCase
{
    
    public function testDeveProporUmLance(){
        $leilao = new Leilao(" Ipad novo");

        $this->assertEquals(0 , count($leilao->getLances()));

        $pedro = new Usuario("Pedro");

        $leilao->propoe(new Lance($pedro, 2000));

        $this->assertEquals(1, count($leilao->getLances()));
        $this->assertEquals(2000 , $leilao->getLances()[0]->getValor());
    }

    public function testDeveBarrarDoisLancesSeguidos(){
        $leilao = new Leilao(" Ipad novo");

        $this->assertEquals(0 , count($leilao->getLances()));

        $pedro = new Usuario("Pedro");

        $leilao->propoe(new Lance($pedro, 2000));
        $leilao->propoe(new Lance($pedro, 2500));

        $this->assertEquals(1, count($leilao->getLances()));
        $this->assertEquals(2000 , $leilao->getLances()[0]->getValor());
    }

    public function testDeveDarNoMaximo5Lances() {
        $leilao = new Leilao(" Ipad novo");
        
        $jobs   = new Usuario("Jobs");
        $gates  = new Usuario("Gates");

        $leilao->propoe(new Lance($jobs, 2000));
        $leilao->propoe(new Lance($gates, 3000));

        $leilao->propoe(new Lance($jobs, 4000));
        $leilao->propoe(new Lance($gates, 5000));

        $leilao->propoe(new Lance($jobs, 6000));
        $leilao->propoe(new Lance($gates, 7000));

        $leilao->propoe(new Lance($jobs, 8000));
        $leilao->propoe(new Lance($gates, 9000));

        $leilao->propoe(new Lance($jobs, 10000));
        $leilao->propoe(new Lance($gates, 11000));

        //ignorar
        $leilao->propoe(new Lance($jobs, 12000));


        $this->assertEquals(10, count($leilao->getLances()));
      //  $this->assertEquals(11000, count($leilao->getLances()[9]->getValor()));
    }
}
?>