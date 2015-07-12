<?php
  include_once '../conecta.php'; 
  include_once '../includes/common.inc.php';
  include_once '../model/unidade.php';
  include_once '../model/perfil.php'; 

  include_once '../partials/header.inc.php';
  include_once '../partials/sidebar.inc.php';

  if (isset($_POST['id']) && is_numeric($_POST['id'])) {

  		$id = $_POST['id'];
  		$unidade = buscarUnidade($conexao, $id);
  		$acao = 'edit';
  		
  } else {

  		$id = "";
  		$acao = 'add';
  }
?>

?>
<div id="page-wrapper">
	<form action="../control/unidade-controller.php" class="form-horizontal">
		<fieldset>
			<input type="hidden" name="acao" value= <?= $acao?>>
			<input type="hidden" name="id_unidade" value = <?= $id ?>>
			<input type="hidden" name="planoEnsino" <?php if (isset($unidade)) 
			    						echo " value = '".$unidade['PLANO_ENSINO_ID']."'"; 
			    						else
			    							echo " value = '".$_POST['plano_ensino']."'";
			    				 ?>>
			
			<h3 class="page-header">Adicionar Unidade</h3>
			<div class="form-group has-feedback has-feedback-left">
				<div class="col-md-10 col-sm-offset-1">
					<i class="form-control-feedback glyphicon glyphicon-user"></i>
					<input type="date" class="form-control" placeholder="Data-Fim" 
					<?php 
			    					if (isset($unidade)) 
			    						echo " value = '".$unidade['DATA-INICIO']. "'";
			    				?>
					/>
				</div>
			</div>
			
			<div class="form-group has-feedback has-feedback-left">
				<div class="col-md-10 col-sm-offset-1">
					<i class="form-control-feedback glyphicon glyphicon-user"></i>
					<input type="date" class="form-control" placeholder="Data-Inicio" />
					<?php 
			    					if (isset($unidade)) 
			    						echo " value = '".$unidade['DATA-FIM']. "'";
			    				?>
				</div>
			</div>

			
		</fieldset>
			<button class="btn btn-lg btn-primary">Salvar</button>

	</form>
</div>
<footer>
	
</footer>
<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
<script>
webshims.setOptions('forms-ext', {types: 'date'});
webshims.polyfill('forms forms-ext');
$.webshims.formcfg = {
en: {
    dFormat: '-',
    dateSigns: '-',
    patterns: {
        d: "yy-mm-dd"
    }
}
};
</script>
<?php include_once '../ead/partials/footer.inc.php'; ?>
