<?php
include('../config/protection.php');
include('../models/TarefasModel.php');
echo "<a href='../config/logout.php'>Sair</a>";

if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location Principal.php');
    exit();
}

$tarefa_id = (int)$_GET['id'];

$tarefa = Tarefa::getTarefaPorId($tarefa_id);

if(!$tarefa) {
    echo "Tarefa não encontrada.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>
</head>
<body>
    <h1>Editar Tarefa</h1>

    <form action="../controller/EditarController.php" method="POST">
        
        <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">

        <div>
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($tarefa['titulo']); ?>" required>
        </div>
        
        <div>
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao"><?php echo htmlspecialchars($tarefa['descricao'] ?? ''); ?></textarea>
        </div>
        
        <div>
            <label for="prazo">Prazo:</label>
            <input type="date" id="prazo" name="prazo" value="<?php echo htmlspecialchars($tarefa['prazo'] ?? ''); ?>">
        </div>

        <div>
            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="a-fazer" <?php if ($tarefa['status'] == 'a-fazer') echo 'selected'; ?>>A Fazer</option>
                <option value="em-andamento" <?php if ($tarefa['status'] == 'em-andamento') echo 'selected'; ?>>Em Andamento</option>
                <option value="finalizada" <?php if ($tarefa['status'] == 'finalizada') echo 'selected'; ?>>Finalizada</option>
            </select>
        </div>
        
        <a href="Principal.php">Voltar</a>
        <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html>