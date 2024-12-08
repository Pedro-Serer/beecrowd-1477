<?php
    require_once 'classes/jogo.php';
    
    // Processa o primeiro arquivo
    $arquivo1 = new arquivo1(10, 7);

    $arquivo1->lerArquivo('assets/entrada1.txt');
    $arquivo1->processaEntrada();

    // Processa o segundo arquivo
    $arquivo2 = new arquivo1(5, 6);

    $arquivo2->lerArquivo('assets/entrada2.txt');
    $arquivo2->processaEntrada();