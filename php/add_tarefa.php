<?php
include 'conecta.php';

$nome = $_POST['nome_tarefa'];
$descricao = $_POST['descricao_tarefa'];
$data = $_POST['data_tarefa'];
$lista_id = $_POST['lista_id'];
$usuario_id = 1;

$sql = "INSERT INTO tarefas (nome, descricao, data, lista_id, usuario_id) 
        VALUES ('$nome', '$descricao', '$data', $lista_id, $usuario_id)";

if ($conn->query($sql) === TRUE) {
    echo "<script>
        alert('Tarefa adicionada com sucesso!');
        window.location.href = '../inicial.php';
    </script>";
} else {
    echo "<script>
        alert('Erro ao adicionar tarefa: " . $conn->error . "');
        window.location.href = '../inicial.php';
    </script>";
}

$conn->close();
?>