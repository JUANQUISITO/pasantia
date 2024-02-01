// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Informatica", "Mecanica", "Electronica", "Electrica", "Química", "Metalurgia, Siderurgia", "Industrial Textil"],
    datasets: [{
      data: [100, 500, 50, 159, 80, 90, 300],
      backgroundColor: ['#007bff', '#dc3545', '#FFF410', '#41E04F','#E256D0','#48EBFD','#FF9310'],
    }],
  },
});
