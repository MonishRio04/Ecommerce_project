/**
 * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
 */
var value=JSON.parse(document.getElementById('barchart').value);
// console.log(value);
const barConfig = {
  type: 'bar',
  data: {
    labels: ['January', 'February', 'March', 'April', 'May', 'June',
     'July','August','september','October','November','December'],
    datasets: [
    {
      label: 'Customer',
      backgroundColor: '#3c763d',
        // borderColor: window.chartColors.red,
      borderWidth: 1,
      data: value//[-3, 14, 52, 74, 33, 90, 70],
    },
      // {
      //   label: 'Bags',
      //   backgroundColor: '#7e3af2',
      //   // borderColor: window.chartColors.blue,
      //   borderWidth: 1,
      //   data: [66, 33, 43, 12, 54, 62, 84],
      // },
    ],
  },
  options: {
    responsive: true,
    legend: {
      display: false,
    },
    scales: {
      yAxes:[ {
        ticks:{
          min: 1,
          max: 10,
        }
      }]
    }
  },
}

const barsCtx = document.getElementById('bars')
window.myBar = new Chart(barsCtx, barConfig)



var ordervalue=JSON.parse(document.getElementById('orderbar').value);
console.log(value);
const orderBar = {
  type: 'bar',
  data: {
    labels: ['January', 'February', 'March', 'April', 'May', 'June',
     'July','August','September','October','November','December'],
    datasets: [
    {
      label: 'Customer',
      backgroundColor: '#ff5a1f',
      borderWidth: 1,
      data: ordervalue//[-3, 14, 52, 74, 33, 90, 70],
    },  ],
  },
  options: {
    responsive: true,
    legend: {
      display: false,
    },
    scales: {
      yAxes:[ {
        ticks:{
          min: 1,
          max: 10,
        }
      }]
    }
  },
}

const bar = document.getElementById('orderbarchart')
window.myBar = new Chart(bar, orderBar)



/**
 * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
 */
// const barConfig = {
//   type: 'bar',
//   data: {
//     labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
//     datasets: [
//       {
//         label: 'Customer',
//         backgroundColor: '#0694a2',
//         borderWidth: 1,
//         data: [-3, 14, 52, 74, 33, 90, 70],
//       },
//     ],
//   },
//   options: {
//     responsive: true,
//     legend: {
//       display: false,
//     },
//     scales: {
//       yAxes: [
//         {
//           ticks: {
//             min: 1,   // Set the minimum value for the y-axis
//             max: 10,  // Set the maximum value for the y-axis
//           },
//         },
//       ],
//     },
//   },
// };

// const barsCtx = document.getElementById('bars');
// window.myBar = new Chart(barsCtx, barConfig);
