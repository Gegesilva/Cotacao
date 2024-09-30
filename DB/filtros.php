<?php
function filtroEstado($conn)
{
    $sql = "SELECT DISTINCT TB00043_ESTADO Estado FROM TB00043";

    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }


    $opcao = "";

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $opcao .= "<div data-value='$row[Estado]'>$row[Estado]</div>";

    }
    return print ($opcao);
}

function filtroCondicao($conn)
{
    $sql = "SELECT TB01014_NOME CondRec, TB01014_CODIGO Cod FROM TB01014 WHERE TB01014_SITUACAO = 'A'";

    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }


    $opcao = "";

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $opcao .= "<option name='CondRec' value='$row[Cod]'>$row[CondRec]</option>";

    }

    $opcao .= "<option disabled selected>CondRec</option>
                    </select>";
    return print ($opcao);
}