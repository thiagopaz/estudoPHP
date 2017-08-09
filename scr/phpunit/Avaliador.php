<?php 
  class Avaliador {
      public $maiorValor = -INF;
      public $menorValor =  INF;
      private $media = 0;
      private $maiores ;

    public function avalia(Leilao $leilao)
      {
          $total = 0;
          foreach($leilao->getLances() as $lance){
              if($lance->getValor() > $this->maiorValor){
                  $this->maiorValor = $lance->getValor();
              }
              if($lance->getValor() < $this->menorValor){
                  $this->menorValor = $lance->getValor();
              }
              $total += $lance->getValor();
          }
          $this->media = $total / count($leilao->getLances());

          $this->pegaOsmaiores($leilao);
      }

      public function pegaOsmaiores(Leilao $leilao){
        $lances = $leilao->getLances();

        usort($lances , function($a,$b) {
           if($a->getValor() == $b->getValor()) return 0;
           return $a->getValor() < $b->getValor() ? 1: -1 ; 
        });

        $this->maiores = array_slice($lances , 0 , 3);
      }

      public function getMaiorLance(){
          return $this->maiorValor;
      }

      public function getMenorLance(){
          return $this->menorValor;
      }

      public function getMedia(){
          return $this->media ;
      }

      public function getMaiores(){
          return $this->maiores ;
      }
  }