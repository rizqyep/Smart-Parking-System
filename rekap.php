
<?php
$connection = new mysqli("localhost","root","","parking");

?>




<!DOCTYPE html>
<html lang="en">
<head>

    <title>Smart Parking System</title>
    
    <link rel="stylesheet" href="bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png"/>
    <link rel="stylesheet" href="css/data.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Cabin|Cinzel|Gudea|Supermercado+One&display=swap" rel="stylesheet">
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg fixed-top">
                <a class="navbar-brand" href="#">Smart Parking</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                      <a class="nav-link" href="landing.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="rekap.php">Data</a>
                    </li>
                  </ul>
                
              </nav>


<div class ="content">
<h1 id = "table-title">Parking Data</h1>
<table class = "table-bordered">
    <thead >
        <tr>
          <th>No</th>
          <th>Plate Number</th>
          <th>In</th>
          <th>Out</th>
          <th>Parking Charge</th>
          <th>Status</th>
         
        </tr>
    </thead>
    <tbody>
    <tr>
      <?php $num = 1;?>
      <?php $take = $connection->query("SELECT * from datapark");?>
      <?php while($each = $take->fetch_assoc()){?>
      <td><?php echo $num;?></td>
      <td><?php echo $isi['platenum'];?></td>
      <td><?php echo $isi['intime'];?></td>
      <td><?php echo $isi['outtime'];?></td>
      <td><?php echo $isi['price'];?></td>
      <td><?php if($isi['price'] == 0){
          echo "Not Paid";
      }
      else{
        echo"Paid";
        }?></td>
    </tr>
  <?php $num++; } ?>
    </tbody>
<table>
</div>
</body>
</html>



