<?php
include 'conecta.php';

$nome = $_POST['nome_lista'];

$sql = "DELETE FROM listas WHERE nome = '$nome'";
if ($conn->query($sql) === TRUE) {
    echo "<script>
        alert('Lista excluída com sucesso!');
        window.location.href = '../inicial.php';
    </script>";
} else {
    echo "<script>
        alert('Erro ao excluir lista: " . $conn->error . "');
        window.location.href = '../inicial.php';
    </script>";
}

$conn->close();
?>
