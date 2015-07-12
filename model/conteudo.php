<?php 

 function insereConteudo($conecta,$nome,$descricao,$data,$anexos,$conteudo)
{
	$sql = "INSERT INTO `conteudo`(`TITULO`, `DESCRICAO`, `DATA_ENVIO`, `ANEXOS`, `conteudo_ID`) VALUES ('{$titulo}','{$descricao}','{$data}',{$anexos},{$conteudo})";
		return mysqli_query($conecta, $sql);

}

function ListaConteudos($conecta){

	$Conteudos = array();
	$resultado = mysqli_query($conecta, "select *from conteudo");
	while($Conteudo= mysqli_fetch_assoc($resultado)) {
		array_push($Conteudos, $Conteudo);
	}
	return $Conteudos;
}

function ListaConteudosconteudo($conecta, $conteudo){

	$Conteudos = array();
	$resultado = mysqli_query($conecta, "select *from conteudo where conteudo_ID = {$conteudo}");
	while($Conteudo= mysqli_fetch_assoc($resultado)) {
		array_push($Conteudos, $Conteudo);
	}
	return $Conteudos;
}
function RemoveConteudo($conecta,$id)
{
	$query = "delete from conteudo where ID_CONTEUDO = {$id}";
	return mysqli_query($conecta, $query);
}


function buscarConteudo($conecta,$id){
	
	$query = "select *from conteudo where ID_CONTEUDO = {$id}";
	$result = mysqli_query($conecta,$query);
	return mysqli_fetch_assoc($result);
}



function alterarconteudo($conecta,$id,$TITULO,$DATA_FIM,$DESCRICAO){
	
	$query = "update conteudo set DATA_ENVIO='{$DATA_FIM}', TITULO='{$TITULO}',DESCRICAO= '{$DESCRICAO}' where ID_CONTEUDO = {$id}";
	
	sql_config($conecta);
	return mysqli_query($conecta,$query);
}