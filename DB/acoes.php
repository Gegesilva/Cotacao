<?php
/* header('Content-type: text/html; charset=ISO-8895-1');

$estado = $_POST['estado'];
$local = $_POST['local'];
$email = $_POST['email'];
$contpb = $_POST['contador'];
$serie = $_POST['serie'];
$whatsapp = $_POST['whatsapp']; */


function gravaOS($conn,$estado, $local, $email, $contpb, $serie, $whatsapp)
{
    /* global $estado, $local, $email, $contpb, $serie, $whatsapp; */

    $sql = "INSERT INTO ( 
        TB02112_ESTADO,
        TB02112_LOCAL,
        TB02112_EMAIL,
        TB02115_CONTPB,
        TB02112_NUMSERIE,
        TB02112_FONEAUX)
        VALUES(
           $estado,
           $local, 
           $email, 
           $contpb, 
           $serie, 
           $whatsapp
        )";

    $stmt = sqlsrv_query($conn, $sql);

}