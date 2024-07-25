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
		TB02115_NOME,
        TB02115_STATUS)
        VALUES(
		   (SELECT TOP 1 TB02115_CODIGO + 2 FROM TB02115 ORDER BY TB02115_DTCAD DESC),
           GETDATE(),
           '$estado',
           '$local', 
           '$email', 
           $contpb, 
           '$serie', 
           '$whatsapp',
           '$solicitante',
           '$defeito',
           '$statusInicial'
        )
        ";

    $stmt = sqlsrv_query($conn, $sql);

}