<?php

    class Jogo {
        public $n;
        public $m;
        public $jogadores = [];
        public $simbolos  = ['H', 'E', 'R'];
        public $entrada   = [];
        public $saida     = [];

        public $quantidades = [0, 0, 0];

        function __construct(int $n, int $m) {
            if ($n > 10**5 || $m > 10**6) {
                exit('O programa não pode rodar');
            }

            $this->n = $n;
            $this->m = $m;
            
            $this->jogadores = array_fill(1 , $n, 'H');
        }

        function lerArquivo(string $nomeArquivo) {
            $arquivo = fopen($nomeArquivo, "r");
        
            if ($arquivo) {
                while (($linha = fgets($arquivo)) !== false) {
                    $linha = trim($linha);
                    $elementos = explode(' ', $linha);
        
                    $this->entrada[] = $elementos;
                }
        
                fclose($arquivo);
            } else {
                echo "Erro ao abrir o arquivo.";
            }
        }

        function processaEntrada() {
            foreach ($this->entrada as $linha) {
                if ($linha[0] == 'M') {
                    $this->mudancaEstado($linha[1], $linha[2]);
                } else {
                    $this->computaRodada($linha[1], $linha[2]);
                }
            }
        }

        function mudancaEstado(int $a, int $b) {
            if ($a < 1 || $b < $a || $b > $this->n) {
                exit('O programa não pode rodar: mudancaEstado()');
            }

            for ($i=$a; $i <= $b; $i++) {
                $indice = array_search($this->jogadores[$i], $this->simbolos);
                if ($indice == 2) $indice = -1;
                $this->jogadores[$i] = $this->simbolos[$indice + 1];
            }
        }

        function computaRodada(int $a, int $b) {
            if ($a < 1 || $b < $a || $b > $this->n) {
                exit('O programa não pode rodar: mudancaEstado()');
            }

            $this->quantidades = [0, 0, 0];
            
            for ($i=$a; $i <= $b; $i++) {
                foreach ($this->simbolos as $chave => $valor) {
                    if ($this->jogadores[$i] == $valor) {
                        $this->quantidades[$chave] += 1;
                    } 
                }

            }
            
            echo "<pre>";
            print_r($this->quantidades);
        }
    }
