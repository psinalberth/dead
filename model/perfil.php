<?php 

 function inserePerfil($conecta,$nome,$descricao)
{
	$sql = "insert into perfil (NOME,DESCRICAO) values ('{$nome}','{$descricao}')";
		sql_config($conecta);
		return mysqli_query($conecta, $sql);

}

function ListaPerfis($conecta){

	$Perfils = array();
	sql_config($conecta);
	$resultado = mysqli_query($conecta, "select *from perfil");
	while($Perfil= mysqli_fetch_assoc($resultado)) {
		array_push($Perfils, $Perfil);
	}
	return $Perfils;
}

function alterarPerfil($conecta,$id,$nome,$descricao){
	
	$query = "update perfil set DESCRICAO='{$descricao}', NOME='{$nome}' where ID_PERFIL = {$id}";
	sql_config($conecta);
	return mysqli_query($conecta,$query);
}

function RemovePerfil($conecta,$id)
{
	$query = "delete from perfil where ID_PERFIL = {$id}";
	sql_config($conecta);
	return mysqli_query($conecta, $query);
}


function buscarPerfil($conecta,$id){
	
	$query = "select *from perfil where ID_PERFIL = {$id}";
	sql_config($conecta);
	$result = mysqli_query($conecta,$query);
	return mysqli_fetch_assoc($result);
}

function sql_config($conecta) {

	mysqli_query($conecta, "SET NAMES 'utf8'");
	mysqli_query($conecta, 'SET character_set_connection=utf8');
	mysqli_query($conecta, 'SET character_set_client=utf8');
	mysqli_query($conecta, 'SET character_set_results=utf8');
}



