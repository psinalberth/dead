<?php

	include_once '../model/perfil.php'; 

 function insereTurma($conecta,$ano, $semestre, $curso)
{
	$sql = "insert into turma (ANO_INICIO, SEMESTRE,CURSO_ID) values ({$ano},{$semestre},{$curso})";
		sql_config($conecta);
		return mysqli_query($conecta, $sql);

}

function alteraTurma($conecta, $ano, $semestre, $curso, $id) {
	$sql = "update turma set ANO_INICIO = '{$ano}', SEMESTRE = '{$semestre}', 
	CURSO_ID = '{$curso}' WHERE ID_TURMA = '{$id}'";
		sql_config($conecta);
		return mysqli_query($conecta, $sql);	
}

function buscarTurma($conecta, $id) {
	$sql = "select t.*, c.NOME as CURSO from turma t, curso c 
	where c.ID_CURSO = t.CURSO_ID and t.ID_TURMA = '{$id}'";
	sql_config($conecta);
	$resultado = mysqli_query($conecta, $sql);
	return mysqli_fetch_assoc($resultado);
}

function buscarTurmaCurso($conecta, $curso) {
	$Turmas = array();
	$sql = "select t.*, c.NOME as CURSO from turma t, curso c where 
	c.ID_CURSO = t.CURSO_ID and t.CURSO_ID = '{$curso}' order by t.ANO_INICIO, t.SEMESTRE";
	sql_config($conecta);
	$resultado = mysqli_query($conecta, $sql);
	while($Turma= mysqli_fetch_assoc($resultado)) {
		array_push($Turmas, $Turma);
	}
	return $Turmas;	
}

function ListaTurmas($conecta){

	$Turmas = array();
	$sql = "select t.*, c.NOME as CURSO from turma t, curso c where c.ID_CURSO = t.CURSO_ID order by t.ANO_INICIO, t.SEMESTRE";
	sql_config($conecta);
	$resultado = mysqli_query($conecta, $sql);
	while($Turma= mysqli_fetch_assoc($resultado)) {
		array_push($Turmas, $Turma);
	}
	return $Turmas;
}

function removeTurma($conecta,$id)
{
	$query = "delete from turma where ID_TURMA = {$id}";
	return mysqli_query($conecta, $query);
}

function buscarTurmaAno($conecta,$ANO){
	
	$query = "select *from turma where ANO_INICIO = {$ANO}";
	sql_config($conecta);
	$result = mysqli_query($conecta,$query);
	return mysqli_fetch_assoc($result);
}


