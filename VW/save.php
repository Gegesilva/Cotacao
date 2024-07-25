<?php
header('Content-type: text/html; charset=ISO-8895-1');
include_once "../DB/conexaoSQL.php";
include_once "../DB/acoes.php";

$estado = $_POST['estado'];
$local = $_POST['local'];
$email = $_POST['email'];
$contpb = $_POST['contador'];
$serie = $_POST['serie'];
$whatsapp = $_POST['whatsapp'];

if (isset($serie)) {
    gravaOS($conn, $estado, $local, $email, $contpb, $serie, $whatsapp, $solicitante, $defeito);

}else{
    return;
}


?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATABIT</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
    <form class="form-geral" id="form-geral">
        <img src="../img/logo.jpg" alt="logo">
        <h1>OS ABERTA!</h1>
        <button type="submit" class="submit-btn">VOLTAR</button>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../JS/script.js" charset="utf-8"></script>
</body>

</html>