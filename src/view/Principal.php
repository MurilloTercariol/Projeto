<?php

include_once("../config/protection.php");
include_once("../config/connection.php");
include_once("../controller/ExibirController.php"); // Este arquivo deve preparar $tarefasPorStatus

// NENHUM FOREACH AQUI ANTES DO HTML!
// O foreach DEVE estar DENTRO do <body> ou onde você quer exibir os itens.

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Agenda</title>
</head>
<body>
    <a href="../view/Inserir.php">Nova Tarefa</a>
    <a href="../config/logout.php">Sair</a>


    <div class="tarefas-a-fazer">
        <h2>Tarefas A Fazer</h2>
        <?php if (!empty($tarefasPorStatus['a-fazer'])): ?>
            
                <table class="tabela-a-fazer">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Título</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Prazo</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tarefasPorStatus['a-fazer'] as $tarefa): ?>
                            <tr>
                                <td scope="row"><?php echo ($tarefa['id']); ?></td>
                                <td scope="row"><?php echo ($tarefa['titulo']); ?></td>
                                <td scope="row"><?php echo ($tarefa['descricao']); ?></td>
                                <td scope="row"><?php echo ($tarefa['prazo']); ?></td>
                                <td scope="row"><?php echo ($tarefa['status']); ?></td>
                                <td class="actions">
                                    <a href="Editar.php?id=<?php echo $tarefa['id']; ?>">Editar <i class="icone-editar"></i></a>
                                    <a href="../controller/InativarTarefaController.php?id=<?php echo $tarefa['id']; ?>">Excluir</a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
                
                
                
        <?php else: ?>
            <p>Nenhuma tarefa "A Fazer" para exibir.</p>
        <?php endif; ?>
    </div>
    <br>
    <br>

    <div class="tarefas-em-andamento">
        <h2>Tarefas Em Andamento</h2>
        <?php if (!empty($tarefasPorStatus['em-andamento'])): ?>
            
                <table class="tabela-em-andamento">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Título</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Prazo</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tarefasPorStatus['em-andamento'] as $tarefa): ?>
                            <tr>
                                <td scope="row"><?php echo ($tarefa['id']); ?></td>
                                <td scope="row"><?php echo ($tarefa['titulo']); ?></td>
                                <td scope="row"><?php echo ($tarefa['descricao']); ?></td>
                                <td scope="row"><?php echo ($tarefa['prazo']); ?></td>
                                <td scope="row"><?php echo ($tarefa['status']); ?></td>
                                <td class="actions">
                                    <a href="Editar.php?id=<?php echo $tarefa['id']; ?>">Editar <i class="icone-editar"></i></a>
                                    <a href="../controller/InativarTarefaController.php?id=<?php echo $tarefa['id']; ?>">Excluir</a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
                
                
                
        <?php else: ?>
            <p>Nenhuma tarefa "Em andamento" para exibir.</p>
        <?php endif; ?>
    </div>
    <br>
    <br>

    <div class="tarefas-finalizado">
        <h2>Tarefas Finalizadas</h2>
        <?php if (!empty($tarefasPorStatus['finalizada'])): ?>
            
                <table class="tabela-finalizado">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Título</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Prazo</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tarefasPorStatus['finalizada'] as $tarefa): ?>
                            <tr>
                                <td scope="row"><?php echo ($tarefa['id']); ?></td>
                                <td scope="row"><?php echo ($tarefa['titulo']); ?></td>
                                <td scope="row"><?php echo ($tarefa['descricao']); ?></td>
                                <td scope="row"><?php echo ($tarefa['prazo']); ?></td>
                                <td scope="row"><?php echo ($tarefa['status']); ?></td>
                                <td class="actions">
                                    <a href="Editar.php?id=<?php echo $tarefa['id']; ?>">Editar <i class="icone-editar"></i></a>
                                    <a href="../controller/InativarTarefaController.php?id=<?php echo $tarefa['id']; ?>">Excluir</a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
                
                
                
        <?php else: ?>
            <p>Nenhuma tarefa "Finalizada" para exibir.</p>
        <?php endif; ?>
    </div>

    </body>
</html>