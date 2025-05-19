<?php
// Incluir configurações e funções
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';

// Processar o formulário quando enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    
    // Validar os dados
    $errors = validateContactForm($name, $email, $phone);
    
    if (empty($errors)) {
        // Adicionar o contato
        $newContact = addContact($name, $email, $phone);
        
        if ($newContact) {
            $_SESSION['success'] = "Contato adicionado com sucesso!";
            header("Location: index.php");
            exit;
        } else {
            $_SESSION['error'] = "Erro ao adicionar contato.";
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
                <h5 class="mb-0">Adicionar Novo Contato</h5>
            </div>
            <div class="card-body">
                <form action="adicionar.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="phone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>" required>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Salvar</button>
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
