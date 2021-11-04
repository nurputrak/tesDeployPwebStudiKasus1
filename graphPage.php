<?php include ('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Graph Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    
    
  </head>
  <body style="background-color: #e6e6e6;">
    
    <div style="padding: 30px;">
      <H1 style="text-align: center; font-family: Helvetica, Sans-Serif;">Chart Data</H1>
      <div>
        <canvas id="myBarChart" class="card"></canvas>
      </div>
      <div>
        <canvas id="myPieChart" class="card"></canvas>
      </div>
    </div>

    <script>
        <?php
          $sql = "SELECT COUNT(*) AS jumlah FROM reservasi WHERE room < 6 AND room >= 1";
          $query1 = mysqli_query ($conn, $sql);
          $sql = "SELECT COUNT(*) AS jumlah FROM reservasi WHERE room < 11 AND room >= 6";
          $query2 = mysqli_query ($conn, $sql);
          $sql = "SELECT COUNT(*) AS jumlah FROM reservasi WHERE room < 16 AND room >= 11";
          $query3 = mysqli_query ($conn, $sql);
          $sql = "SELECT COUNT(*) AS jumlah FROM reservasi WHERE room < 21 AND room >= 16";
          $query4 = mysqli_query ($conn, $sql);
          $sql = "SELECT COUNT(*) AS jumlah FROM reservasi WHERE room <= 25 AND room >= 21";
          $query5 = mysqli_query ($conn, $sql);                                  
        ?>
        

        var xValues = ["01-05", "06-10", "11-15", "16-20", "21-25"];
        var yValues = [<?php while ($p1 = mysqli_fetch_array($query1)) { echo '"' . $p1['jumlah'] . '"';}?>,
                       <?php while ($p2 = mysqli_fetch_array($query2)) { echo '"' . $p2['jumlah'] . '"';}?>, 
                       <?php while ($p3 = mysqli_fetch_array($query3)) { echo '"' . $p3['jumlah'] . '"';}?>,
                       <?php while ($p4 = mysqli_fetch_array($query4)) { echo '"' . $p4['jumlah'] . '"';}?>,
                       <?php while ($p5 = mysqli_fetch_array($query5)) { echo '"' . $p5['jumlah'] . '"';}?>];
        var barColors = ["rgb(135,206,250, 0.7)",  "rgb(0,139,139, 0.7)", "rgb(173,255,47, 0.7)", "rgb(218,165,32, 0.7)", "rgb(139,0,0 , 0.7)"];

        new Chart("myBarChart", {
          type: "bar",
          data: {
            labels: xValues,
            datasets: [{
              backgroundColor: barColors,
              data: yValues
            }]
          },
          options: {
            legend: {display: false},
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true,
                  max: 7
                }
              }],
            },
            title: {
              display: true,
              text: "Bar Chart"
            }
          }
        });


        var pieColors = ["rgb(135,206,250, 0.7)",  "rgb(0,139,139, 0.7)", "rgb(173,255,47, 0.7)", "rgb(218,165,32, 0.7)", "rgb(139,0,0 , 0.7)"];
        new Chart("myPieChart", {
          type: "pie",
          data: {
            labels: xValues,
            datasets: [{
              backgroundColor: pieColors,
              data: yValues
            }]
          },
          options: {
            title: {
              display: true,
              text: "Pie Chart"
            }
          }
        });      
    </script>

  </body>
</html>