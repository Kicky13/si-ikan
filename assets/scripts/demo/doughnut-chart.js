$( document ).ready(function() {
  var data = [
        {
            value: 300,
            color:"#2EC6C7",
            highlight: "#ccc",
            label: "New"
        },
        {
            value: 50,
            color: "#54C27B",
            highlight: "#ccc",
            label: "Return"
        },
        {
            value: 100,
            color: "#FF5287",
            highlight: "#ccc",
            label: "Other"
        }
    ]
    var options =
      {
        //Boolean - Whether we should show a stroke on each segment
        segmentShowStroke : true,

        //String - The colour of each segment stroke
        segmentStrokeColor : "#fff",

        //Number - The width of each segment stroke
        segmentStrokeWidth : 2,

        //Number - The percentage of the chart that we cut out of the middle
        percentageInnerCutout : 50, // This is 0 for Pie charts

        //Number - Amount of animation steps
        animationSteps : 100,

        //String - Animation easing effect
        animationEasing : "easeOutBounce",

        //Boolean - Whether we animate the rotation of the Doughnut
        animateRotate : true,

        //Boolean - Whether we animate scaling the Doughnut from the centre
        animateScale : false,

        //String - A legend template
        legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"

    }
    var ctx  = document.getElementById("demo-doughnut-chart").getContext("2d");
    var myNewChart = new Chart(ctx).Doughnut(data, options);
    if ($('.demo-doughnut-chart-legend').length) {
        document.getElementById('demo-doughnut-chart-legend').innerHTML = myNewChart.generateLegend();
    }
});