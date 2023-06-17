
const ctx = document.getElementById('myChartJugadores');

const options = {
  maintainAspectRatio: false,
  scales: {
    y: {
      stacked: true,
      grid: {
        display: true,
        color: "rgba(255,99,132,0.2)"
      }
    },
    x: {
      grid: {
        display: false
      }
    }
  }
};



new Chart(ctx, {
  type: 'radar',
  data: {
  labels: [
    'Gol de chilena',
    'Gol de cabeza',
    'Pases asertados',
    'Pases largos',
    'Asistencias de gol',
    'Posibilidad de gol'
  ],
  datasets: [{
    label: 'Estadísticas del jugador',
    data: [2, 4, 20, 40, 10, 15],
    fill: true,
    backgroundColor: 'rgb(20, 83, 112)',
    borderColor: 'rgb(255, 99, 132)',
    pointBackgroundColor: 'rgb(20, 112, 106 )',
    pointBorderColor: '#fff',
    pointHoverBackgroundColor: '#fff',
    pointHoverBorderColor: 'rgb(255, 99, 132)',
    ResizeObserverSize :'80'
  },]
}
});


// new Chart(ctx, {
//   type: 'radar',
//   data: {
//     labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
//     datasets: [{
//       label: '# of Votes',
//       data: [12, 19, 3, 5, 2, 3],
//       borderWidth: 1
//     }]
//   },
//   options: {
//     scales: {
//       y: {
//         beginAtZero: true
//       }
//     }
//   }
// });
chart.canvas.parentNode.style.height = '128px';
chart.canvas.parentNode.style.width = '128px';

// function beforePrintHandler () {
//   for (let id in ctx.instances) {
//     ctx.instances[id].resize();
//   }
// }
// window.addEventListener('beforeprint', () => {
//   ctx.resize(600, 600);
// });
// window.addEventListener('afterprint', () => {
//   ctx.resize();
// });

    // function update(id) {
    //     let elemento = document.getElementById(`ciudad_${id}`)
    //     let nombre = elemento.textContent

    //     document.getElementById('nombre_actualizado').value = nombre

    // }

    // function recarga(id) {
    //     let elemento = document.getElementById("nombre_actualizado")
    //     let nombre = elemento.value

    //     axios.post(`../../controller/ciudadController.php?c=3&id_ciudad=${id}&nombre=${nombre}`)
    //         .then(function(response) {
    //             window.location.reload()
    //         })
    //         .catch(function(error) {
    //             console.log(error);
    //         });
    // }
