<?php
header('Content-type: text/html; charset=ISO-8895-1');
include_once "DB/conexaoSQL.php";
include_once "DB/dados.php";

$serie = $_GET["serie"];

list($estado, $Cliente, $Local, $UltCont, $Email, $Serie, $Tel) = preenchimento($conn, $serie);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATABIT</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <form>
        <img src="img/logo.jpg" alt="logo">
        <h1>ABERTURA CHAMADO TEC</h1>
        <div class="form-group">
            <div class="form-input">
                <label for="patrimonio">Estado *</label>
                <input type="text" id="patrimonio" name="patrimonio" placeholder="<?= $estado ?>" value="<?= $estado ?>" required readonly>
            </div>
            <div class="form-input">
                <label for="serie">Série *</label>
                <input id="serie" name="serie" rows="4" placeholder="<?= $serie;?>" value="<?= $serie?>" required readonly></input>
            </div>
        </div>
        <div class="form-group">
            <div class="form-input">
                <label for="cliente">Nome do Cliente</label>
                <input type="text" id="cliente" name="cliente" placeholder="<?= $Cliente; ?>" value="<?= $Cliente; ?>" readonly>
            </div>
            <div class="form-input">
                <label for="local">Local*</label>
                <input type="text" id="local" name="local" placeholder="<?= $Local; ?>" value="<?= $Local; ?>" required readonly>
            </div>
        </div>
        <div class="form-group">
            <div class="form-input">
                <label for="abertura">Solicitante *</label>
                <input type="text" id="abertura" name="abertura" placeholder="Quem esta abrindo a OS" required>
            </div>
            <div class="form-input">
                <label for="whatsapp">Whatsapp *</label>
                <input type="text" id="whatsapp" name="whatsapp" placeholder="<?= $Tel?>" required>
            </div>
        </div>
        <div class="form-group">
            <div class="form-input">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="<?= $Email; ?>" required>
            </div>
        </div>
        <div class="form-group">
        <div class="form-input">
                <label for="defeito">Defeito Apresentado *</label>
                <textarea id="defeito" name="defeito" rows="4" required></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="form-input">
                <label for="contador">Último Contador</label>
                <input type="text" id="contador" name="contador" placeholder="<?= $UltCont; ?>" value="<?= $UltCont; ?>" readonly>
            </div>
            <div class="form-input">
                <label for="periodo">Período</label>
                <select id="periodo" name="periodo" required>
                    <option value="Manhã">Manhã</option>
                    <option value="Tarde">Tarde</option>
                    <option value="Indiferente">Indiferente</option>
                </select>
            </div>
        </div>
        <button type="submit" class="submit-btn">Enviar OS</button>
    </form>
</body>

</html>