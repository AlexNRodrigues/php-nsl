<?php

function contarPalavras($texto) {
    // Remove caracteres especiais e pontuações, mantendo apenas letras e espaços
    $texto = preg_replace('/[^\p{L}\p{N}\s]/u', '', $texto);
    
    // Converte o texto para minúsculas para garantir contagem não sensível a maiúsculas e minúsculas
    $texto = mb_strtolower($texto, 'UTF-8');
    
    // Divide a string em palavras usando espaços como delimitadores
    $palavras = explode(' ', $texto);
    
    // Remove espaços em branco adicionais
    $palavras = array_filter($palavras, 'trim');
    
    // Conta a ocorrência de cada palavra
    $contagem = array_count_values($palavras);
    
    return $contagem;
}

// Exemplo de uso
$texto = "Esta é uma frase de exemplo, com algumas palavras repetidas. Exemplo é uma palavra.";
$contagemPalavras = contarPalavras($texto);
print_r($contagemPalavras);
