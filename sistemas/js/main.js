var termofila = [];
var mesofila = [];
var inicial = [];
jQuery(function ($) {


    function geraVetorTemperatura3Pontos() {
        var temperatura = [];
        var count = IdSecoes.length;
        for (var i = 0; i < count; i++) {
            temperatura.push(dadoT2[IdSecoes[i]][1]);
        }

        return temperatura;
    }
    function geraVetorUmidade3Pontos() {
        var umidade = [];
        var count = IdSecoes.length;
        for (var i = 0; i < count; i++) {
            umidade.push(dadoU2[IdSecoes[i]][1]);
        }
        return umidade;
    }

    function geraVetorTemperatura6Pontos() {
        var temperatura = [];
        var count = IdSecoes.length;
        for (var i = 0; i < count; i++) {
            temperatura.push(dadoT2[IdSecoes[i]][2]);
        }

        return temperatura;
    }
    function geraVetorUmidade6Pontos() {
        var umidade = [];
        var count = IdSecoes.length;
        for (var i = 0; i < count; i++) {
            umidade.push(dadoU2[IdSecoes[i]][2]);
        }
        return umidade;
    }

    function mediaU(indice) {
        var media = 0;
        var count = IdSecoes.length;
        for (var i = 0; i < count; i++) {
            media += dadoU2[IdSecoes[i]][indice];
        }
        media = media / count;
        return media;
    }
    function gravar6() {
        var div = document.getElementById("situacao6");
        div.innerText = situacao6;
    }
    function gravar() {
        var div = document.getElementById("situacao");
        div.innerText = situacao;
    }

    $(document).ready(function () { // sempre que carregar a página
        //console.log("oi!");
        if ($(".CanvasGeral3Pontos").length > 0) {
            gerarGraficoGeral3Pontos();
            gravar();
        }

        if ($(".CanvasGeral6Pontos").length > 0) {
            gerarGraficoGeral6Pontos();
            gravar6();
        }
    });



    function gerarGraficoGeral3Pontos() {
        var id = $(".CanvasGeral3Pontos")[0].id;
        id = id.replace("myChartGeral", "");
        var temperatura = [];
        temperatura = geraVetorTemperatura3Pontos();
        var umidade = [];
        umidade = geraVetorUmidade3Pontos();
        count = temperatura.length;
        for (var j = 0; j < count; j++) {
            termofila.push(60);
            mesofila.push(40);
            inicial.push(20);
        }
        graficoGeral3Pontos(id, temperatura, umidade, datasDasSecoes);
    }

    function gerarGraficoGeral6Pontos() {
        var id = $(".CanvasGeral6Pontos")[0].id;
        id = id.replace("myChartGeral6Pontos", "");
        var temperatura = [];
        temperatura = geraVetorTemperatura6Pontos();
        var umidade = [];
        umidade = geraVetorUmidade6Pontos();
        count = temperatura.length;
        for (var j = 0; j < count; j++) {
            termofila.push(60);
            mesofila.push(40);
            inicial.push(20);
        }
        graficoGeral6Pontos(id, temperatura, umidade, datasDasSecoes);

    }


    function transfereDadosTemperatura3(dadoT, id) {
        dadoT[id][3] = dadoT[id][0];
        dadoT[id][0] = dadoT[id][1];
        dadoT[id][1] = dadoT[id][3];
        return dadoT[id];

    }
    function transfereDadosUmidade3(dadoU, id) {
        dadoU[id][3] = dadoU[id][0];
        dadoU[id][0] = dadoU[id][1];
        dadoU[id][1] = dadoU[id][3];
        return dadoU[id];
    }

    function transfereDadosTemperatura6(dadoT, id) {
        dadoT[id][6] = dadoT[id][0]; //auxiliar
        dadoT[id][0] = dadoT[id][2]; //3 - [0]
        dadoT[id][1] = dadoT[id][1];//2 - [1]
        dadoT[id][2] = dadoT[id][3];//4 - [2]
        dadoT[id][7] = dadoT[id][3]; //auxiliar
        dadoT[id][3] = dadoT[id][6];//1 - [3]
        return dadoT[id];

    }
    function transfereDadosUmidade6(dadoU, id) {
        dadoU[id][6] = dadoU[id][0]; //auxiliar
        dadoU[id][0] = dadoU[id][2]; //3 - [0]
        dadoU[id][1] = dadoU[id][1];//2 - [1]
        dadoU[id][2] = dadoU[id][3];//4 - [2]
        dadoU[id][7] = dadoU[id][3]; //auxiliar
        dadoU[id][3] = dadoU[id][6];//1 - [3]
        return dadoU[id];
    }

    $(".gerarGrafico3Pontos").click(function () {
        var id = $(this).parents("tr")[0].id;
        dadoT[id] = transfereDadosTemperatura3(dadoT, id);
        dadoU[id] = transfereDadosUmidade3(dadoU, id);
        graficoSecao3Pontos(id, dadoT[id], dadoU[id]);
    })


    $(".gerarGrafico6Pontos").click(function () {
        var id = $(this).parents("tr")[0].id;
        dadoT[id] = transfereDadosTemperatura6(dadoT, id);
        dadoU[id] = transfereDadosUmidade6(dadoU, id);
        graficoSecao6Pontos(id, dadoT[id], dadoU[id]);
    })

    /* $(".gerarGraficoGeral3Pontos").click(function () {
         var id = $(this).parents("tr")[0].id;
         graficoGeral3Pontos(id, dadoT[id], dadoU[id]);
     })*/

})



