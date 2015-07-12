<?php 

 function insereCurso($conecta,$nome,$descricao,$programa)
{
	$sql = "insert into curso(NOME, DESCRICAO, PROGRAMA_ID) VALUES ('{$nome}','{$descricao}',{$programa})";
		return mysqli_query($conecta, $sql);

}

function alteraCurso($conecta, $nome, $descricao, $programa, $id) {
	$sql = "update curso set NOME = '$nome', DESCRICAO = '$descricao', PROGRAMA_ID = '$programa' 
			WHERE ID_CURSO = '$id'";
	return mysqli_query($conecta, $sql);	
}

function ListaCursos($conecta){

	$Cursos = array();
	mysqli_query($conecta, "SET NAMES 'utf8'");
	mysqli_query($conecta, 'SET character_set_connection=utf8');
	mysqli_query($conecta, 'SET character_set_client=utf8');
	mysqli_query($conecta, 'SET character_set_results=utf8');
	$resultado = mysqli_query($conecta, "select c.ID_CURSO, c.NOME, c.DESCRICAO, c.PROGRAMA_ID,  
		p.NOME as PROGRAMA from curso c, programa p WHERE p.ID_PROGRAMA = c.PROGRAMA_ID");
	while($Curso= mysqli_fetch_assoc($resultado)) {
		array_push($Cursos, $Curso);
	}
	return $Cursos;
}

function ListaCursosPrograma($conecta,$programa){

	$Cursos = array();
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
	//$result = mysqli_query($conecta,$query);
	$resultado = mysqli_query($conecta, "select c.ID_CURSO, c.NOME, c.DESCRICAO, c.PROGRAMA_ID,  
		p.NOME as PROGRAMA from curso c, programa p WHERE p.ID_PROGRAMA = c.PROGRAMA_ID AND ID_CURSO = {$id}");
	return mysqli_fetch_assoc($resultado);
}


