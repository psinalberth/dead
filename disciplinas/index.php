<?php
  include_once '../conecta.php'; 
  include_once '../includes/common.inc.php';
  include_once '../model/disciplina.php';

  include_once '../partials/header.inc.php';
  include_once '../partials/sidebar.inc.php';


?>
<div id="page-wrapper">

     <div class="col-lg-12">
                        <h1 class="page-header">
                          Disciplinas
                        </h1>
                      
                    </div>
	      <div class="tab-pane col-lg-12 principal">
                                    <br>
                                    <br>
                           <table class="table table-striped table-bordered">
                                <tr>
                                      <th>Disciplinas</th>
                                      <th>Descrição</th>
                                      <th>Alterar</th>
                                      <th>Remover</th>
                                 </tr>

                                <?php
                                    $Disciplinas = listaDisciplinas($conexao);

                                    foreach($Disciplinas as $Disciplina) :
                                ?>
                                <tr>
                                    <td><?= $Disciplina['NOME'] ?></td>
                                    <td><?= $Disciplina['DESCRICAO'] ?></td>
                                    
                                    <td >
                                        <form action="edita.php" method="post">
                                            <input type="hidden" name="id" value="<?=$Disciplina['ID_DISCIPLINA']?>">
                                            <button class="btn btn-info" title="Editar"><i class="fa fa-edit"></i></button>
                                        </form>
                                      </td>
                                     <td >
                                        <form action="../control/disciplinas/remover.php" method="post">
                                            <input type="hidden" name="id" value="<?=$Disciplina['ID_DISCIPLINA']?>">
                                            <button class="btn btn-danger" title="Excluir"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                      </td>
                                </tr>
                                <?php
                                endforeach
                                ?>
                           </table>
                        </div>
                      
</div>
<?php include_once '../partials/footer.inc.php'; ?>