function graficoGeral6Pontos(id, dadoT, dadoU) {

    const ctx = document.getElementById('myChartGeral6Pontos' + id).getContext("2d")


    // const gradient = ctx.createLinearGradient(0, 180, 0, 10)
    // gradient.addColorStop(0, '#3cc94f')
    // gradient.addColorStop(1, '#299137')
    const labels = datasDasSecoes

    const data = { //os dados que mudam
        labels,
        datasets: [{
            label: 'Temperatura',
            backgroundColor: '#ff9c00',
            borderColor: '#ff9c00',
            data: dadoT,
            fill: false,
            tension: 0.2
            //backgroundColor: gradient
        },
        {
            label: 'Umidade',
            backgroundColor: '#adcded',
            borderColor: '#adcded',
            data: dadoU,
            fill: false,
            tension: 0.2
            //backgroundColor: gradient
        }, {
            label: 'Fase Termófila',
            backgroundColor: 'red',
            borderColor: 'red',
            data: termofila,
            fill: false,
            borderDash: [10, 5],
            tension: 0.2
            //backgroundColor: gradient
        }, {
            label: 'Fase Mesófila',
            backgroundColor: '#d6d6d6',
            borderColor: '#d6d6d6',
            data: mesofila,
            fill: false,
            borderDash: [10, 5],
            tension: 0.2
            //backgroundColor: gradient
        }, {
            label: 'Estágio Inicial ',
            backgroundColor: '#d6d6d6',
            borderColor: '#d6d6d6',
            data: inicial,
            fill: false,
            borderDash: [10, 5],
            tension: 0.2
            //backgroundColor: gradient
        }]
    }

    const config = {
        type: 'line',
        data: data,
        options: {
            maintainAspectRatio: false,
            plugins: {
                title: {

                    display: true,
                    text: 'Gráfico Geral da Linha Baseado nos Pontos de Maior Temperatura',
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                }
            },
            interaction: {
                mode: 'nearest'
            },
            responsive: true,
            radius: 4,
            hoverRadius: 10,
            scales: {
                y: {
                    ticks: {
                        callback: function (value) {
                            return value
                        }

                    }
                }
            }
        }
    };
    const mychart = new Chart(ctx, config)
}


function graficoGeral3Pontos(id, dadoT, dadoU) {

    const ctx = document.getElementById('myChartGeral' + id).getContext("2d")
    const gradient = ctx.createLinearGradient(0, 180, 0, 400)
    gradient.addColorStop(0, '#3cc94f')
    gradient.addColorStop(1, '#299137')
    const labels = datasDasSecoes

    const data = { //os dados que mudam
        labels,
        datasets: [{
            label: 'Temperatura',
            backgroundColor: '#ff9c00',
            borderColor: '#ff9c00',
            data: dadoT,
            fill: false,
            tension: 0.2
            //backgroundColor: gradient
        },
        {
            label: 'Umidade',
            backgroundColor: '#adcded',
            borderColor: '#adcded',
            data: dadoU,
            fill: false,
            tension: 0.2
            //backgroundColor: gradient
        }, {
            label: 'Fase Termófila',
            backgroundColor: 'red',
            borderColor: 'red',
            data: termofila,
            fill: false,
            borderDash: [10, 5]
            //backgroundColor: gradient
        }, {
            label: 'Fase Mesófila',
            backgroundColor: '#d6d6d6',
            borderColor: '#d6d6d6',
            data: mesofila,
            fill: false,
            borderDash: [10, 5]
            //backgroundColor: gradient
        }, {
            label: 'Estágio Inicial ',
            backgroundColor: '#d6d6d6',
            borderColor: '#d6d6d6',
            data: inicial,
            fill: false,
            borderDash: [10, 5]
            //backgroundColor: gradient
        }]
    }

    const config = {
        type: 'line',
        data: data,
        options: {
            maintainAspectRatio: false,
            plugins: {
                title: {

                    display: true,
                    text: 'Gráfico Geral da Linha Baseado nos Pontos de Maior Temperatura',
                    padding: {
                        top: 10,
                        bottom: 30
                    },
                    font: {
                        size: 23
                    }
                }
            },
            interaction: {
                mode: 'nearest'
            },
            responsive: true,
            radius: 4,
            hoverRadius: 10,
            scales: {
                y: {
                    ticks: {
                        callback: function (value) {
                            return value
                        }
                    }
                }
            }
        }
    };
    const mychart = new Chart(ctx, config)

}


