<?php

require_once 'Conexao.php';

$input = $_GET['input'];
$conexao = new Conexao();
$pdo = $conexao->conectar(); 
$query = $pdo->prepare("SELECT prontuario,nome_paciente,data_nascimento FROM entrevistas WHERE nome_paciente LIKE :input");
$query->bindValue(':input', $input);
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);
echo json_encode($result);

?>
