<?php 
//INSERT INTO `usuario`(`ID_USUARIO`, `NOME`, `ENDERECO`, `FORMACAO`, `CPF`, `RG`, `TITULACAO`, `EMAIL`, `LOGIN`, `SENHA`, `PERFIL_ID`, `Usuario_ID`)
include_once '../model/perfil.php';

 function insereUsuario($conecta,$nome,$ENDERECO,$FORMACAO,$CPF, $RG, $TITULACAO,$EMAIL,$LOGIN, $SENHA,$PERFIL_ID, $PROGRAMA_ID)
{
	$sql = "insert into `usuario`(`NOME`, `ENDERECO`, `FORMACAO`, `CPF`, `RG`, `TITULACAO`, `EMAIL`, `LOGIN`, `SENHA`, `PERFIL_ID`, `PROGRAMA_ID`) VALUES ('{$nome}','{$ENDERECO}','{$FORMACAO}','{$CPF}','{$RG}','{$TITULACAO}','{$EMAIL}','{$LOGIN}','{$SENHA}',{$PERFIL_ID},{$PROGRAMA_ID})";
		sql_config($conecta);
		return mysqli_query($conecta, $sql);

}

function alterarUsuario($conecta, $nome, $endereco, $formacao, $cpf, $rg, $titulacao, $email, $perfil_id, $programa_id, $id) {

	$sql = "update usuario set NOME = '$nome', ENDERECO = '$endereco', FORMACAO = '$formacao', 
	CPF = '$cpf', RG = '$rg', TITULACAO = '$titulacao', EMAIL = '$email', 
	PROGRAMA_ID = '$programa_id', PERFIL_ID = '$perfil_id' WHERE ID_USUARIO = '$id'";
	sql_config($conecta);
	return mysqli_query($conecta, $sql);
}

function ListaUsuarios($conecta){

	$Usuarios = array();

	$sql = "select u.ID_USUARIO, u.NOME, u.EMAIL, pf.NOME as PERFIL, pr.NOME as PROGRAMA from 
	perfil pf, programa pr, usuario u where pr.ID_PROGRAMA = u.PROGRAMA_ID and 
	pf.ID_PERFIL = u.PERFIL_ID order by u.ID_USUARIO";

	sql_config($conecta);
	$resultado = mysqli_query($conecta, $sql);
	while($Usuario= mysqli_fetch_assoc($resultado)) {
		array_push($Usuarios, $Usuario);
	}
	return $Usuarios;
}

function RemoveUsuario($conecta,$id)
{
	$query = "delete FROM USUARIO where ID_USUARIO = {$id}";
	return mysqli_query($conecta, $query);
}

function buscarUsuario($conecta,$id){
	
	$query = "select u.*, pf.NOME as PERFIL, pr.NOME as PROGRAMA FROM usuario u, perfil pf, programa pr where ID_USUARIO = {$id} and 
	u.PERFIL_ID = pf.ID_PERFIL and u.PROGRAMA_ID = pr.ID_PROGRAMA";
	sql_config($conecta);
	$result = mysqli_query($conecta,$query);
	return mysqli_fetch_assoc($result);
}

function buscarUsuarioRG($conecta,$RG){
	
	$query = "select *FROM USUARIO where RG = {$RG}";
	sql_config($conecta);
	$result = mysqli_query($conecta,$query);
	return mysqli_fetch_assoc($result);
}

function buscarUsuarioCPF($conecta,$CPF){
	
	$query = "select *FROM USUARIO where RG = {$CPF}";
	sql_config($conecta);
	$result = mysqli_query($conecta,$query);
	return mysqli_fetch_assoc($result);
}


function buscarUsuarioPrograma($conecta,$PROGRAMA_ID){
	
	$query = "select *FROM USUARIO where PROGRAMA_ID = {$PROGRAMA_ID}";
	sql_config($conecta);
	$result = mysqli_query($conecta,$query);
	return mysqli_fetch_assoc($result);
}

function buscarUsuarioPerfil($conecta,$PERFIL_ID){
	
	$query = "select *FROM USUARIO where PERFIL_ID = {$PERFIL_ID}";
	sql_config($conecta);
	$result = mysqli_query($conecta,$query);
	return mysqli_fetch_assoc($result);
}

function AlterarSenha($conecta,$login,$senha){
	
	$query = "update usuario set SENHA={$senha} where LOGIN = {$login}";
	sql_config($conecta);
	$result = mysqli_query($conecta,$query);
	return mysqli_fetch_assoc($result);
}

function BuscarUsuarioSenha($conecta,$login,$senha){
	
	$query = "select USUARIO_ID from where SENHA={$senha} where LOGIN = {$login}";
	$result = mysqli_query($conecta,$query);
	$resultado = mysqli_fetch_assoc($result);
	return $resultado['USUARIO_ID'];
}

function AlterarSenhaEmail($conecta,$email,$senha){
	
	$query = "update usuario set SENHA={$senha} where EMAIL = {$email}";
	sql_config($conecta);
	$result = mysqli_query($conecta,$query);
	return mysqli_fetch_assoc($result);
}