function graficoSecao3Pontos(id, dadoT, dadoU) {

    const ctx = document.getElementById('myChart' + id).getContext("2d")


    const gradient = ctx.createLinearGradient(0, 180, 0, 400)
    gradient.addColorStop(0, '#3cc94f')
    gradient.addColorStop(1, '#299137')
    const labels = [ //parte de baixo, usa como referência
        'Ponto 2',
        'Ponto 1',
        'Ponto 3'
    ]

    const data = { //os dados que mudam
        labels,
        datasets: [{
            label: 'Temperatura',
            backgroundColor: '#ff9c00',
            borderColor: '#ff9c00',
            data: dadoT,
            fill: false,
            tension: 0.2
            //backgroundColor: gradient
        },
        {
            label: 'Umidade',
            backgroundColor: '#adcded',
            borderColor: '#adcded',
            data: dadoU,
            fill: false,
            tension: 0.2
            //backgroundColor: gradient
        }, {
            label: 'Fase Termófila',
            backgroundColor: 'red',
            borderColor: 'red',
            data: [60, 60, 60],
            fill: false,
            borderDash: [10, 5],

            //backgroundColor: gradient
        }, {
            label: 'Fase Mesófila',
            backgroundColor: '#d6d6d6',
            borderColor: '#d6d6d6',
            data: [40, 40, 40],
            fill: false,
            borderDash: [10, 5]
            //backgroundColor: gradient
        }, {
            label: 'Estágio Inicial ',
            backgroundColor: '#d6d6d6',
            borderColor: '#d6d6d6',
            data: [20, 20, 20],
            fill: false,
            borderDash: [10, 5]
            //backgroundColor: gradient
        }]
    }

    const config = {
        type: 'line',
        data: data,
        options: {
            interaction: {
                mode: 'nearest'
            },

            responsive: true,
            radius: 4,
            hoverRadius: 10,
            scales: {
                y: {
                    ticks: {
                        callback: function (value) {
                            return value
                        }
                    }
                }
            }
        }
    };
    const mychart = new Chart(ctx, config)

}


function graficoSecao6Pontos(id, dadoT, dadoU) {

    const ctx = document.getElementById('myChart6Pontos' + id).getContext("2d")


    const gradient = ctx.createLinearGradient(0, 180, 0, 400)
    gradient.addColorStop(0, '#3cc94f')
    gradient.addColorStop(1, '#299137')
    const labels = [ //parte de baixo, usa como referência
        'Ponto 3',
        'Ponto 2',
        'Ponto 4',
        'Ponto 1',
        'Ponto 5',
        'Ponto 6'
    ]

    const data = { //os dados que mudam
        labels,
        datasets: [{
            label: 'Temperatura',
            backgroundColor: '#ff9c00',
            borderColor: '#ff9c00',
            data: dadoT,
            fill: false,
            tension: 0.2
            //backgroundColor: gradient
        },
        {
            label: 'Umidade',
            backgroundColor: '#adcded',
            borderColor: '#adcded',
            data: dadoU,
            fill: false,
            tension: 0.2
            //backgroundColor: gradient
        }, {
            label: 'Fase Termófila',
            backgroundColor: 'red',
            borderColor: 'red',
            data: [60, 60, 60, 60, 60, 60],
            fill: false,
            borderDash: [10, 5]
            //backgroundColor: gradient
        }, {
            label: 'Fase Mesófila',
            backgroundColor: '#d6d6d6',
            borderColor: '#d6d6d6',
            data: [40, 40, 40, 40, 40, 40],
            fill: false,
            borderDash: [10, 5]
            //backgroundColor: gradient
        }, {
            label: 'Estágio Inicial ',
            backgroundColor: '#d6d6d6',
            borderColor: '#d6d6d6',
            data: [20, 20, 20, 20, 20, 20],
            fill: false,
            borderDash: [10, 5]
            //backgroundColor: gradient
        }]
    }

    const config = {
        type: 'line',
        data: data,
        options: {
            interaction: {
                mode: 'nearest'
            },
            responsive: true,
            radius: 4,
            hoverRadius: 10,
            scales: {
                y: {
                    ticks: {
                        callback: function (value) {
                            return value
                        }
                    }
                }
            }
        }
    };
    const mychart = new Chart(ctx, config)

}