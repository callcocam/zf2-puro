function ret(data) {
    var valores = [];
    $.each(data, function (index, val) {
        valores.push(val);
    });
    return valores;
}
//-------------
//- PIE CHART -
//-------------
// Get context with jQuery - using jQuery's .get() method.
function pieChart(dados,chats)
{
    var pieChartCanvas = $(chats).get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = dados;
    var pieOptions = {
        //Boolean - Whether we should show a stroke on each segment
        segmentShowStroke: true,
        //String - The colour of each segment stroke
        segmentStrokeColor: "#fff",
        //Number - The width of each segment stroke
        segmentStrokeWidth: 1,
        //Number - The percentage of the chart that we cut out of the middle
        percentageInnerCutout: 50, // This is 0 for Pie charts
        //Number - Amount of animation steps
        animationSteps: 100,
        //String - Animation easing effect
        animationEasing: "easeOutBounce",
        //Boolean - Whether we animate the rotation of the Doughnut
        animateRotate: true,
        //Boolean - Whether we animate scaling the Doughnut from the centre
        animateScale: false,
        //Boolean - whether to make the chart responsive to window resizing
        responsive: true,
        // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio: false,
        //String - A legend template
        legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
        //String - A tooltip template
        tooltipTemplate: "<%=value %> <%=label%> users"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);
}
//-----------------
//- END PIE CHART -
//-----------------

//-------------
//- BAR CHART -
//-------------

function barChart(dados, chart)
{
   var ctx, data, myBarChart, option_bars;
    Chart.defaults.global.responsive = true;
    ctx = $(chart).get(0).getContext('2d');
    ctx.canvas.height = 250;
    ctx.canvas.width = 684;
    option_bars = {
        scaleBeginAtZero: true,
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        scaleShowHorizontalLines: true,
        scaleShowVerticalLines: false,
        barShowStroke: true,
        barStrokeWidth: 1,
        barValueSpacing: 2,
        barDatasetSpacing: 2,
        legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
    };
    data = {
        labels: Object.keys(dados),
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26, 188, 156,0.6)",
                strokeColor: "#1ABC9C",
                pointColor: "#1ABC9C",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "#1ABC9C",
                data: ret(dados)
            }
        ]
    };
    myBarChart = new Chart(ctx).Bar(data, option_bars);
}

function myLineChart(dados,chats)
{
var ctx, data, myLineChart, options;
    Chart.defaults.global.responsive = true;
    ctx = $(chats).get(0).getContext('2d');
    ctx.canvas.height = 250;
    ctx.canvas.width = 684;
    options = {
        showScale: true,
        scaleShowGridLines: false,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 0,
        scaleShowHorizontalLines: false,
        scaleShowVerticalLines: true,
        bezierCurve: false,
        bezierCurveTension: 0.4,
        pointDot: false,
        pointDotRadius: 0,
        pointDotStrokeWidth: 2,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 4,
        datasetFill: true,
        legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
    };

    data = {
        labels: Object.keys(dados),
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(34, 167, 240,0.2)",
                strokeColor: "#22A7F0",
                pointColor: "#22A7F0",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "#22A7F0",
                data: ret(dados)
            }
        ]
    };
    myLineChart = new Chart(ctx).Line(data, options);
}