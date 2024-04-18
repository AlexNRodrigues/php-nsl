<?php

function verificarPalindromo($palavra) {
    // Remover espaços em branco e converter para minúsculas para evitar discrepâncias
    $palavra = strtolower(str_replace(' ', '', $palavra));
    
    // Inverter a palavra
    $palavraInvertida = strrev($palavra);
    
    // Verificar se a palavra invertida é igual à palavra original
    if ($palavra == $palavraInvertida) {
        return true;
    } else {
        return false;
    }
}

// Exemplos de uso
$palavras = ['arara', 'asa', 'banana', 'amor', 'rever', 'casa', 'oco', 'sol'];

foreach ($palavras as $palavra) {
    
    echo verificarPalindromo($palavra) ? "$palavra é um palíndromo. \n" : "$palavra não é um palíndromo. \n" ;

}
