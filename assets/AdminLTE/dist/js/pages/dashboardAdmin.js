/* global Chart:false */

$(function () {
    'use strict'
    
    alert("a");
    const formatToCurrency = amount => {
        return "$" + amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
      };

    var ticksStyle = {
      fontColor: '#495057',
      fontStyle: 'bold'
    }
  
    var mode = 'index'
    var intersect = true
  
    var $payrollChart = $('#payroll-chart')
    // eslint-disable-next-line no-unused-vars
    var payrollChart = new Chart($payrollChart, {
      type: 'bar',
      data: {
        labels: ['202201', '202202', '202203', '202204'],
        datasets: [
          {
            backgroundColor: '#007bff',
            borderColor: '#007bff',
            data: [0, 0, 345814025, 345814025]
          },
          {
            backgroundColor: '#ced4da',
            borderColor: '#ced4da',
            data: [0, 0, 14720000, 14720000]
          },
          {
            backgroundColor: '#ffc107',
            borderColor: '#ffc107',
            data: [0, 0, 22750000, 22750000]
          },
          {
            backgroundColor: '#dc3545',
            borderColor: '#dc3545',
            data: [0, 0, 22750000, 22750000]
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          mode: mode,
          intersect: intersect
        },
        hover: {
          mode: mode,
          intersect: intersect
        },
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            // display: false,
            gridLines: {
              display: true,
              lineWidth: '4px',
              color: 'rgba(0, 0, 0, .2)',
              zeroLineColor: 'transparent'
            },
            ticks: $.extend({
              beginAtZero: true,
  
              // Include a dollar sign in the ticks
              callback: function (value) {
                if (value >= 1000) {
                  value /= 1000
                  value += 'k'
                }
  
                return 'Rp' + value
              }
            }, ticksStyle)
          }],
          xAxes: [{
            display: true,
            gridLines: {
              display: false
            },
            ticks: ticksStyle
          }]
        }
      }
    })
  })
  