<?php
function modalExcluirSecao($IdSecao)
{ ?>
    <div class="modal  fade" id="ModalExcluir<?php echo $IdSecao ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true" style="height: 100%!important; width: 100%!important;">
        <div class="d-flex justify-content-center align-items-center modal-dialog modal-lg" role="document" style="height: 100%;">
            <div class="modal-content" style="height: fat-content;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Excluir Seção</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <canvas id="myChart"> </canvas> -->
                    <h1 class="h3 mb-4 mt-10 text-gray-800">Tem certeza de que deseja excluir esta Seção?</h1>
                    <p class="mb-4">Ao excluir uma seção, você não terá mais acesso aos dados!</p>

                    <hr />
                    <div class="row">

                        <div class="col-12">
                            <?php

                            echo "<form action=' ./secoes/secao-acao.php?acao=excluirsecao&id=" . $IdSecao . "' method='POST'>"
                            ?>
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                            <button id="btnExcluir" type="submit" class="btn btn-danger">Confirmar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!--<div class="modal-footer">
                    <p><br/></p>
                </div>-->
            </div>
        </div>
    </div>

<?php } ?>

<?php
function modalFinalizarLinha($IdLinha)
{ ?>

    <div class="modal  fade" id="ModalFinalizar<?php echo $IdLinha ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true" style="height: 100%!important; width: 100%!important;">
        <div class="d-flex justify-content-center align-items-center modal-dialog modal-lg" role="document" style="height: 100%;">
            <div class="modal-content" style="height: fat-content;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Finalizar Linha</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <canvas id="myChart"> </canvas> -->
                    <h1 class="h3 mb-4 mt-10 text-gray-800">Tem certeza de que deseja finalizar esta Linha?</h1>
                    <p class="mb-4">Ao finalizar uma Linha, ela estará em seu estágio <b>Curado</b> e você continuará tendo acesso as informações dela na página de <a href="./index.php?p=historico">Histórico</a>!</p>

                    <hr />
                    <div class="row">

                        <div class="col-12">
                            <?php

                            echo "<form action=' ./linhas/linha-acao.php?acao=finalizarlinha&id=" . $IdLinha . "' method='POST'>"
                            ?>
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                            <button id="btnExcluir" type="submit" class="btn btn-danger">Confirmar</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php } ?>

<?php
function modalExcluirLinha($IdLinha)
{ ?>

    <div class="modal  fade" id="ModalExcluirLinha<?php echo $IdLinha ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true" style="height: 100%!important; width: 100%!important;">
        <div class="d-flex justify-content-center align-items-center modal-dialog modal-lg" role="document" style="height: 100%;">
            <div class="modal-content" style="height: fat-content;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Excluir Linha</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <canvas id="myChart"> </canvas> -->
                    <h1 class="h3 mb-4 mt-10 text-gray-800">Tem certeza de que deseja excluir esta Linha?</h1>
                    <p class="mb-4">Ao excluir uma Linha, você não terá mais acesso aos dados!</p>
                    <hr />
                    <div class="row">
                        <div class="col-12">
                            <?php
                            echo "<form action=' ./linhas/linha-acao.php?acao=excluirlinha&id=" . $IdLinha . "' method='POST'>"
                            ?>
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                            <button id="btnExcluir" type="submit" class="btn btn-danger">Confirmar</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php } ?>


<?php

$acao = @$_GET['acao'];

