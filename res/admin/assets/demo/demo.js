demo = {
  initPickColor: function() {
    $('.pick-class-label').click(function() {
      var new_class = $(this).attr('new-class');
      var old_class = $('#display-buttons').attr('data-class');
      var display_div = $('#display-buttons');
      if (display_div.length) {
        var display_buttons = display_div.find('.btn');
        display_buttons.removeClass(old_class);
        display_buttons.addClass(new_class);
        display_div.attr('data-class', new_class);
      }
    });
  },

  initChartsPages: function() {
    chartColor = "#FFFFFF";

    ctx = document.getElementById('chartHours').getContext("2d");

    myChart = new Chart(ctx, {
      type: 'line',

      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "nov", "dec"],
        datasets: [{
            borderColor: "#6bd098",
            backgroundColor: "#6bd098",
            pointRadius: 0,
            pointHoverRadius: 0,
            borderWidth: 3,
            data: [parseInt(ln_app.el.jan.dataset.qntd), 
              parseInt(ln_app.el.feb.dataset.qntd), 
              parseInt(ln_app.el.mar.dataset.qntd), parseInt(ln_app.el.apr.dataset.qntd), 
              parseInt(ln_app.el.may.dataset.qntd), 
              parseInt(ln_app.el.jun.dataset.qntd), 
              parseInt(ln_app.el.jul.dataset.qntd), 
              parseInt(ln_app.el.aug.dataset.qntd), 
              parseInt(ln_app.el.sep.dataset.qntd), 
              parseInt(ln_app.el.oct.dataset.qntd), 
              parseInt(ln_app.el.nov.dataset.qntd), parseInt(ln_app.el.dec.dataset.qntd)]
          }
          // {
          //   borderColor: "#f17e5d",
          //   backgroundColor: "#f17e5d",
          //   pointRadius: 0,
          //   pointHoverRadius: 0,
          //   borderWidth: 3,
          //   data: [320, 340, 365, 360, 370, 385, 390, 384, 408, 420, 300, 300]
          // },
          // {
          //   borderColor: "#fcc468",
          //   backgroundColor: "#fcc468",
          //   pointRadius: 0,
          //   pointHoverRadius: 0,
          //   borderWidth: 3,
          //   data: [370, 394, 415, 409, 425, 445, 460, 450, 478, 484, 300, 300]
          // }
        ]
      },
      options: {
        legend: {
          display: false
        },

        tooltips: {
          enabled: false
        },

        scales: {
          yAxes: [{

            ticks: {
              fontColor: "#9f9f9f",
              beginAtZero: false,
              maxTicksLimit: 5,
              //padding: 20
            },
            gridLines: {
              drawBorder: false,
              zeroLineColor: "#ccc",
              color: 'rgba(255,255,255,0.05)'
            }

          }],

          xAxes: [{
            barPercentage: 1.6,
            gridLines: {
              drawBorder: false,
              color: 'rgba(255,255,255,0.1)',
              zeroLineColor: "transparent",
              display: false,
            },
            ticks: {
              padding: 20,
              fontColor: "#9f9f9f"
            }
          }]
        },
      }
    });


    ctx = document.getElementById('chartEmail').getContext("2d");

    myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: [1, 2, 3],
        datasets: [{
          label: "Emails",
          pointRadius: 0,
          pointHoverRadius: 0,
          backgroundColor: [
            '#e3e3e3',
            '#4acccd',
            '#fcc468',
            'orange'
          ],
          borderWidth: 0,
          data: [parseInt(ln_app.el.postsQntChart.innerText),
            parseInt(ln_app.el.filesQntdChart.innerText),
            parseInt(ln_app.el.usersQntdChart.innerText), 0]
        }]
      },

      options: {

        legend: {
          display: false
        },

        pieceLabel: {
          render: 'percentage',
          fontColor: ['white'],
          precision: 2
        },

        tooltips: {
          enabled: false
        },

        scales: {
          yAxes: [{

            ticks: {
              display: false
            },
            gridLines: {
              drawBorder: false,
              zeroLineColor: "transparent",
              color: 'rgba(255,255,255,0.05)'
            }

          }],

          xAxes: [{
            barPercentage: 1.6,
            gridLines: {
              drawBorder: false,
              color: 'rgba(255,255,255,0.1)',
              zeroLineColor: "transparent"
            },
            ticks: {
              display: false,
            }
          }]
        },
      }
    });

  }


  

};