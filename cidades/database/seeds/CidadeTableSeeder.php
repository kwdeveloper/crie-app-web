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

class CidadeTableSeeder extends Seeder {
	/* */
	public function run()
	{
		DB::table('cidades')->delete();
		$this->insert_dados_cidades_into_db();
	}

	/* */
	private function insert_dados_cidades_into_db() {
		try {
			$fname = "db_laravel";
			$user = "wilson";
			$db = new PDO("mysql:host=localhost; dbname=" . $fname, $user, $user);
			echo "Abriu BD " . $fname . "<br /><br />";

			$this->insert_data_mysql($db);
		}
		catch(PDOException $e) {
			echo "ERRO: " . $e->getMessage();
		}
	}

	/* */
	private function insert_data_mysql($db) {
		$tbl = $db->query("select sigla, nome from estados");
		$db->query("SET CHARACTER SET utf8");
		$db->query("SET NAMES utf8");
		$tbl->setFetchMode(PDO::FETCH_OBJ);

		while($row = $tbl->fetch()) {
      // MySQL
			$arr_estados[mb_strtoupper(iconv("ISO-8859-1", "UTF-8", $row->nome), "UTF-8")] = $row->sigla;

      // PostgreSQL
      // $arr_estados[mb_strtoupper($row->nome, "UTF-8")] = $row->sigla;
		}

		var_dump($arr_estados);

		$xml = new XMLReader;
		$xml->open('database/seeds/BR Localidades 2010 v1.kml');

		// Salta as informações de cabeçalho, para o primeiro "registro" de dados ("Placemark")
		while ($xml->read() && $xml->name !== "Placemark");

		$contador = 0;
		$insert_ok = 0;
		$insert_erro = 0;
		$sql = $db->prepare("insert into cidades(codigo, nome, sigla_estado, longitude, latitude, altitude) values(?, ?, ?, ?, ?, ?)");

		// Loop para varrer todas as ocorrências de "Placemark"
		while ($xml->name === "Placemark") {
			$node = new SimpleXMLElement($xml->readOuterXML());
			$cidade = new SimpleXMLElement($node->asXML());

			$nome = strval($cidade->name);
			// $nome = str_replace("'", "''", $nome);

			$sdata = $cidade->ExtendedData->SchemaData->SimpleData;
			$codigo = intval($sdata[9]);
			$sigla_estado = $arr_estados[strval($sdata[13])];
			$longitude = floatval($sdata[18]);
			$latitude = floatval($sdata[19]);
			$altitude = floatval($sdata[20]);

			$res = $sql->execute(array($codigo, $nome, $sigla_estado, $longitude, $latitude, $altitude));

			if($res) {
				$insert_ok++;
			}
			else {
				$insert_erro++;
				echo $nome . " " . $codigo . " " . $sigla_estado . " " . $longitude . " " . $latitude . " " . $altitude . "<br>";
			}

			// Salta para próximo registro
			$xml->next("Placemark");
		}

		echo "Incluiu $insert_ok registros com sucesso<br>";
		echo "Falha na inclusão de $insert_erro registros<br>";
	}
}