<?php include ('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Info Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="style.css">
    
  </head>
  <body style="padding: 10px 10px 10px 10px;">
  
  <?php
    $now = new DateTime();  
  ?>  

  <div class="pagestyleInfo">
        <div class="row section1"> 
          <div class="column">
            <img src="img/Logo-rmbg.png" alt="img Logo" class="logo" style="margin-left: 0;">
          </div>
          <div class="column">
              <h2 style="float: right; margin-top: 80px;"><?php echo $now->format('Y-m-d');?></h2>
          </div>
        </div>
        <div class="row" style="margin-top: 50px;"> 
          <div class="section1 column" style="flex: 20%">
            <section class="button-menu">
              <form action="graphPage.php" method="POST">
                <input type="submit" name="submit" value="Graph" class="btn btn-primary">
              </form>
              <form action="login.html" method="POST">
                <input type="submit" name="submit2" value="Log Out" class="btn btn-primary">
              </form>
            </section>
          </div>
          <div class="column" style="flex: 80%; height: 500px;">
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Check In</th>
                                            <th scope="col">Check Out</th>
                                            <th scope="col">Guest</th>
                                            <th scope="col">Payment</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $sql = "SELECT * FROM reservasi";
                                            $query = mysqli_query ($conn, $sql);
                                            
                                            while($reservasi = mysqli_fetch_array($query)){
                                                echo "<tr>";
                                                echo "<td>".$reservasi['id']."</td>";
                                                echo "<td>".$reservasi['check_in']."</td>";
                                                echo "<td>".$reservasi['check_out']."</td>";
                                                echo "<td>".$reservasi['guest_name']."</td>";
                                                echo "<td>".$reservasi['payment_method']."</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                        </tbody>
                                    </table>
          </div>
        </div>
    </div>

  </body>
</html>