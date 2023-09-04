/**
 * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
 */
var chart=JSON.parse(document.getElementById('chartvalue').value);
var days=document.getElementById('days').value;
// console.log(chart);
 var label=[];
for(var i=0;i<=days;i++){
    label.push(i);
}
const lineConfig = {
  type: 'line',
  data: {
    labels:label,    
    datasets: [
      {
        label: 'Growth',
        /**
         * These colors come from Tailwind CSS palette
         * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
         */
        backgroundColor: '#0694a2',
        borderColor: '#0694a2',
        data:chart,
        // data: [ chart.Sunday,chart.Monday,chart.Tuesday, chart.Wednesday, chart.Thursday, chart.Friday, chart.Saturday],
        fill: false,
      },

    ],

  },
  /*data: {
    labels: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
    datasets: [
      {
        label: 'Growth',       
        backgroundColor: '#0694a2',
        borderColor: '#0694a2',
        data: [ chart.Sunday,chart.Monday,chart.Tuesday, chart.Wednesday, chart.Thursday, chart.Friday, chart.Saturday],
        fill: false,
      },

    ],
    
  },*/
  options: {
    responsive: true,
    maintainAspectRatio:false,
    /**
     * Default legends are ugly and impossible to style.
     * See examples in charts.html to add your own legends
     *  */
    legend: {
      display: false,
    },
    tooltips: {
      mode: 'index',
      intersect: false,
    },
    hover: {
      mode: 'nearest',
      intersect: true,
    },
    scales: {
      x: {
        display: true,
        scaleLabel: {
          display: true,
          labelString: 'Month',
        },
      },
      y: {
        display: true,
        scaleLabel: {
          display: true,
          labelString: 'Value',
        },
      },
    },
  },
}

// change this to the id of your chart element in HMTL
const lineCtx = document.getElementById('line')
window.myLine = new Chart(lineCtx, lineConfig)
