<?php
function gravaOS($conn, $estado, $local, $email, $contpb, $serie, $whatsapp, $solicitante, $defeito)
{
    global $statusInicial, $salto;

    $sql = "INSERT INTO TB02115( 
		TB02115_CODIGO,
        TB02115_DTCAD,
        TB02115_ESTADO,
        TB02115_LOCAL,
        TB02115_EMAIL,
        TB02115_CONTPB,
        TB02115_NUMSERIE,
        TB02115_FONE,
		TB02115_SOLICITANTE,
		TB02115_OBS,
        TB02115_STATUS,
        TB02115_OPCAD,
		TB02115_CONTRATO,
        TB02115_CODEMP,
		TB02115_CODCLI,
		TB02115_TIPOINTERV,
		TB02115_PRODUTO,
		TB02115_CODTEC,
		TB02115_ATENDENTE,
		TB02115_PREVENTIVA,
		TB02115_DATA,
		TB02115_SITUACAO,
		TB02115_CEP,
		TB02115_END,
		TB02115_CIDADE,
        TB02115_BAIRRO,
		TB02115_NUM,
		TB02115_COMP)
        (
		SELECT 
            (SELECT TOP 1 
				FORMAT((TB02115_CODIGO + $salto), '000000')
			FROM TB02115 
			WHERE NOT EXISTS (SELECT * FROM TB00002 WHERE TB00002_COD = (TB02115_CODIGO + $salto) 
            AND TB00002_TABELA = 'TB02115'
            AND TB02115_CODIGO != (TB02115_CODIGO + $salto)) 
			ORDER BY TB02115_DTCAD DESC),
           GETDATE(),
           '$estado',
           '$local', 
           '$email', 
           '$contpb', 
           '$serie', 
           '$whatsapp',
           '$solicitante',
           '$defeito',
           '$statusInicial',
           'APP ABERTURA_OS',
		   TB02112_CODIGO,
		   TB02111_CODEMP,
		   TB02111_CODCLI,
		   'I',
		   TB02112_PRODUTO,
		   '0000',
		   '$solicitante',
		   'N',
		   GETDATE(),
		   'A',
		   TB02112_CEP,
		   TB02112_END,
		   TB02112_CIDADE,
           TB02112_BAIRRO,
		   TB02112_NUM,
		   TB02112_COMP
        FROM TB02112
        LEFT JOIN TB02111 ON TB02111_CODIGO = TB02112_CODIGO
        WHERE TB02112_NUMSERIE = '$serie'
                )
        ";

    $stmt = sqlsrv_query($conn, $sql);

}

function gravaHistorico($conn, $numOS ,$serie, $defeito, $statusInicial){
    $sql="UPDATE TB00002
    SET TB00002_COD = '$numOS'
    WHERE TB00002_TABELA = 'TB02115'
    
    
    
    INSERT INTO TB02130
            (TB02130_CODIGO,
            TB02130_DATA, 
            TB02130_USER,
            TB02130_STATUS,
            TB02130_NOME,
            TB02130_OBS,
            TB02130_CODTEC,
            TB02130_PREVISAO,
            TB02130_NOMETEC,
            TB02130_TIPO, 
            TB02130_CODCAD,
            TB02130_CODEMP,
            TB02130_DATAEXEC,
            TB02130_HORASCOM,
            TB02130_HORASFIM)
         SELECT TOP 1
            '$numOS',
            GETDATE(),
            'APP ABERTURA_OS', 
            '$statusInicial', 
            TB01073_NOME, 
            '$defeito',
            TB02115_CODTEC,
            NULL,
            TB01024_NOME, 
            'O',
            TB02115_CODCLI,
            TB02115_CODEMP,
            GETDATE(), 
            '00:00', 
            '00:00'
        FROM TB02115
        LEFT JOIN TB01073 ON TB01073_CODIGO = TB02115_STATUS
        LEFT JOIN TB01024 ON TB01024_CODIGO = TB02115_CODTEC
        WHERE TB02115_NUMSERIE = '$serie'
        ORDER BY TB02115_DTCAD DESC";

    $stmt = sqlsrv_query($conn, $sql);
}