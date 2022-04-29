<!DOCTYPE HTML>

<html>

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Page Heading -->

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>



    <title>Grafico 2</title>
</head>

<body>
    <div class="chart-container" style="position: relative; height:400px; width:1000px">
        <?php $IdLinha = 38;
        ?>
        <canvas id="myChart<?php echo $IdLinha ?>"> </canvas>
        <div id="myChart<?php echo $IdLinha ?>"></div>

    </div>



</body>

</html>
<script>
    <?php include('./conexao.php'); ?>
    const ctx = document.getElementById('myChart<?php echo $IdLinha ?>').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                <?php
                $qr = mysqli_query($connect, "SELECT * FROM tbcoordenada WHERE CodLinha = '$IdLinha'");
                while ($dado = mysqli_fetch_array($qr)) {
                    $Horizontal = $dado['Horizontal'];
                    $Vertical = $dado['Vertical'];
                    $Umidade = $dado['Umidade'];
                    $Temperatura = $dado['Temperatura'];
                    $Id = $dado['Id'];
                    echo "'$Umidade',";

                } ?>

            ],
            datasets: [
                {
                    label: 'Umidade',
                    data: [
                        <?php
                        $qr = mysqli_query($connect, "SELECT * FROM tbcoordenada WHERE CodLinha = '$IdLinha'");
                        while ($dado = mysqli_fetch_array($qr)) {
                            $Umidade = $dado['Umidade'];
                            echo "'$Umidade',";
                        } ?>
                    ],
                    borderColor: [
                        'rgb(186, 39, 39)'
                    ],

                }, {
                    label: 'Temperatura',
                    data: [
                        <?php
                        $qr = mysqli_query($connect, "SELECT * FROM tbcoordenada WHERE CodLinha = '$IdLinha'");
                        while ($dado = mysqli_fetch_array($qr)) {
                            $Temperatura = $dado['Temperatura'];
                            echo "'$Temperatura',";
                        } ?>
                    ],
                    borderColor: [
                        'rgb(13, 186, 56)'
                    ],
                    backgroundColor: 0,

                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    stacked: true
                }]
            }

        }
    });
</script>