<?php
/* header('Content-type: text/html; charset=ISO-8895-1');

$estado = $_POST['estado'];
$local = $_POST['local'];
$email = $_POST['email'];
$contpb = $_POST['contador'];
$serie = $_POST['serie'];
$whatsapp = $_POST['whatsapp']; */


function gravaOS($conn, $estado, $local, $email, $contpb, $serie, $whatsapp, $solicitante, $defeito)
{
    /* global $estado, $local, $email, $contpb, $serie, $whatsapp; */

    $sql = "INSERT INTO TB02115 ( 
        TB02115_DTCAD,
        TB02115_ESTADO,
        TB02115_LOCAL,
        TB02115_EMAIL,
        TB02115_CONTPB,
        TB02115_NUMSERIE,
        TB02115_FONE,
		TB02115_SOLICITANTE,
		TB02115_OBS)
        VALUES(
           GETDATE(),
           $estado,
           $local, 
           $email, 
           $contpb, 
           $serie, 
           $whatsapp,
           $solicitante,
           $defeito
        )";

    $stmt = sqlsrv_query($conn, $sql);

}