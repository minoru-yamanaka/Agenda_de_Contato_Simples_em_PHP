<?php
// Incluir configurações e funções
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';

// Carregar todos os contatos
$contacts = getAllContacts();

// Incluir o cabeçalho
include __DIR__ . '/includes/header.php';
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Lista de Contatos</h5>
                <a href="adicionar.php" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Novo Contato
                </a>
            </div>
            <div class="card-body">
                <?php if (empty($contacts)): ?>
                    <div class="alert alert-info">
                        Nenhum contato cadastrado. <a href="adicionar.php">Adicionar um novo contato</a>.
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($contacts as $contact): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($contact['name']); ?></td>
                                    <td><?php echo htmlspecialchars($contact['email']); ?></td>
                                    <td><?php echo htmlspecialchars($contact['phone']); ?></td>
                                    <td>
                                        <a href="visualizar.php?id=<?php echo $contact['id']; ?>" class="btn btn-info btn-sm" title="Visualizar">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="editar.php?id=<?php echo $contact['id']; ?>" class="btn btn-warning btn-sm" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="deletar.php?id=<?php echo $contact['id']; ?>" class="btn btn-danger btn-sm" title="Excluir" onclick="return confirm('Tem certeza que deseja excluir este contato?');">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
// Incluir o rodapé
include __DIR__ . '/includes/footer.php';
?>
