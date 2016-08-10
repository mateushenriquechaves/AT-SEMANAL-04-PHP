
<html>
<head>
<title> Universo Binário </title>

<script>
        // Função que redireciona para a página sistemas.form.php
        function voltar() {

            setTimeout("window.location='estrelas.form.php'", 2000);

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
@$classificacao = $_POST["classificacao"];
@$diametro = $_POST["diametro"];

// Usando o PDO para preparar uma instrução SQL responsável pela inclusão de estrelas 

 $incluirEstrelas = $pdo -> prepare("INSERT INTO estrelas (nome, classificacao, diametro) VALUES (?, ?, ?)");
 $incluirEstrelas -> bindValue (1, $nome);
 $incluirEstrelas -> bindValue (2, $classificacao);
 $incluirEstrelas -> bindValue (3, $diametro);
 if($incluirEstrelas -> execute() > 0 ) {
    echo"<p class='msg-incluir-ok'> Yeah ! Consegui cadastrar sua estrela =) </p>";
    echo"<script>voltar()</script>";
 }else {
     echo "<p class='msg-incluir-ok'> Ops ! Algo deu errado =( </p>";
     echo"<script>voltar()</script>";
 }
 
 
?>
</body>
</html>