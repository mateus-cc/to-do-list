<?php
include 'conecta.php';

    $id = $_POST['id_tarefa'];

    $sql = "DELETE FROM tarefas WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
            alert('Tarefa excluída com sucesso!');
            window.location.href = '../inicial.php';
        </script>";
    } else {
        echo "<script>
            alert('Erro ao excluir tarefa: " . $conn->error . "');
            window.location.href = '../inicial.php';
        </script>";
    }
?>