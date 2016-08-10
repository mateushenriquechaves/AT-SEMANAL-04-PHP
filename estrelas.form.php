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
			<header><h2><span>Estrelas<span></h2></header>
			<section>
				<p>Uma estrela é uma grande e luminosa esfera de plasma, mantida íntegra pela gravidade e pela pressão de radiação. Ao fim de sua vida, uma estrela pode conter também uma proporção de matéria degenerada.</p>
				<p>Fonte: <a href="https://pt.wikipedia.org/wiki/Estrela">https://pt.wikipedia.org/wiki/Estrela</a></p>
				
				<form action="incluir.estrelas.php" method="POST">
					<p><strong>Insira um novo planeta no sistema: </strong></p>
					Nome: <input type="text" name="nome" /><br />
					Classificação: 
					<select name="classificacao">
						<option value="O">O</option>
						<option value="B">B</option>
						<option value="A">A</option>
                        <option value="F">F</option>
                        <option value="G">G</option>
                        <option value="K">K</option>
                        <option value="M">M</option>
					</select><br />
					Diâmetro: <input type="text" name="diametro" /><br />
					<input type="submit" value="enviar" />
				</form>
				
				<p><strong>Estrela</strong></p>
                <table>
                <tr>
					<th> Excluir </th>
                    <th> Nome </th>
                    <th> Classificação </th>
                    <th> Diâmetro  </th>
                </tr>
				<?php
                    require("connect.php");
                    $pdo = conectar();

					if(isset($_GET["excluir"])){

							$id = $_GET["excluir"];

							$excluirRegistro = $pdo -> prepare ("DELETE FROM estrelas WHERE id = ?");
							$excluirRegistro -> bindValue (1, $id);
							$excluirRegistro -> execute();
							header("Location: estrelas.form.php");
					}
                    
                    $buscaPlaneta = $pdo -> prepare("SELECT * FROM estrelas");
                    $buscaPlaneta -> execute();
                    while ($linha = $buscaPlaneta ->fetch(PDO::FETCH_ASSOC)) {
                        echo"<tr>";
						echo" <td> <a href='estrelas.form.php?excluir=".$linha["id"]."'>Excluir </a></td>";
                        echo"<td>";
                        echo $linha["nome"];
                        echo"</td>";
                        echo"<td>";
                        echo $linha["classificacao"];
                        echo"</td>";
                        echo"<td>";
                        echo $linha["diametro"];
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