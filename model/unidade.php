<?php 

 function insereUnidade($conecta,$DATA_INICIO,$DATA_FIM,$PLANO_ENSINO_ID)
{
	$sql = "insert into unidade (DATA_INICIO,DATA_FIM,PLANO_ENSINO_ID) values ('{$DATA_INICIO}',{$DATA_FIM},'{$PLANO_ENSINO_ID}')";
		return mysqli_query($conecta, $sql);

}

function ListaUnidades($conecta){

	$Unidades = array();
	$resultado = mysqli_query($conecta, "select *from unidade");
	while($Unidade= mysqli_fetch_assoc($resultado)) {
		array_push($Unidades, $Unidade);
	}
	return $Unidades;
}

function RemoveUnidade($conecta,$id)
{
	$query = "delete from unidade where ID_UNIDADE = {$id}";
	return mysqli_query($conecta, $query);
}


function buscarUnidade($conecta,$id){
	
	$query = "select *from unidade where ID_UNIDADE = {$id}";
	$result = mysqli_query($conecta,$query);
	return mysqli_fetch_assoc($result);
}


function ListaUnidadesPlanos($conecta,$id){

	$Unidades = array();
	$resultado = mysqli_query($conecta, "select *from unidade where PLANO_ENSINO_ID = {$id}");
	while($Unidade= mysqli_fetch_assoc($resultado)) {
		array_push($Unidades, $Unidade);
	}
	return $Unidades;
}

function alterarUnidade($conecta,$id,$DATA_INICIO,$DATA_FIM,$PLANO_ENSINO){
	
	$query = "update unidade set DATA_FIM='{$DATA_FIM}', DATA_INICIO='{$DATA_INICIO}',PLANO_ENSINO_ID = {$PLANO_ENSINO} where ID_UNIDADE = {$id}";
	sql_config($conecta);
	return mysqli_query($conecta,$query);
}