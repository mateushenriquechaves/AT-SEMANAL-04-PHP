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
			<header><h2><span>Planetas<span></h2></header>
			<section>
				<p>Um planeta é um corpo celeste que orbita uma estrela ou um remanescente de estrela, com massa suficiente para se tornar esférico pela sua própria gravidade, mas não ao ponto de causar fusão termonuclear, e que tenha limpo de planetesimais a sua região vizinha (dominância orbital).</p>
				<p>Fonte: <a href="https://pt.wikipedia.org/wiki/Planeta">https://pt.wikipedia.org/wiki/Planeta</a></p>
				
				<form action="incluir.planetas.php" method="POST">
					<p><strong>Insira um novo planeta no sistema: </strong></p>
					Nome: <input type="text" name="nome" /><br />
					Tipo: 
					<select name="tipo">
						<option value="terrestre">Terrestre</option>
						<option value="gasoso">Gigante Gasoso</option>
						<option value="anão">Planeta Anão</option>
					</select><br />
					Diâmetro Equatorial: <input type="text" name="tamanho" /><br />
					Descrição:
					<textarea name="descricao"></textarea>
					<input type="submit" value="enviar" />
				</form>
				
				<p><strong>Planetas</strong></p>
                <table>
                <tr>
					<th> Excluir </th>
                    <th> Nome </th>
                    <th> Tipo </th>
                    <th> Diâmetro Equatorial </th>
                </tr>
				<?php
                    require("connect.php");
                    $pdo = conectar();

						if(isset($_GET["excluir"])){

							$id = $_GET["excluir"];

							$excluirRegistro = $pdo -> prepare ("DELETE FROM planetas WHERE id = ?");
							$excluirRegistro -> bindValue (1, $id);
							$excluirRegistro -> execute();
							header("Location: planetas.form.php");
					
					}

                    
                    $buscaPlaneta = $pdo -> prepare("SELECT * FROM planetas");
                    $buscaPlaneta -> execute();
                    while ($linha = $buscaPlaneta ->fetch(PDO::FETCH_ASSOC)) {
                        echo"<tr>";
						echo" <td> <a href='planetas.form.php?excluir=".$linha["id"]."'>Excluir </a> </td>";
                        echo"<td>";
                        echo $linha["nome"];
                        echo"</td>";
                        echo"<td>";
                        echo $linha["tipo"];
                        echo"</td>";
                        echo"<td>";
                        echo $linha["tamanho"];
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