<?php
function gravaOS($conn, $estado, $local, $email, $contpb, $serie, $whatsapp, $solicitante, $defeito)
{
    global $statusInicial;

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
				FORMAT((TB02115_CODIGO + 2), '000000')
			FROM TB02115 
			WHERE NOT EXISTS (SELECT * FROM TB00002 WHERE TB00002_COD = (TB02115_CODIGO + 2) AND TB00002_TABELA = 'TB02115') 
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


        
        UPDATE TB00002
            SET TB00002_COD = (SELECT TOP 1 
                    TB02115_CODIGO
            FROM TB02115 
            WHERE NOT EXISTS (SELECT * FROM TB00002 WHERE TB00002_COD = TB02115_CODIGO AND TB00002_TABELA = 'TB02115') 
            ORDER BY TB02115_DTCAD DESC)
        WHERE TB00002_TABELA = 'TB02115'
        ";

    $stmt = sqlsrv_query($conn, $sql);

}

function gravaHistorico(){
    
}