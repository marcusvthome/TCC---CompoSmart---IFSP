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
                    $Relacao = ($Temperatura + $Umidade)/2;

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
                is3D:true,
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

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 text-center text-lg-left">Histórico de Linhas</h1>
    </div>

    <div class="row">
         <!--Tickets - LINHAS CURADAS -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Estágio Curado </div>
                            <?php
                            $sql = mysqli_query($connect, "SELECT * FROM tblinha WHERE Estagio = 'Curado'");
                            $row = mysqli_num_rows($sql);

                            if ($row > 0) {
                                echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>" . $row . "</div>";
                            } else {
                                echo "0";
                            }
                            ?>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-double fa-2x text-gray-300"></i>
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
} 
?>