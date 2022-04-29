<!-- Page Heading -->
<?php

$acao = @$_GET['acao'];

if ($acao == "") {
?>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pilhas </h1>
    <a href="./index.php?p=nova-pilha" style="color: white ; background-image: url('./img/gradiente4.png') ; background-repeat: no-repeat;background-size: 100%; border: none;" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Nova Pilha</a>
</div>

<!-- Content Row -->
<div class="row">
    <!-- Pendencias -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Número de Pilhas Ativas </div>
                        <?php
                        $sql = mysqli_query($connect, "SELECT * FROM tblinha WHERE Ativa = true ");
                        $row = mysqli_num_rows($sql);

                        if ($row > 0) {
                            echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>" . $row . "</div>";
                        } else {
                            echo "0";
                        }
                        ?>

                    </div>
                    <div class="col-auto">
                        <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="exibe-dados table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nome da Pilha</th>
                        <th>Tipo do Composto</th>
                        <th>Local</th>
                        <th>Data</th>
                        <th>Número de Linhas </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //Retornando os dados de cada pilha cadastrada
                    $qr = mysqli_query($connect, "SELECT * FROM tblinha");
                    while ($dado = mysqli_fetch_array($qr)) {
                        $nomePilha = $dado['NomePilha'];
                        $tipoComposto = $dado['TipoComposto'];
                        $local = $dado['Local'];
                        $data = $dado['Data'];
                        $numeroLinhas = $dado['NumeroLinhas'];
                        /*
                            $qrMedico = mysqli_query($connect, "SELECT * FROM medico WHERE ID = '{$idMedico}'");
                            $dadoPaciente = mysqli_fetch_array($qrPaciente);
                            $dadoMedico = mysqli_fetch_array($qrMedico);*/
                        echo "
                                    <tr>
                                        <td>
                                            " . $dado['NomePilha'] . " 
                                            <br />
                                                <div style='font-size: 13px;'>
                                                    <a href='./index.php?p=pilhas&acao=visualizarpilha&id=" . $dado['Id'] . "'>Ver</a>
                                                        <span style='font-size: 12px;'> | </span> 
                                                    <a href='./index.php?p=pilhas&acao=editarpilha&id=" . $dado['Id'] . "'>Editar</a>
                                                        <span style='font-size: 12px;'> | </span> 
                                                    <a href='./index.php?p=pilhas&acao=novalinha&id=" . $dado['Id'] . "' class='text-success'>Nova Linha</a>
                                                        <span style='font-size: 12px;'> | </span> 
                                                    <a href='./index.php?p=pilhas&acao=excluirpilha&id=" . $dado['Id'] . "' class='text-danger'>Excluir</a>
                                                </div>
                                        </td>
                                        <td>" . $dado['TipoComposto'] . "</td>
                                        <td>" . $dado['Local'] . "</td>
                                        <td>" . $dado['Data'] . "</td>
                                        <td>" . $dado['NumeroLinhas'] . "
                                            <a class='collapse-item cadastro' href='./index.php?p=nova-linha'> <input type='button' method='POST' value='+' name='btnAdicionarLinha' class='btn btn-outline-success' width='50%' > </a> 
                                        </td> 
                                     </tr>
                                ";
                        /*
                            if ($getStatus == true) {
                              echo "<td> Finalizado </td> </tr>";
                            }
                            else {
                              echo "<td> Ativo </td> </tr>";
                            }    */
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
} else {

    $Id = @$_GET['Id'];

    if ($acao == "editar") {
    ?>

        <h1 class="h3 mb-3 text-gray-800">Editar pilha existente</h1>
        <p class="mb-5">Altere dados da Pilha</p>

        <!-- Content Row -->
        <div class="row">

            <div class="col-12 col-lg-8">

                <?php

                $qr = mysqli_query($connect, "SELECT * FROM tblinha WHERE id = '{$Id}'");
                $dado = mysqli_fetch_array($qr);

                echo "<form action='./pilhas/cadastrarpilha.php?acao=editar&id=" . $dado['Id'] . "' method='POST'>";

                ?>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="txtNome">Nome da Pilha (obrigatório)</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input id="txtNome" name="nome" type="text" class="form-control" value="<?php echo $dado['NomePilha']; ?>">
                    </div>
                </div>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="dtData">Data (obrigatório)</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input id="dtData" name="dtData" type="date" class="form-control" value="<?php echo $dado['dtData']; ?>">
                    </div>
                </div>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="slctTipoComposto">Tipos de Compostos(obrigatório)</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <select name="slctTipoComposto" id="slctTipoComposto" type="text" class="form-control selecttwo" multiple="multiple" required>
                            <option value="<?php echo $dado['txtTipoComposto']; ?>"></option>
                        </select>
                    </div>
                </div>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="txtLocal">Localização (obrigatório)</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input id="txtLocal" name="txtLocal" type="text" class="form-control" value="<?php echo $dado['txtLocal']; ?>">
                    </div>
                </div>

                <!-- COMPRIMENTO -->
                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="txtComprimento">Comprimento Total da Pilha em Metros(obrigatório) </label>
                    </div>
                    <div class="col-12 col-md-7">
                    <input name="txtComprimento" id="txtComprimento" type="number" class="form-control" formaction="text" placeholder="Ex: 22" value="<?php echo $dado['txtComprimento']; ?>" required>
                    </div>
                </div>  

                <!-- ALTURA -->
                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="txtAltura">Altura Total da Pilha em Metros (obrigatório)</label>
                    </div>
                    <div class="col-12 col-md-7">
                    <input name="txtAltura" id="txtAltura" type="number" class="form-control" formaction="text" placeholder="Ex: 1,2" value="<?php echo $dado['txtAltura']; ?>" required>
                    </div>
                </div>  

                <!-- LARGURA -->
                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="txtLargura">Largura Total da Base da Pilha em Metros (obrigatório)</label>
                    </div>
                    <div class="col-12 col-md-7">
                    <input name="txtLargura" id="txtLargura" type="number" class="form-control" formaction="text" placeholder="Ex: 1,2" value="<?php echo $dado['txtLargura']; ?>" required>
                    </div>
                </div>  

                <!-- OBSERVAÇÃO -->
                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="txtObservacao">Observação</label>
                    </div>
                    <div class="col-12 col-md-7">
                    <input name="txtObservacao" id="txtObservacao" type="textarea" class="form-control" value="<?php echo $dado['txtObservacao']; ?>">
                    </div>
                </div>

                <div class="form-row align-items-center">
                    <div class="col">
                        <button id="btnEnviar" type="button" class="btn " style="color: white ; background-image: url('./img/gradiente4.png') ; background-repeat: no-repeat;background-size: 100%;" >Editar Pilha</button>
                    </div>
                </div>

                </form>

            </div>

            <div class="col-12 col-lg-4">

            </div>
        </div>

    <?php
    } else if ($acao == 'nova-linha') {

    ?>

    <?php
    } else if ($acao == 'excluir') {

    ?>

        <h1 class="h3 mb-3 text-gray-800">Excluir prestador</h1>
        <p class="mb-5">Tem certeza de que deseja excluir permanentemente este prestador?</p>

        <div class="row">

            <div class="col-12">
                <?php
                $qr = mysqli_query($connect, "SELECT * FROM prestadores WHERE id ='{$Id}'");
                $dado = mysqli_fetch_array($qr);

                echo "<form action='./prestadores/prestador-acao.php?acao=excluir&id=" . $dado['Id'] . "' method='POST'>"
                ?>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <?php
                        echo "Nome: " . $dado['nome'] . "<br>Perfil: " . $dado['perfil'] . "<br>Disponibilidade: " . $dado['disponibilidade'];
                        ?>
                    </div>
                </div>
                <div class="form-row align-items-center">
                    <div class="col">
                        <button id="btnExcluir" type="submit" class="btn btn-primary">Confirmar exclusão</button>
                    </div>
                </div>

                </form>

            </div>
        </div>
<?php
    }
}
?>