if ($acao == "") {
?>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 text-center text-lg-left">Linhas</h1>
        <a href="./index.php?p=nova-linha" style="background: #00882d; color:white; border:none" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Nova Linha</a>

    </div>

    <div class="row">

        <!-- Tickets - LINHAS SEMI-CURADAS -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Estágio Semicurado </div>
                            <?php
                            $sql = mysqli_query($connect, "SELECT * FROM tblinha WHERE Estagio = 'Semicurado' and Status = 1 ");
                            $row = mysqli_num_rows($sql);

                            if ($row > 0) {
                                echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>" . $row . "</div>";
                            } else {
                                echo "0";
                            }
                            ?>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-sort-amount-down fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tickets - LINHAS INICIAS -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Estágio Inicial </div>
                            <?php
                            $sql = mysqli_query($connect, "SELECT * FROM tblinha WHERE Estagio = 'Inicial' and Status = 1 ");
                            $row = mysqli_num_rows($sql);

                            if ($row > 0) {
                                echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>" . $row . "</div>";
                            } else {
                                echo "0";
                            }
                            ?>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-sort-amount-up fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tickets - LINHAS ATIVAS -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                Total de linhas </div>
                            <?php
                            $sql = mysqli_query($connect, "SELECT * FROM tblinha WHERE Status = '1' ");
                            $row = mysqli_num_rows($sql);

                            if ($row > 0) {
                                echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>" . $row . "</div>";
                            } else {
                                echo "0";
                            }
                            ?>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <div class="card shadow mb-4">
        <div class="col-md-12 pt-3">
            <div class="table-responsive pt-0">
                <table class="exibe-dados table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nome da Linha</th>
                            <th>Tipo do Composto</th>
                            <th>Local</th>
                            <th>Data de Criação</th>
                            <th>Seções Cadastradas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //Retornando os dados de cada linha cadastrada
                        $qr = mysqli_query($connect, "SELECT * FROM tblinha WHERE Status = '1'");
                        while ($dado = mysqli_fetch_array($qr)) {
                            $nomeLinha = $dado['NomeLinha'];
                            $tipoComposto = $dado['TipoComposto'];
                            $local = $dado['Local'];
                            $data = $dado['DataCriacao'];
                            $id = $dado['Id'];
                            $dadoSecao = 0;
                            //select count(nome) from Produtos where nome is null; 
                            $qrLinhas = mysqli_query($connect, "SELECT * FROM tbsecao WHERE CodLinha = $id");
                            while ($dadoSecoesConsulta = mysqli_fetch_array($qrLinhas)) {
                                # code...
                                $dadoSecao += 1;
                            }
                            if ($dadoSecao == 0 || $dadoSecao == null) {
                                $dadoSecao = 'Nenhuma seção cadastrada!';
                            } else if ($dadoSecao == 1)
                                $dadoSecao = "$dadoSecao seção cadastrada";
                            else
                                $dadoSecao = "$dadoSecao seções cadastradas";

                            /*
                            $qrMedico = mysqli_query($connect, "SELECT * FROM medico WHERE ID = '{$idMedico}'");
                            $dadoPaciente = mysqli_fetch_array($qrPaciente);
                            $dadoMedico = mysqli_fetch_array($qrMedico);*/
                            $borda = "";
                            $hiddenOrNot = "hidden";

                            if ($dado['Estagio'] == 'Semicurado' && $dado['Status'] == 1) {
                                $borda = 'border-left-warning';
                            } else
                                $borda = 'border-left-primary';

                            modalFinalizarLinha($id);
                            modalExcluirLinha($id);

                            echo "
                                    <tr>
                                        <td class='$borda'>
                                            " . $dado['NomeLinha'] . " 
                                            <br />
                                                <div style='font-size: 13px;'>
                                                    <a href='./index.php?p=linhas&acao=visualizarlinha&id=" . $dado['Id'] . "'>Ver</a> 
                                                    <span style='font-size: 12px;'> | </span>      
                                                    <a href='./index.php?p=linhas&acao=editarlinha&id=" . $dado['Id'] . "'>Editar</a>   
                                                    <span style='font-size: 12px;'> | </span> 
                                                    <a href='#' data-toggle='modal' data-target='#ModalFinalizar" . $dado['Id'] . "'>Finalizar</a>
                                                    <span style='font-size: 12px;'> | </span> 
                                                    <a href='./index.php?p=secoes&acao=cadastrarsecao&id=" . $dado['Id'] . "' style='color:#00882d;'>Nova seção</a>
                                                    <span style='font-size: 12px;'> | </span> 
                                                    <a href='#' data-toggle='modal' data-target='#ModalExcluirLinha" . $dado['Id'] . "' class='text-danger'>Excluir</a>
                                                </div>
                                        </td>
                                        <td>" . $dado['TipoComposto'] . "</td>
                                        <td>" . $dado['Local'] . "</td>
                                        <td>" . date('d / m / Y', strtotime($dado['DataCriacao'])) . "</td>
                                        <td>" . $dadoSecao . "</td>
                                     </tr>      
                                ";
                        }

                        ?>
                        <div id='modalteste' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel'>
                            <div class='modal-dialog modal-sm' role='document'>
                                <div class='modal-content'>
                                    <p><?php include('..teste.php');    ?></p>
                                    .....
                                </div>
                            </div>
                        </div>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
} else {

    $id = @$_GET['id'];

    if ($acao == "editarlinha") {
    ?>

        <!-- Content Row -->
        <div class="row col-12 justify-content-md-center responsive">

            <!-- <p class="mb-5">Altere dados da Linha</p> -->

            <div class="col-12 col-md-10  ">
                <BR>
                <h1 class="mb-3 text-gray-800 text-center text-lg-left">Editar linha</h1>
                <?php

                $qr = mysqli_query($connect, "SELECT * FROM tblinha WHERE Id = '{$id}'");
                $dado = mysqli_fetch_array($qr);

                echo "<form action='./linhas/linha-acao.php?acao=editarlinha&id=" . $dado['Id'] . "' method='POST'>"

                ?>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="txtNome">Nome da Linha</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input id="txtNome" name="txtNome" type="text" class="form-control" value="<?php echo $dado['NomeLinha']; ?>">
                    </div>
                </div>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="dtData">Data de Criação da Linha</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input id="dtData" name="dtData" type="date" class="form-control" value="<?php echo $dado['DataCriacao']; ?>">
                    </div>
                </div>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="slctTipoComposto">Relação C/N dos Compostos</label>
                    </div>
                    <div class="col-12 col-md-7">
                    <select name="slctTipoComposto" id="slctTipoComposto" class="form-control obrigatorio">
                    <?php $tipo = trim($dado['TipoComposto']); ?>
                        <?php if ($tipo == 'C/N igual a 30/1') {
                            echo "<option> C/N maior que 30/1</option>";
                            echo "<option> C/N menor que 30/1</option>";
                            echo "<option selected>C/N igual a 30/1</option>";
                           
                        } else if($tipo == 'C/N menor que 30/1')  {
                            echo "<option> C/N maior que 30/1</option>";
                            echo "<option selected> C/N menor que 30/1</option>";
                            echo "<option >C/N igual a 30/1</option>";
                        } else{
                            echo "<option selected> C/N maior que 30/1</option>";
                            echo "<option > C/N menor que 30/1</option>";
                            echo "<option >C/N igual a 30/1</option>";
                        } ?>
                    </select>
                       
                        

                    </div>
                </div>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="slctTamanho">Tamanho da Linha</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input name="slctTamanho" id="slctTamanho" type="text" class="form-control" value="<?php echo $dado['Tamanho']; ?>" readonly>
                    </div>
                </div>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="txtLocal">Localização</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input id="txtLocal" name="txtLocal" type="text" class="form-control" value="<?php echo $dado['Local']; ?>">
                    </div>
                </div>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="slctEstagio">Estágios da Linha</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <select id="slctEstagio" name="slctEstagio" class="form-control obrigatorio">
                            <?php
                            if ($dado['Estagio'] == 'Inicial') {
                                echo "<option selected value='Inicial'>Inicial</option>";
                                echo "<option value='Semicurado'>Semicurado</option>";
                            } else {
                                echo "<option value='Inicial'>Inicial</option>";
                                echo "<option selected value='Semicurado'>Semicurado</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <!-- DESCRIÇÃO -->
                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="txtDescricao">Descrição</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <textarea class="form-control" name="txtDescricao" id="txtDescricao" rows="6"><?php echo $dado['Descricao']; ?></textarea>
                    </div>
                </div>

                <div class="form-row align-items-center">
                    <div class="col">
                        <input type="button" name="submitted" class="btn btn-secondary" value="Cancelar" onClick="window.location='index.php';" />
                        <button id="btnEnviar" type="submit" class="btn" style="background: #00882d; color:white;">Salvar</button>
                    </div>
                </div>
                <br />
                <hr />
                <br />
                </form>

                <h1 class="mb-2 text-gray-800 text-center text-lg-left">Seções da Linha</h1>

                <?php
                $sqlLinhas = mysqli_query($connect, "SELECT * FROM tbsecao WHERE CodLinha = $id");
                $row = mysqli_num_rows($sqlLinhas);

                if ($row > 0) {
                    if ($dado['Estagio'] != "Curado") {
                        echo "<p class=mb-4><b><a href='./index.php?p=secoes&acao=cadastrarsecao&id=" . $dado['Id'] . "' class='text-primary'>Clique aqui</a></b> para cadastrar uma nova seção.</p>";
                    } ?>
                    <div class="card shadow mb-2">
                        <div class="col-md-12 pt-3">
                            <div class="table-responsive pt-0">
                                <table class="exibe-dados-sem-paginacao table table-hover  table-bordered" id="dataTable" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Posição na Linha</th>
                                            <th>Data de Criação</th>
                                            <th>Responsável</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        echo "<script>dadoT = new Object(); dadoU = new Object();</script>";
                                        $qrLinhas = mysqli_query($connect, "SELECT * FROM tbsecao WHERE CodLinha = $id ORDER by PosicaoLinha");
                                        while ($dadoSecoesConsulta = mysqli_fetch_array($qrLinhas)) {
                                            $IdSecao = $dadoSecoesConsulta['Id'];
                                            $Data = $dadoSecoesConsulta['DataCriacao'];
                                            $Posicao = $dadoSecoesConsulta['PosicaoLinha'];
                                            $NomeFuncionario = $dadoSecoesConsulta['NomeFuncionario'];
                                            $coordenadasT = "";
                                            $coordenadasU = "";
                                            $qrCoordenada = mysqli_query($connect, "SELECT * FROM tbcoordenada WHERE CodSecao = '{$IdSecao}' ");

                                            while ($dadoCoordenada = mysqli_fetch_array($qrCoordenada)) {

                                                $coordenadasT .= $dadoCoordenada['Temperatura'] . ", ";
                                                $coordenadasU .= $dadoCoordenada['Umidade'] . ", ";
                                            }
                                            $coordenadasT = substr($coordenadasT, 0, -2);

                                            $coordenadasU = substr($coordenadasU, 0, -2);

                                            modalExcluirSecao($IdSecao);
                                            modalGrafico3Pontos($IdSecao);
                                            modalGrafico6Pontos($IdSecao);
                                            // echo "<script>window.onload = function () {teste(" . $IdSecao . ")};</script>";

                                            echo "<script>dadoT['" .  $IdSecao . "']=[" . $coordenadasT . "];dadoU['" .  $IdSecao . "']=[" . $coordenadasU . "];</script>";

                                        ?>
                                            <?php
                                            $qr = mysqli_query($connect, "SELECT * FROM tblinha WHERE Id = '$id'");
                                            $dado = mysqli_fetch_array($qr);
                                            if ($dado['Tamanho'] == '3m x 1,5m') {
                                                echo "
                                                    <tr id= '" . $IdSecao . "' >
                                                        <td>" . $Posicao . "</td>
                                                        <td>" . date('d / m / Y', strtotime($Data)) . "</td>
                                                        <td>" . $NomeFuncionario . "</td>
                                                        <td> " ?> <button class='btn btn-sm gerarGrafico6Pontos ' style="background: #00882d; color:white;" data-toggle='modal' data-target='#ModalGrafico6<?php echo $IdSecao ?>'> <i class="fas fa-chart-line"></i> Gráfico</button> <?php "</td>
                                                        <td>"  ?> <button class='btn btn-danger btn-sm' data-toggle='modal' data-target='#ModalExcluir<?php echo $IdSecao ?>'><i class="fa fa-trash"></i></button> <?php "</td>
                            
                                                    </tr>      
                                                ";
                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                    echo "
                                                <tr id= '" . $IdSecao . "' >
                                                    <td>" . $Posicao . "</td>
                                                    <td>" . date('d / m / Y', strtotime($Data)) . "</td>
                                                    <td>" . $NomeFuncionario . "</td>
                                                    <td> " ?> <button class='btn btn-sm gerarGrafico3Pontos' style="background: #00882d; color:white;" data-toggle='modal' data-target='#ModalGrafico2<?php echo $IdSecao ?>'> <i class="fas fa-chart-line "></i> Gráfico</button> <?php "</td>
                                                    <td>"  ?> <button class='btn btn-danger btn-sm' data-toggle='modal' data-target='#ModalExcluir<?php echo $IdSecao ?>'><i class="fa fa-trash"></i></button> <?php "</td>
                                                </tr>      
                                            ";
                                                                                                                                                                                                                }
                                                                                                                                                                                                            }
                                                                                                                                                                                                                ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <p>Esta linha não possui seções cadastradas!</p>
                    <?php if ($dado['Estagio'] != "Curado") {
                        echo "<p><b><a href='./index.php?p=secoes&acao=cadastrarsecao&id=" . $dado['Id'] . "' class='text-primary'>Clique aqui</a></b> para cadastrar uma nova seção.</p>";
                    } ?>
                <?php } ?>

            </div>


        </div>

    <?php
    } else if ($acao == 'visualizarlinha') {
    ?>

        <!-- Content Row -->
        <div class="row col-12 justify-content-md-center responsive">

            <!-- <p class="mb-5">Dados da Linha</p> -->

            <div class="col-12 col-md-10 ">
                <br>
                <h1 class="mb-4 text-gray-800 text-center text-lg-left">Dados da Linha</h1>

                <?php
                $qrDaSecao = mysqli_query($connect, "SELECT * FROM tbsecao WHERE CodLinha = '{$id}'");
                $row2 = mysqli_num_rows($qrDaSecao);

                if ($row2 > 1) {

                ?>
                    <!-- NOTIFICAÇÃO <div class="col-xl-12 col-md-12 mb-4 p-0 ">
                        <div class="card shadow col-xl-12 border-left-secondary">
                            <div class="card-body ">
                                <div class="row no-gutters align-items-center juntify-content-center ">
                                    <i class="fas fa-bell fa-2x text-gray-300"> &nbsp; </i>
                                    <?php
                                    // $qrDaLinha = mysqli_query($connect, "SELECT * FROM tblinha WHERE Id = '{$id}'");
                                    // $dado = mysqli_fetch_array($qrDaLinha);
                                    //if ($dado['Tamanho'] == '3m x 1,5m') {

                                    ?>
                                        <div id="situacao6" class="text-center text-lg-left"></div>
                                    < ? php// } else { ?>
                                        <div id="situacao" class="text-center text-lg-left"></div>
                                    <?php //} 
                                    ?>
                                </div>

                            </div>
                        </div>
                    </div>-->

                    <div class="card shadow mb-4 p-2 p-lg-5 ">
                        <div class="card-body p-0">
                            <?php
                            echo "<script> dadoT2 = new Object(); dadoU2 = new Object();</script>";
                            echo "<script> IdSecoes = []</script>";
                            echo "<script>var situacao = '';</script>";
                            echo "<script>var situacao6 = '';</script>";
                            echo "<script>var datasDasSecoes = [];</script>";


                            //echo "<script>  var count = 0;</script>";

                            $qrDaLinha = mysqli_query($connect, "SELECT * FROM tblinha WHERE Id = '{$id}'");
                            $dado = mysqli_fetch_array($qrDaLinha);
                            $CodLinhaMesclada = $dado['CodLinhaMesclada'];
                            $IdDaLinha = $dado['Id'];
                            if ($dado['Tamanho'] == '3m x 1,5m') {

                                $qrDaLinha2 = mysqli_query($connect, "SELECT * FROM tbsecao WHERE CodLinha = $IdDaLinha ORDER by DataCriacao");
                                $IdsSecoes = "";
                                $datasSecoes = "";

                                while ($dadoSecoesConsulta2 = mysqli_fetch_array($qrDaLinha2)) {
                                    $IdSecao2 = $dadoSecoesConsulta2['Id'];
                                    $IdsDasSecoes .= $dadoSecoesConsulta2['Id'] . ", ";
                                    $coordenadasT2 = "";
                                    $coordenadasU2 = "";

                                    $qrCoordenada2 = mysqli_query($connect, "SELECT * FROM tbcoordenada WHERE CodSecao = '{$IdSecao2}' ");
                                    while ($dadoCoordenada2 = mysqli_fetch_array($qrCoordenada2)) {
                                        $coordenadasT2 .= $dadoCoordenada2['Temperatura'] . ", ";
                                        $coordenadasU2 .= $dadoCoordenada2['Umidade'] . ", ";
                                    }
                                    $datasSecoes .= "'" .  date('d / m / Y', strtotime($dadoSecoesConsulta2['DataCriacao']))  . "', ";

                                    $coordenadasT2 = substr($coordenadasT2, 0, -2);
                                    $coordenadasU2 = substr($coordenadasU2, 0, -2);

                                    echo "<script>
            
            dadoT2['" .  $IdSecao2 . "'] = [" . $coordenadasT2 . "];
            dadoU2['" .  $IdSecao2 . "'] = [" . $coordenadasU2 . "];
        </script>";


                                    //passar todas as temperaturas das sessoes da linha
                                    //pegar os pontos delas
                                }
                                $datasSecoes = substr($datasSecoes, 0, -2);
                                echo "<script>datasDasSecoes =[" . $datasSecoes . "];</script>";
                                $IdsDasSecoes = substr($IdsDasSecoes, 0, -2);
                                echo "<script> IdSecoes = [" . $IdsDasSecoes . "]; </script>";


                            ?>
                                <canvas class="CanvasGeral6Pontos" style="min-height:400px" id="myChartGeral6Pontos<?php echo $id ?>"></canvas>

                            <?php

                            } else {
                                $qrDaLinha2 = mysqli_query($connect, "SELECT * FROM tbsecao WHERE CodLinha = $IdDaLinha ORDER by DataCriacao");
                                $IdsSecoes = "";
                                $datasSecoes = "";
                                while ($dadoSecoesConsulta2 = mysqli_fetch_array($qrDaLinha2)) {
                                    $IdSecao2 = $dadoSecoesConsulta2['Id'];
                                    $IdsDasSecoes .= $dadoSecoesConsulta2['Id'] . ", ";
                                    $coordenadasT2 = "";
                                    $coordenadasU2 = "";

                                    $qrCoordenada2 = mysqli_query($connect, "SELECT * FROM tbcoordenada WHERE CodSecao = '{$IdSecao2}' ");
                                    while ($dadoCoordenada2 = mysqli_fetch_array($qrCoordenada2)) {
                                        $coordenadasT2 .= $dadoCoordenada2['Temperatura'] . ", ";
                                        $coordenadasU2 .= $dadoCoordenada2['Umidade'] . ", ";
                                    }
                                    $datasSecoes .= "'" .  date('d / m / Y', strtotime($dadoSecoesConsulta2['DataCriacao']))  . "', ";
                                    // echo "<script>count++;</script>";

                                    $coordenadasT2 = substr($coordenadasT2, 0, -2);
                                    $coordenadasU2 = substr($coordenadasU2, 0, -2);

                                    echo "<script>
        dadoT2['" .  $IdSecao2 . "'] = [" . $coordenadasT2 . "];
        dadoU2['" .  $IdSecao2 . "'] = [" . $coordenadasU2 . "];
    </script>";
                                    //passar todas as temperaturas das sessoes da linha
                                    //pegar os pontos delas
                                }
                                $datasSecoes = substr($datasSecoes, 0, -2);
                                echo "<script>datasDasSecoes =[" . $datasSecoes . "];</script>";
                                $IdsDasSecoes = substr($IdsDasSecoes, 0, -2);
                                echo "<script>
        IdSecoes = [" . $IdsDasSecoes . "];
    </script>";
                            ?>
                                <!--<div id="situacao"></div>-->

                                <canvas class="CanvasGeral3Pontos" style="min-height:400px" id="myChartGeral<?php echo $id ?>"></canvas>
                            <?php

                            } ?>
                        </div>
                    </div>
                    <br />
                <?php
                } else
                    echo "<p>Para gerar o gráfico geral, é necessário no mínimo 2 seções!</p>";
                $qrDaLinha = mysqli_query($connect, "SELECT * FROM tblinha WHERE Id = '{$id}'");
                $dado = mysqli_fetch_array($qrDaLinha);


                echo "<form action='./linhas/linha-acao.php?acao=linha&id=" . $dado[' Id'] . "' method='POST'>"
                ?>

                <hr />
                <br />

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="txtNome">Nome da Linha</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input id="txtNome" name="txtNome" type="text" class="form-control" value="<?php echo $dado['NomeLinha']; ?>" readonly>
                    </div>
                </div>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="dtData">Data de Criação da Linha</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input id="dtData" name="dtData" type="date" class="form-control" value="<?php echo $dado['DataCriacao']; ?>" readonly>
                    </div>
                </div>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="slctTipoComposto">Relação C/N dos Compostos</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input name="slctTipoComposto" id="slctTipoComposto" type="text" class="form-control" value="<?php echo $dado['TipoComposto']; ?>" readonly>
                    </div>
                </div>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="slctTamanho">Tamanho da Linha</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input name="slctTamanho" id="slctTamanho" type="text" class="form-control" value="<?php echo $dado['Tamanho']; ?>" readonly>
                    </div>
                </div>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="txtLocal">Localização</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input id="txtLocal" name="txtLocal" type="text" class="form-control" value="<?php echo $dado['Local']; ?>" readonly>
                    </div>
                </div>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="slctEstagio">Estágio da Linha</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input name="slctEstagio" id="slctEstagio" type="text" class="form-control" value="<?php echo $dado['Estagio']; ?>" readonly>
                    </div>
                </div>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="txtDescricao">Descrição</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <textarea class="form-control" name="txtDescricao" id="txtDescricao" rows="6" readonly><?php echo $dado['Descricao']; ?></textarea>
                    </div>
                </div>

                <br />
                </form>
                <hr />
                <br />

                <h1 class="mb-4 text-gray-800 text-center text-lg-left">Seções da Linha</h1>

                <?php
                $sqlLinhas = mysqli_query($connect, "SELECT * FROM tbsecao WHERE CodLinha = $id");
                $row = mysqli_num_rows($sqlLinhas);

                if ($row > 0) {
                ?>
                    <div class="card shadow mb-2">
                        <div class="col-md-12 pt-3">
                            <div class="table-responsive pt-0">
                                <table class="exibe-dados-sem-paginacao table table-hover  table-bordered" id="dataTable" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Posição na Linha</th>
                                            <th>Data de Criação</th>
                                            <th>Responsável</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        echo "<script>dadoT = new Object(); dadoU = new Object();</script>";

                                        $qrLinhas = mysqli_query($connect, "SELECT * FROM tbsecao WHERE CodLinha = $id ORDER by PosicaoLinha");
                                        while ($dadoSecoesConsulta = mysqli_fetch_array($qrLinhas)) {
                                            $IdSecao = $dadoSecoesConsulta['Id'];
                                            $Data = $dadoSecoesConsulta['DataCriacao'];
                                            $Posicao = $dadoSecoesConsulta['PosicaoLinha'];
                                            $NomeFuncionario = $dadoSecoesConsulta['NomeFuncionario'];
                                            $coordenadasT = "";
                                            $coordenadasU = "";

                                            $qrCoordenada = mysqli_query($connect, "SELECT * FROM tbcoordenada WHERE CodSecao = '{$IdSecao}' ");

                                            while ($dadoCoordenada = mysqli_fetch_array($qrCoordenada)) {

                                                $coordenadasT .= $dadoCoordenada['Temperatura'] . ", ";
                                                $coordenadasU .= $dadoCoordenada['Umidade'] . ", ";
                                            }
                                            $coordenadasT = substr($coordenadasT, 0, -2);
                                            $coordenadasU = substr($coordenadasU, 0, -2);


                                            modalExcluirSecao($IdSecao);
                                            modalGrafico3Pontos($IdSecao);
                                            modalGrafico6Pontos($IdSecao);
                                            // echo "<script>window.onload = function () {teste(" . $IdSecao . ")};</script>";

                                            echo "<script>dadoT['" .  $IdSecao . "']=[" . $coordenadasT . "];dadoU['" .  $IdSecao . "']=[" . $coordenadasU . "];</script>";


                                        ?>
                                            <?php
                                            $qr = mysqli_query($connect, "SELECT * FROM tblinha WHERE Id = '$id'");
                                            $dado = mysqli_fetch_array($qr);
                                            if ($dado['Tamanho'] == '3m x 1,5m') {
                                                echo "
                                                    <tr id= '" . $IdSecao . "' >
                                                        <td>" . $Posicao . "</td>
                                                        <td>" . date('d / m / Y', strtotime($Data)) . "</td>
                                                        <td>" . $NomeFuncionario . "</td>
                                                        <td> " ?> <button class='btn btn-sm btn-block gerarGrafico6Pontos' style="background: #00882d; color:white;" data-toggle='modal' data-target='#ModalGrafico6<?php echo $IdSecao ?>'> <i class="fas fa-chart-line"></i> Gráfico</button> <?php "</td>
                            
                                                    </tr>      
                                                ";
                                                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                                                                echo "
                                                <tr id= '" . $IdSecao . "' >
                                                    <td>" . $Posicao . "</td>
                                                    <td>" . date('d / m / Y', strtotime($Data)) . "</td>
                                                    <td>" . $NomeFuncionario . "</td>
                                                    <td> " ?> <button class='btn btn-sm btn-block gerarGrafico3Pontos ' style="background: #00882d; color:white;" data-toggle='modal' data-target='#ModalGrafico2<?php echo $IdSecao ?>'> <i class="fas fa-chart-line "></i> Gráfico</button> <?php "</td>
                                                </tr>      
                                            ";
                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                                                ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <p>Esta linha não possui seções cadastradas!</p>
                    <?php if ($dado['Estagio'] != "Curado") {
                        echo "<p><b><a href='./index.php?p=secoes&acao=cadastrarsecao&id=" . $dado['Id'] . "' class='text-primary'>Clique aqui</a></b> para cadastrar uma nova seção.</p>";
                    } ?>
                <?php } ?>
                <br />
                <hr />
                <br />

                <h1 class="mb-4 text-gray-800 text-center text-lg-left">Linha Mesclada</h1>
                <?php
                $qrDaLinha = mysqli_query($connect, "SELECT * FROM tblinha WHERE Id = '{$id}'");
                $dado = mysqli_fetch_array($qrDaLinha);
                $CodLinhaMesclada = $dado['CodLinhaMesclada'];
                if ($CodLinhaMesclada > 0) { ?>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="exibe-dados table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nome da Linha</th>
                                            <th>Tipo do Composto</th>
                                            <th>Local</th>
                                            <th>Data de Criação</th>
                                            <th>Seções Cadastradas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //Retornando os dados de cada linha cadastrada
                                        $qr = mysqli_query($connect, "SELECT * FROM tblinha WHERE Id = $CodLinhaMesclada");
                                        while ($dado = mysqli_fetch_array($qr)) {
                                            $nomeLinha = $dado['NomeLinha'];
                                            $tipoComposto = $dado['TipoComposto'];
                                            $local = $dado['Local'];
                                            $data = $dado['DataCriacao'];
                                            $id = $dado['Id'];
                                            $dadoSecao = 0;
                                            //select count(nome) from Produtos where nome is null; 
                                            $qrLinhas = mysqli_query($connect, "SELECT * FROM tbsecao WHERE CodLinha = $id");
                                            while ($dadoSessoesConsulta = mysqli_fetch_array($qrLinhas)) {
                                                # code...
                                                $dadoSecao += 1;
                                            }
                                            if ($dadoSecao == 0 || $dadoSecao == null) {
                                                $dadoSecao = 'Nenhuma seção cadastrada!';
                                            } else if ($dadoSecao == 1)
                                                $dadoSecao = "$dadoSecao seção cadastrada";
                                            else
                                                $dadoSecao = "$dadoSecao seções cadastradas";

                                            $borda = 'border-left-success';


                                            echo "
                                                    <tr>
                                                        <td class='$borda'>
                                                            " . $dado['NomeLinha'] . " 
                                                            <br />
                                                                <div style='font-size: 13px;'>
                                                                    <a href='./index.php?p=linhas&acao=visualizarlinha&id=" . $dado['Id'] . "'>Ver informações</a> 
                                                                </div>
                                                        </td>
                                                        <td>" . $dado['TipoComposto'] . "</td>
                                                        <td>" . $dado['Local'] . "</td>
                                                        <td>" . date('d / m / Y', strtotime($dado['DataCriacao'])) . "</td>
                                                        <td>" . $dadoSecao . "</td>
                                                    </tr>      
                                                ";
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <p class="mb-5">Esta linha é nova e não possui uma mesclagem com outra linha.</p>
                <?php
                }
                ?>
            </div>
        </div>

    <?php
    } else if ($acao == 'excluirlinha') {

    ?>

        <h1 class="h3 mb-3 text-gray-800">Excluir linha</h1>
        <p class="mb-5">Tem certeza de que deseja excluir esta linha?</p>

        <div class="row">

            <div class="col-12">
                <?php
                $qr = mysqli_query($connect, "SELECT * FROM tblinha WHERE Id ='{$id}'");
                $dado = mysqli_fetch_array($qr);

                echo "<form action='./linhas/linha-acao.php?acao=excluirlinha&id=" . $dado['Id'] . "' method='POST'>"
                ?>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <?php
                        echo "Nome: " . $dado['NomeLinha'];
                        ?>
                    </div>
                </div>
                <div class="form-row align-items-center">
                    <div class="col">
                        <button id="btnExcluir" type="submit" class="btn btn-primary">Confirmar</button>
                    </div>
                </div>

                </form>

            </div>
        </div>
    <?php
    } else if ($acao == 'finalizarlinha') {

    ?>

        <h1 class="h3 mb-3 text-gray-800">Finalizar linha</h1>
        <p class="mb-5">Tem certeza de que deseja finalizar esta linha?</p>

        <div class="row">

            <div class="col-12">
                <?php
                $qr = mysqli_query($connect, "SELECT * FROM tblinha WHERE Id ='{$id}'");
                $dado = mysqli_fetch_array($qr);
                echo "<form action='./linhas/linha-acao.php?acao=finalizarlinha&id=" . $dado['Id'] . "' method='POST'>"
                ?>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <?php
                        echo "Nome: " . $dado['NomeLinha'];
                        ?>
                    </div>
                </div>
                <div class="form-row align-items-center">
                    <div class="col">
                        <button id="btnFinalizar" type="submit" class="btn btn-primary">Confirmar</button>
                    </div>
                </div>

                </form>

            </div>
        </div>
    <?php
    }
    ?>
<?php
}
?>
<!-- Bootstrap core JavaScript-->
<?php
function modalGrafico6Pontos($IdSecao)
{ ?>
    <div class="modal  fade" id="ModalGrafico6<?php echo $IdSecao ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 100%!important; width: 100%!important;">
        <div class="d-flex justify-content-center align-items-center modal-dialog modal-lg" role="document" style="height: 100%;">
            <div class="modal-content" style="height: fat-content;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Gráfico Relacional Temperatura e Umidade</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <canvas id="myChart6Pontos<?php echo $IdSecao ?>"></canvas>

                    <br />

                </div><!-- fim do body -->
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

<?php
function modalGrafico3Pontos($IdSecao)
{ ?>
    <div class="modal  fade" id="ModalGrafico2<?php echo $IdSecao ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 100%!important; width: 100%!important;">
        <div class="d-flex justify-content-center align-items-center modal-dialog modal-lg" role="document" style="height: 100%;">
            <div class="modal-content" style="height: fat-content;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Gráfico Relacional Temperatura e Umidade</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <canvas id="myChart<?php echo $IdSecao ?>"></canvas>

                    <br />

                </div><!-- fim do body -->
                <div class="modal-footer">
                    <!-- <button class='btn btn-success ' data-toggle='modal' data-target='#ModalDados<?php echo $IdSecao ?>'> Visualizar Dados</button> -->

                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

<?php } ?>