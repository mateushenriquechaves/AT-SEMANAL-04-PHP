
<html>
<head>
<title> Universo Binário </title>

<script>
        // Função que redireciona para a página sistemas.form.php
        function voltar() {

            setTimeout("window.location='planetas.form.php'", 2000);

        }
</script>
<style>
 .msg-incluir-ok {

    margin-top: 15%;
    font-family: 'Nunito', sans-serif;
    font-size: 30px;
    text-align: center;

 }
</style>
</head>


<body>
<?php

require("connect.php");
$pdo = conectar();

// Pegando as informações do formulário

@$nome = $_POST["nome"];
@$tipo = $_POST["tipo"];
@$tamanho = $_POST["tamanho"];
@$descricao = $_POST["descricao"];

// Usando o PDO para preparar uma instrução SQL responsável pela inclusão de planetas 

 $incluirPlanetas = $pdo -> prepare("INSERT INTO planetas (nome, tipo, tamanho, descricao) VALUES (?, ?, ?, ?)");
 $incluirPlanetas -> bindValue (1, $nome);
 $incluirPlanetas -> bindValue (2, $tipo);
 $incluirPlanetas -> bindValue (3, $tamanho);
 $incluirPlanetas -> bindValue (4, $descricao);
 if($incluirPlanetas -> execute() > 0 ) {
     echo"<p class='msg-incluir-ok'> Yeah ! Consegui cadastrar seu planeta =) </p>";
     echo"<script>voltar()</script>";
 }else {
     
     echo "<p class='msg-incluir-ok'> Ops ! Algo deu errado =( </p>";
     echo"<script>voltar()</script>";
 }
 
 
?>
</body>
</html>