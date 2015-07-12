<?php 
	
include_once '../model/perfil.php';

 function insereDisciplina($conecta,$nome,$descricao)
{
	$sql = "insert into disciplina (NOME,DESCRICAO) values ('{$nome}','{$descricao}')";
	sql_config($conecta);	
	return mysqli_query($conecta, $sql);

}

function ListaDisciplinas($conecta){

	$Disciplinas = array();
	sql_config($conecta);
	$resultado = mysqli_query($conecta, "select *from disciplina");
	
	while($Disciplina= mysqli_fetch_assoc($resultado)) {
		array_push($Disciplinas, $Disciplina);
	}
	return $Disciplinas;
}


function RemoveDisciplina($conecta,$id)
{
	$query = "delete from disciplina where ID_DISCIPLINA = {$id}";
	return mysqli_query($conecta, $query);
}


function buscarDisciplina($conecta,$id){
	
	$query = "select *from disciplina where ID_DISCIPLINA = {$id}";
	sql_config($conecta);
	$result = mysqli_query($conecta,$query);
	return mysqli_fetch_assoc($result);
}

function alterarDisciplina($conecta,$id,$nome,$descricao){
	
	$query = "update disciplina set DESCRICAO='{$descricao}', NOME='{$nome}' where ID_DISCIPLINA = {$id}";
	sql_config($conecta);
	return mysqli_query($conecta,$query);
}