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

// Processar o formulário quando enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    
    // Validar os dados
    $errors = validateContactForm($name, $email, $phone);
    
    if (empty($errors)) {
        // Atualizar o contato
        $updated = updateContact($id, $name, $email, $phone);
        
        if ($updated) {
            $_SESSION['success'] = "Contato atualizado com sucesso!";
            header("Location: index.php");
            exit;
        } else {
            $_SESSION['error'] = "Erro ao atualizar contato.";
        }
    } else {
        $_SESSION['error'] = implode('<br>', $errors);
    }
}

// Incluir o cabeçalho
include __DIR__ . '/includes/header.php';
?>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Editar Contato</h5>
            </div>
            <div class="card-body">
                <form action="editar.php?id=<?php echo $id; ?>" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($contact['name']); ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($contact['email']); ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="phone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($contact['phone']); ?>" required>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                        <a href="index.php" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
// Incluir o rodapé
include __DIR__ . '/includes/footer.php';
?>
