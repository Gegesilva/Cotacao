<?php
header('Content-type: text/html; charset=ISO-8895-1');
include_once "../DB/conexaoSQL.php";
include_once "../DB/filtros.php";
include_once "../Config.php";

$serie = $_GET['serie'];

/* Pega o codigo do prod */
$sql = "SELECT TOP 1 TB02054_PRODUTO Prod FROM TB02054
        WHERE TB02054_NUMSERIE = '$serie'";

$stmt = sqlsrv_query($conn, $sql);

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $Prod = $row['Prod'];
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATABIT</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/styleBtn.css">
</head>

<body>
    <!--  <form method="POST" class="form-geral" action="<?= $url ?>/save.php"> -->
    <div class="div-save" id="div-save"></div>
    <div class="div-form">
        <div class="form-geral">
            <img src="../img/logo.jpg" alt="logo">
            <div class="btn-solic-btn">
            </div>
            <h1 class="titulos"></h1>
            <div class="buttons-forms">
                <button class="btn-req" id="btn-req" onClick="window.location='index.php?serie=<?= $serie; ?>';" type="submit"
                    class="voltar-btn-form">Maquinas</button>
                <button class="btn-req" id="btn-req-sup" style="color: black; opacity: 0.4;"
                    onClick="window.location='index2.php';" type="submit" class="voltar-btn-form">SUPRIMENTOS</button>
            </div>
            <form method="POST" action="result2.php">
                <h6 class="msg-os"></h6>
                <div class="form-group">
                    <div class="form-input">
                        <label for="produto">Produto</label>
                        <input type="text" class="produto" name="produto" value="<?= $Prod; ?>"
                            placeholder="<?= $Prod; ?>" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-input">
                        <label for="tipo">Tipo *</label>
                        <select name="tipo" id="" required>
                            <option value="01">Suprimento</option>
                            <option value="00">Equipamento</option>
                        </select>
                    </div>
                    <div class="form-input">
                        <label for="estado">Estado*</label>
                        <div class="custom-select">
                            <input type="text" name="estado" class="estado" id="selectEstado"
                                placeholder="Digite para filtrar" onkeyup="filterEstado()">
                            <div id="selectEstadoLista" class="select-items">
                                <?php filtroEstado($conn); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-input">
                        <label for="pessoa">Tipo Pessoa *</label>
                        <select name="pessoa" id="">
                            <option value="F">Fisica</option>
                            <option value="J">Juridica</option>
                        </select>
                    </div>
                    <div class="form-input">
                        <label for="consumo">CONS/REV *</label>
                        <select name="consumo" id="">
                            <option value="S">Consumo</option>
                            <option value="N">Revenda</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-input">
                        <label for="condicao">Condição de Receb *</label>
                        <div class="custom-select">
                            <input type="text" name="condicao" class="condicao" id="selectCondicao"
                                placeholder="Digite para filtrar" onkeyup="filterCondicao()">
                            <div id="selectCondicaoLista" class="select-items">
                                <?php filtroCondicao($conn); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-index">
                    <input type="hidden" name="trava" id="trava" value="1">
                    <button type="submit" class="submit-btn">Gerar</button>
                    <!--  <button onClick="window.location='.php';" type="submit"
                    class="voltar-btn-form">Voltar</button> -->
                </div>
                <input type="hidden" id="urlOS" value="<?= $url ?>/save.php">
            </form>
            <?php
            /* gera um codigo de 6 numeros pseudo aleatorio */

            //echo 'A'.sprintf("%'.05d\n",  mt_rand(0, 0xF00));
            ?>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="../JS/script.js" charset="utf-8"></script>
</body>

</html>