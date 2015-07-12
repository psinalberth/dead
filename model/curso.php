<?php

include_once '../model/programa.php';
include_once '../model/perfil.php'; 

 function insereCurso($conecta,$nome,$codigo,$descricao,$programa)
{
	$sql = "insert into curso(NOME, CODIGO, DESCRICAO, PROGRAMA_ID) VALUES ('{$nome}', '{$codigo}','{$descricao}',{$programa})";
		sql_config($conecta);
		return mysqli_query($conecta, $sql);

}

function alteraCurso($conecta, $nome, $codigo, $descricao, $programa, $id) {
	$sql = "update curso set NOME = '$nome', CODIGO = '$codigo', DESCRICAO = '$descricao', PROGRAMA_ID = '$programa' 
			WHERE ID_CURSO = '$id'";
	sql_config($conecta);
	return mysqli_query($conecta, $sql);	
}

function ListaCursos($conecta){

	$Cursos = array();
	sql_config($conecta);
	$resultado = mysqli_query($conecta, "select c.*,  
		p.NOME as PROGRAMA from curso c, programa p WHERE p.ID_PROGRAMA = c.PROGRAMA_ID");
	while($Curso= mysqli_fetch_assoc($resultado)) {
		array_push($Cursos, $Curso);
	}
	return $Cursos;
}

function ListaCursosPrograma($conecta,$programa){

	$Cursos = array();
	sql_config($conecta);
	$resultado = mysqli_query($conecta, "select *from curso where PROGRAMA_ID = {$programa}");
	while($Curso= mysqli_fetch_assoc($resultado)) {
		array_push($Cursos, $Curso);
	}
	return $Cursos;
}
function RemoveCurso($conecta,$id)
{
	$query = "delete from curso where ID_CURSO = {$id}";
	return mysqli_query($conecta, $query);
}


function buscarCurso($conecta,$id){
	
	$query = "select * from curso where ID_CURSO = '{$id}'";
	sql_config($conecta);
	$resultado = mysqli_query($conecta, "select c.*,  
		p.NOME as PROGRAMA from curso c, programa p WHERE p.ID_PROGRAMA = c.PROGRAMA_ID AND ID_CURSO = {$id}");
	return mysqli_fetch_assoc($resultado);
}


