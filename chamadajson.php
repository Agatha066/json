<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") 
{
	//$estado = "Rio de Janeiro"; 
	$estado = $_GET['estado'];
	
		//fazendo conexao com o banco
		$servidor = "localhost";
		$usuario = "root";
		$senha = "";
		$nomebanco= "3daw";

		$conn = new mysqli($servidor,$usuario,$senha,$nomebanco);
		if (!$conn) 
		{
			echo "ERRO AO CONECTAR BANCO DE DADOS!!";
		}
		
		//SQL
		$sql="SELECT cidades.nome FROM estados INNER JOIN cidades ON (cidades.id_estado = estados.id) where estados.nome='$estado'";
		
		$result = $conn->query($sql);
		$arrCidades = array();
		
		$i=0;
		while($db_field = $result->fetch_assoc())
		{
			$arrCidades[$i]= utf8_decode($db_field["nome"]);
			$i++;
		}
		header('Content-Type: application/json; charset=utf-8 ');
		print json_encode($arrCidades); //criando um json pra ser consumido via javascript
		 
	
}

?>
