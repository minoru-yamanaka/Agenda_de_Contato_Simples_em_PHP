<?php
// Configurações do sistema
define('DATA_FILE', __DIR__ . '/../data/contacts.json');

// Inicializa o arquivo JSON de contatos se não existir
if (!file_exists(DATA_FILE)) {
    $emptyData = json_encode([], JSON_PRETTY_PRINT);
    file_put_contents(DATA_FILE, $emptyData);
}

// Função para gerar IDs únicos
function generateId() {
    return uniqid();
}

// Função para tratar erros
function handleError($message) {
    $_SESSION['error'] = $message;
    header('Location: index.php');
    exit;
}

// Função para mostrar mensagens de sucesso
function handleSuccess($message) {
    $_SESSION['success'] = $message;
    header('Location: index.php');
    exit;
}

// Inicializar a sessão em todas as páginas
session_start();
