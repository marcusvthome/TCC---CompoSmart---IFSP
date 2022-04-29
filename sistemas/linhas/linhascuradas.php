<!-- Page Heading -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
<script src="js/demo/datatables-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="path/to/chartjs/dist/Chart.js"></script>

<?php
function grafico($IdSecao)
{ ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('number', 'X');
            data.addColumn('number', 'Temperatura');
            data.addColumn('number', 'Umidade');
            data.addColumn('number', 'Media');

            data.addRows([
                <?php include('./conexao.php');
                $count = 1;
                $comma = "";
                $qr = mysqli_query($connect, "SELECT * FROM tbcoordenada WHERE CodSecao = '{$IdSecao}'");
                while ($dado = mysqli_fetch_array($qr)) {
                    $Horizontal = $dado['Horizontal'];
                    $Vertical = $dado['Vertical'];
                    $Umidade = $dado['Umidade'];
                    $Temperatura = $dado['Temperatura'];
                    $Relacao = ($Temperatura + $Umidade) / 2;

                    $Id = $dado['Id']; ?>
                    <?php echo "$comma [$count, $Temperatura, $Umidade, $Relacao] " ?>
                    <?php $comma = ","; ?>
                    <?php $count++; ?>
                <?php } ?>
            ]);

            var options = {
                width: 750,
                height: 500,
                title: 'Relação Temperatura x Umidade',
                curveType: 'function',
                legend: {
                    position: 'right'
                },
                hAxis: {
                    title: 'Ponto'
                },
                is3D: true,
                colors: ['#eb612f', '#1e82d4', '#a7a9ab'],
            };

            var chart = new google.visualization.LineChart(document.getElementById('chart_div<?php echo $IdSecao ?>'));
            chart.draw(data, options);

        }
    </script>

<?php } ?>

<?php

$acao = @$_GET['acao'];

if ($acao == "") {
?>

    <h1 class="h3 text-gray-800 text-center text-lg-left">Linhas</h1>
    <h6 class="mb-4">Selecione a linha que deseja mesclar</h6>

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
                            <th>Selecione</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //Retornando os dados de cada linha cadastrada
                        $qr = mysqli_query($connect, "SELECT * FROM tblinha WHERE Estagio = 'Curado'");
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
                                $dadoSecao = 'Nenhuma sessão cadastrada!';
                            } else if ($dadoSecao == 1)
                                $dadoSecao = "$dadoSecao sessão cadastrada";
                            else
                                $dadoSecao = "$dadoSecao sessões cadastradas";

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
                                        <td><a class='btn btn-success' type='submit' href='./index.php?p=linhascuradas&acao=mesclarlinha&id=" . $dado['Id'] . "'>Mesclar</a></td>
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

    $id = @$_GET['id'];

    if ($acao == 'mesclarlinha') {
    ?>

        <div class="modal  fade" id="ModalTamanho" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 100%!important; width: 100%!important;">
            <div class="d-flex justify-content-center align-items-center modal-dialog modal-lg" role="document" style="height: 100%;">
                <div class="modal-content" style="height: fat-content;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tamanhos das Linhas</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body justify-content-left ">
                        <div class="card-body shadow">
                            <img src="./img/300X150CM-manual.png" width="360px" alt="Base">
                            <p> Linha com 3m de base e 1,5m de altura</p>
                            <hr />
                            <img src="./img/200X100CM-manual.png" width="360px" alt="Base">
                            <p> Linha com 2m de base e 1m de altura</p>
                        </div>
                    </div><!-- fim do body -->
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Row -->
        <div class="row col-12 justify-content-md-center responsive">

            <!-- <p class="mb-5">Dados da Linha</p> -->

            <div class="col-12 col-md-10  ">
                <BR>
                <h1 class="mb-3 text-gray-800 text-center text-lg-left">Dados Nova da Linha</h1>
                <p class="mb-1">Cadastrar uma nova linha a partir da linha de origem.</p>
                <?php

                $qr = mysqli_query($connect, "SELECT * FROM tblinha WHERE Id = '{$id}'");
                $dado = mysqli_fetch_array($qr);

                echo "<form action='./linhas/linha-acao.php?acao=mesclarlinha&id=" . $dado['Id'] . "' method='POST'>"

                ?>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="txtNome">Nome da Linha <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input id="txtNome" name="txtNome" type="text" class="form-control obrigatorio" value="<?php echo $dado['NomeLinha']; ?>" required>
                    </div>
                </div>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="dtData">Data de Criação da Linha <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input id="dtData" name="dtData" type="date" class="form-control obrigatorio" value="<?php echo $dado['DataCriacao']; ?>" max="<?php echo date('Y-m-d') ?>" required>
                    </div>
                </div>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="slctTipoComposto">Relação C/N dos Compostos <span class="text-danger">*</span></label>
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
                        <label for="slctTamanho">Tamanho da Linha <span class="text-danger">*</span></label>
                    </div>
                    <button type="button" class='btn btn-secondary btn-sm' data-toggle='modal' data-target='#ModalTamanho'><i class="fa fa-question-circle "></i></button>
                    <div class="col-12 col-md-7">
                        <select name="slctTamanho" id="slctTamanho" class="form-control obrigatorio">
                            <option>3m x 1,5m</option>
                            <option>2m x 1m</option>
                        </select>

                    </div>

                </div>


                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="txtLocal">Localização <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input id="txtLocal" name="txtLocal" type="text" class="form-control obrigatorio" value="<?php echo $dado['Local']; ?>" required>
                    </div>
                </div>

                <div class="form-row align-items-center mb-4">
                    <div class="col font-weight-bold">
                        <label for="slctEstagio">Estágio da Linha <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-12 col-md-7">
                        <select name="slctEstagio" id="slctEstagio" class="form-control obrigatorio" required>
                            <option>Inicial</option>
                            <option>Semicurado</option>
                        </select>
                    </div>
                </div>

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
                        <button id="btnVeriEnviar" type="button" class="btn" style="background: #00882d; color:white;">Cadastrar</button>
                    </div>
                </div>
                <br />
                <hr />
                <br />
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