<?php

include_once '../model/perfil.php'; 

 function inserePrograma($conecta,$nome,$descricao)
{
	$sql = "insert into programa (NOME,DESCRICAO) values ('{$nome}','{$descricao}')";
	sql_config($conecta);
		return mysqli_query($conecta, $sql);

}

function alteraPrograma($conecta, $nome, $descricao, $id) {
	$sql = "update programa set NOME = '$nome', DESCRICAO = '$descricao' where ID_PROGRAMA = '$id'";
		sql_config($conecta);
		return mysqli_query($conecta, $sql);	
}

function ListaProgramas($conecta){

	$programas = array();
	sql_config($conecta);
	$resultado = mysqli_query($conecta, "select *from programa");
	while($programa= mysqli_fetch_assoc($resultado)) {
		array_push($programas, $programa);
	}
	return $programas;
}

function removePrograma($conecta,$id)
{
	$query = "delete from programa where ID_PROGRAMA = {$id}";
	return mysqli_query($conecta, $query);
}


function buscarPrograma($conecta,$id){
	
	$query = "select *from programa where ID_PROGRAMA = {$id}";
	sql_config($conecta);
	$result = mysqli_query($conecta,$query);
	return mysqli_fetch_assoc($result);
}


