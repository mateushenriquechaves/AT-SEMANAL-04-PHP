<?php
	include("template.cabecalho.php");
?>


<div id="left">
			<header><h1><span>Universo Digital<span></h1></header>
			<section>
				<nav>
					<a href="planetas.form.php">planetas</a> | 
					<a href="estrelas.form.php">estrelas</a> | 
					<a href="sistemas.form.php">sistemas</a>
				</nav>
				<div class="clear"></div>
			<section>
			<footer><em>Produzido para o EAD Pernambuco.</em></footer>
		</div>


<div id="right">
			<header><h2><span>Sistemas<span></h2></header>
			<section>
				<form action="incluir.sistemas.php" method="POST">
					<p><strong>Insira um novo sistema: </strong></p>
					Nome: <input type="text" name="nome" /><br />
				    Número de Planetas <input type="number" min="1" name="planetas" /><br>
				    Massa <input  name="massa" /><br>
					Constelação: <input type="text" name="constelacao" /> <br><br>
					<input type="submit" value="enviar" />
				</form>
				
				<p><strong>Sistemas</strong></p>
                <table>
                <tr>
				    <th>Excluir  </th>
                    <th> Nome </th>
                    <th> Quant. Planetas </th>
                    <th> Massa  </th>
					<th> Constelação  </th>
                </tr>
				<?php
                    require("connect.php");
                    $pdo = conectar();


					if(isset($_GET["excluir"])){

							$id = $_GET["excluir"];

							$excluirRegistro = $pdo -> prepare ("DELETE FROM sistemas WHERE id = ?");
							$excluirRegistro -> bindValue (1, $id);
							$excluirRegistro -> execute();
							header("Location: sistemas.form.php");
					
					}

                    
                    $buscaPlaneta = $pdo -> prepare("SELECT * FROM sistemas");
                    $buscaPlaneta -> execute();
                    while ($linha = $buscaPlaneta ->fetch(PDO::FETCH_ASSOC)) {
						
					
                        echo"<tr>";
						echo" <td> <a href='sistemas.form.php?excluir=".$linha["id"]."'>Excluir </a> </td>";
                        echo"<td>";
                        echo $linha["nome"];
                        echo"</td>";
                        echo"<td>";
                        echo $linha["planetas"];
                        echo"</td>";
                        echo"<td>";
                        echo $linha["massa"];
                        echo"</td>";
						echo"<td>";
                        echo $linha["constelacao"];
                        echo"</td>";
                    }
                ?>
                </table>
			</section>
			<footer></footer>
		</div>


<?php
	include("template.rodape.php");
?>