$( document ).ready(function() {
   var data = {
    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
    datasets: [
      {
          label: "New",
          fillColor: "#66BAB7",
          strokeColor: "#66BAB7",
          highlightFill: "rgba(102, 186, 183,.5)",
          highlightStroke: "rgba(102, 186, 183,.5)",
          data: [65, 59, 80, 81, 56]
      },
      {
          label: "Return",
          fillColor: "#a1acb8",
          strokeColor: "#a1acb8",
          highlightFill: "rgba(161,172,184,.5)",
          highlightStroke: "rgba(161,172,184,.5)",
          data: [28, 48, 40, 19, 86]
      }
    ]
  };
  var options =
    {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero : true,

      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines : true,

      //String - Colour of the grid lines
      scaleGridLineColor : "rgba(0,0,0,.05)",

      //Number - Width of the grid lines
      scaleGridLineWidth : 1,

      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,

      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,

      //Boolean - If there is a stroke on each bar
      barShowStroke : false,

      //Number - Pixel width of the bar stroke
      barStrokeWidth : 0,

      //Number - Spacing between each of the X value sets
      barValueSpacing : 5,

      //Number - Spacing between data sets within X values
      barDatasetSpacing : 1,

      legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
  }
  var ctx  = document.getElementById("demo-bar-chart").getContext("2d");
  var myNewChart = new Chart (ctx).Bar(data, options);
  if ($('#demo-bar-chart-legend').length) {
    $('#demo-bar-chart-legend').innerHTML = myNewChart.generateLegend();
  }

});
