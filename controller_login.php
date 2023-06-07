<?php
session_start();
$user = $_POST['user'];
$password = $_POST['password'];

require 'database.php';

$pdo = Database::connect();
$sql = "SELECT id_usuario, usuario, contrasenia FROM usuario_admin WHERE usuario = :user";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user', $user);
$stmt->execute();
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);

if ($userRow && password_verify($password, $userRow['contrasenia'])) {
    $_SESSION['USER'] = $user;
    header('Location: /proyecto9/index1.php'); // Redirige al archivo index.php en el mismo directorio
    exit();
} else {
    $_SESSION['ERROR_MSG'] = "Usuario o contraseña inválidos";
    header('Location: /proyecto9/index.php'); // Redirige al archivo index.php en el mismo directorio
    exit();
}
?>