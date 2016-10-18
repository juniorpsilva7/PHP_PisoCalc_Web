<?php

//use Database;
/**
 * Este arquivo contém as configurações necessárias para
 * o sistema de login funcionar corretamente.
 */

/* Define o limite de tempo da sessão em 60 minutos */
session_cache_expire(60);

// Inicia a sessão
session_start();

// Variável que verifica se o usuário está logado
if ( ! isset( $_SESSION['logado'] ) ) {
    $_SESSION['logado'] = false;
}

// Erro do login
$_SESSION['login_erro'] = false;

try {
    // Cria a conexão PDO com a base de dados
    $conexao_pdo = Database::connect();
} catch (PDOException $e) {
    // Se der algo errado, mostra o erro PDO
    print "Erro: " . $e->getMessage() . "<br/>";
   
    // Mata o script
    die();
}


?>