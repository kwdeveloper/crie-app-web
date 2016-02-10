<?php

/*
 * NOTA
 *
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos
 * web com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e
 * Laravel"
 * Wilson Kawano
 *
 * O código-fonte pode ser livremente usado desde que o conteúdo da presente
 * NOTA não seja suprimido
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class EstadoTableSeeder extends Seeder {
	/* */
	public function run()
	{
		DB::table('estados')->delete();

		$db = new PDO("mysql:host=localhost;dbname=db_laravel", "wilson", "wilson");
		$db->query("SET CHARACTER SET utf8");
		$db->query("SET NAMES utf8");
		$sql = $db->prepare("INSERT INTO ESTADOS(SIGLA, NOME) VALUES(?,?)");
		$this->incluir_dados_tabela("database/seeds/ibge_estados_nome.csv", "|", '"', $sql, array(0, 1), array("",""));
	}

	/* */
	private function incluir_dados_tabela($fname, $delimitador, $cerca, $sql, $ind_colunas, $colunas)
	{
		// Abrir arquivo para leitura
		$fp = fopen($fname, 'r');

		if (!$fp) {
			echo "Erro ao abrir arquivo $fname<br />";
			return;
		}

		echo "Abriu $fname<br />";
		$incluiu = 0;
		$erro = 0;

		// Ler cabecalho do arquivo
		$cabecalho = fgetcsv($fp, 0, $delimitador, $cerca);

		// Varre o arquivo CSV
		while (!feof($fp)) {
			// Ler uma linha do arquivo
			$linha = fgetcsv($fp, 0, $delimitador, $cerca);
			if (!$linha) {
				continue;
			}

			for ($i = 0; $i < count($linha); $i++) {
				for ($j = 0; $j < count($ind_colunas); $j++) {
					if ($i == $ind_colunas[$j]) {
						$colunas[$i] = utf8_encode($linha[$i]);
						break;
					}
				}
			}

			if ($sql->execute($colunas))
				$incluiu++;
			else
				$erro++;
		}

		fclose($fp);
		echo "Incluiu $incluiu registros com sucesso e $erro falhas</br>";
	}
}