<?php 

 function inserePerfil($conecta,$nome,$descricao)
{
	$sql = "insert into perfil (NOME,DESCRICAO) values ('{$nome}','{$descricao}')";
		return mysqli_query($conecta, $sql);

}

function ListaPerfils($conecta){

	$Perfils = array();
	$resultado = mysqli_query($conecta, "select *from perfil");
	while($Perfil= mysqli_fetch_assoc($resultado)) {
		array_push($Perfils, $Perfil);
	}
	return $Perfils;
}

function RemovePerfil($conecta,$id)
{
	$query = "delete from perfil where ID_Perfil = {$id}";
	return mysqli_query($conecta, $query);
}


function buscarPerfil($conecta,$id){
	
	$query = "select *from perfil where ID_Perfil = {$id}";
	$result = mysqli_query($conecta,$query);
	return mysqli_fetch_assoc($result);
}



