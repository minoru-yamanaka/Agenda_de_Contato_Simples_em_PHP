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
$contact = getContactById($id);

// Verificar se o contato existe
if (!$contact) {
    $_SESSION['error'] = "Contato não encontrado.";
    header("Location: index.php");
    exit;
}

// Incluir o cabeçalho
include __DIR__ . '/includes/header.php';
?>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Detalhes do Contato</h5>
                <div>
                    <a href="editar.php?id=<?php echo $contact['id']; ?>" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <a href="deletar.php?id=<?php echo $contact['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este contato?');">
                        <i class="fas fa-trash"></i> Excluir
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th style="width: 150px;">Nome:</th>
                        <td><?php echo htmlspecialchars($contact['name']); ?></td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td><?php echo htmlspecialchars($contact['email']); ?></td>
                    </tr>
                    <tr>
                        <th>Telefone:</th>
                        <td><?php echo htmlspecialchars($contact['phone']); ?></td>
                    </tr>
                    <tr>
                        <th>Data de Criação:</th>
                        <td><?php echo htmlspecialchars($contact['created_at'] ?? 'N/A'); ?></td>
                    </tr>
                    <?php if (isset($contact['updated_at'])): ?>
                    <tr>
                        <th>Última Atualização:</th>
                        <td><?php echo htmlspecialchars($contact['updated_at']); ?></td>
                    </tr>
                    <?php endif; ?>
                </table>
                
                <div class="mt-3">
                    <a href="index.php" class="btn btn-secondary">Voltar para a Lista</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Incluir o rodapé
include __DIR__ . '/includes/footer.php';
?>
