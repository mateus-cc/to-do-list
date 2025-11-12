<?php

include 'conecta.php';

$nome = $_POST['nome'];
$usuario_id = $_POST['usuario_id'];

// Verifica se já existe uma lista com o mesmo nome para o mesmo usuário
$sql_verifica = "SELECT id FROM listas WHERE nome = '$nome' AND usuario_id = $usuario_id";
$resultado = $conn->query($sql_verifica);

if ($resultado && $resultado->num_rows > 0) {
    echo "<script>
        alert('Já existe uma lista com esse nome!');
        window.location.href = '../inicial.php';
    </script>";
} else {
    // Insere nova lista
    $sql_inserir = "INSERT INTO listas (nome, usuario_id) VALUES ('$nome', $usuario_id)";
    if ($conn->query($sql_inserir) === TRUE) {
        echo "<script>
            alert('Lista adicionada com sucesso!');
            window.location.href = '../inicial.php';
        </script>";
    } else {
        echo "<script>
            alert('Erro ao adicionar lista: " . $conn->error . "');
            window.location.href = '../inicial.php';
        </script>";
    }
}

$conn->close();
?>