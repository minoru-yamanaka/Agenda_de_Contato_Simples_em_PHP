<?php
// Incluir configurações e funções
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';

// Verificar se o ID foi fornecido
if (!isset($_GET['id']) || empty($_GET['id'])) {
    $_SESSION['error'] = "ID do contato não fornecido.";
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

// Verificar se o contato existe
$contact = getContactById($id);
if (!$contact) {
    $_SESSION['error'] = "Contato não encontrado.";
    header("Location: index.php");
    exit;
}

// Excluir o contato
$deleted = deleteContact($id);

if ($deleted) {
    $_SESSION['success'] = "Contato excluído com sucesso!";
} else {
    $_SESSION['error'] = "Erro ao excluir contato.";
}

// Redirecionar para a página inicial
header("Location: index.php");
exit;
