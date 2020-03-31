// sidebar query
$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
});

// graph js 
var options = {
    series: [{
    name: 'Homework',
    data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
  }, {
    name: 'Attendance',
    data: [76, 85, 91, 98, 87, 95, 91, 100, 94]
  }, {
    name: 'Performance',
    data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
  }],
    chart: {
    type: 'bar',
    height: 250
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: '55%',
      endingShape: 'rounded'
    },
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    show: true,
    width: 2,
    colors: ['transparent']
  },
  xaxis: {
    categories: ['Sub1', 'Sub2', 'Sub3', 'Sub4', 'Sub5'],
  },
//   yaxis: {
//     title: {
//       text: '$ (thousands)'
//     }
//   },
  fill: {
    opacity: 1
  },
  tooltip: {
    y: {
      formatter: function (val) {
        return "$ " + val + " thousands"
      }
    }
  }
  };

  var chart = new ApexCharts(document.querySelector("#chart"), options);
  chart.render();