<?php
	class Leilao {
		private $descricao;
		private $lances;
		
		function __construct($descricao) {
			$this->descricao = $descricao;
			$this->lances = array();
		}		

		private function podeDarLance(Usuario $usuario){
			$total = $this->contaLanceDo($usuario);	
			return $this->pegaUltimoLance()->getUsuario()  != $usuario && $total < 5 ;
		}

		private function contaLanceDo(Usuario $usuario){
			$total = 0 ;
			foreach($this->lances as $lanceAtual){
				if($lanceAtual->getUsuario() == $usuario) $total ++;
			}
			return $total ;
		}
		private function pegaUltimoLance(){
			return $this->lances[count($this->lances) - 1];
		}
				
		public function propoe(Lance $lance) {
			if(count($this->lances) == 0 || $this->podeDarLance($lance->getUsuario()))
				$this->lances[] = $lance;
		}
		public function getDescricao() {
			return $this->descricao;
		}

		public function getLances() {
			return $this->lances;
		}
	}
?>