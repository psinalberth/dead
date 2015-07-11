<?php 
	$transacoes = listar($conexao);
?>

	<div class="navbar-default sidebar" role="navigation">
		<div class="sidebar-nav navbar-collapse">
			<ul class="nav in" id="side-menu">
				<?php foreach($transacoes as $transacao) : ?>
				<li><a href="/dead<?= $transacao['URL']?>"><?= $transacao['DESCRICAO_AREA'] ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</nav>
