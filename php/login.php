<?php
include 'conecta.php'; 


$email = $_POST['email'];
$senha = $_POST['senha'];


$sql = "SELECT * FROM usuarios WHERE Email = '$email' AND Senha = '$senha'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    header ("Location: ../inicial.html");
} else {
    echo "<script>alert('E-mail ou senha incorretos.');</script>";
    header("Refresh: 1; URL=../index.html");
}
?>
