
<html>
<head>
<title> Universo Binário </title>

<script>
        // Função que redireciona para a página sistemas.form.php
        function voltar() {
            setTimeout("window.location='sistemas.form.php'", 2000);
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
@$planetas = $_POST["planetas"];
@$constelacao = $_POST["constelacao"];
@$massa = $_POST["massa"];


// Usando o PDO para preparar uma instrução SQL responsável pela inclusão de sistemas 

 $incluirSistemas = $pdo -> prepare("INSERT INTO sistemas (nome, planetas, massa, constelacao) VALUES (?, ?, ?, ?)");
 $incluirSistemas -> bindValue (1, $nome);
 $incluirSistemas -> bindValue (2, $planetas);
 $incluirSistemas -> bindValue (3, $massa);
 $incluirSistemas-> bindValue (4, $constelacao);

 // Verificando se o sistema foi incluído

 if($incluirSistemas -> execute() > 0 ) {
     echo"<p class='msg-incluir-ok'> Yeah ! Consegui cadastrar o seu sistema =)  </p>";
     echo"<script>voltar()</script>";
 }else {
     echo "<p class='msg-incluir-ok'> Ops ! Algo deu errado =( </p>";
     echo"<script>voltar()</script>";
 }
 
 
?>
</body>
</html>