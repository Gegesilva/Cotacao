<?php
include_once "conexaoSQL.php";

/* Gera o proximo contador */
$sql="SELECT TOP 1
            SUBSTRING(TB00002_COD, 0, 2)+FORMAT(CAST(SUBSTRING(TB00002_COD, 2, 6) AS NUMERIC) + 1, '00000') ultContGer
        FROM TB00002
        WHERE TB00002_TABELA = 'TB02018R'";
$stmt = sqlsrv_query($conn, $sql);

while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
    $ultContGer = $row['ultContGer'];
}


function geraReq($conn, $local, $email, $ultcont, $serie, $whatsapp, $solicitante, $defeito, $tonerPB, $preto, $azul, $amarelo, $magenta, $outro, $periodo)
{
    global $ultContGer;

    /* Verifica se e patrimonio ou serie antes de gravar */
    $sql = "SELECT TOP 1 
                TB02112_NUMSERIE NumSerie
            FROM TB02112
            WHERE TB02112_PAT = '$serie'
            AND TB02112_SITUACAO = 'A'
    ";
    $stmt = sqlsrv_query($conn, $sql);
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $NumSerie = $row['NumSerie'];
    }

    if ($NumSerie != NULL || $NumSerie != '') {
        $serie = $NumSerie;
    } else {

    }

    $sql = "INSERT INTO TB02018(
                TB02018_CODIGO,
                TB02018_DTCAD,
                TB02018_DATAEXEC,
                TB02018_DATA,
                TB02018_CODEMP,
                TB02018_CODCLI,
                TB02018_VEND,
                TB02018_TIPODESC,
                TB02018_CONDPAG,
                TB02018_STATUS,
                TB02018_SITUACAO,
                TB02018_OPERACAO,
                TB02018_NOME, --nome do consumidor final
                TB02018_FONE,
                TB02018_CONTRATO,
                TB02018_EMAIL,
                TB02018_CODSITE,
                TB02018_NUMSERIE,
                TB02018_OBS,
                TB02018_CONTTOTAL)
            (SELECT 
                '$ultContGer',
                GETDATE(),
                GETDATE(),
                GETDATE(),
                TB02111_CODEMP,
                TB02111_CODCLI,
                '0000',
                '00',
                '000',
                '00',
                'A',
                3,
                TB02111_NOME,
                TB02112_FONEAUX,
                TB02111_CODIGO,
                TB02111_EMAIL,
                TB02112_CODSITE,
                '$serie',
                'Melhor periodo para visita: $periodo \nLocal ou setor: $local \nTonerPB: $tonerPB \n\nTONER COLORIDO \nPreto: $preto, \nAzul: $azul, \nAmarelo: $amarelo, \nMagenta: $magenta, \nOutro: $outro',
                '$ultcont'
                 
            FROM TB02112
            LEFT JOIN TB02111 ON TB02111_CODIGO = TB02112_CODIGO
            WHERE TB02112_SITUACAO = 'A'
            AND TB02112_NUMSERIE = '$serie')

            UPDATE 
                TB00002 
            SET 
                TB00002_cod = '$ultContGer'  
            WHERE 
                TB00002_tabela = 'TB02018R'

    ";
    $stmt = sqlsrv_query($conn, $sql);
}