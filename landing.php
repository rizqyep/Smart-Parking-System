<?php
$koneksi = new mysqli("localhost","root","","parking");
date_default_timezone_set('Asia/Jakarta');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Smart Parking System</title>
 
    <link rel="stylesheet" href="bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/masuk.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Cabin|Cinzel|Gudea|Supermercado+One&display=swap" rel="stylesheet">
    
  </head>
  <body>

  
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="landing.php">Smart Parking</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="landing.php">Masuk <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="checkout.php">Keluar</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="rekap.php">Rekap</a>
            </li>

        </div>
      </nav>

            

        <form id = "form-container" method = "post">
          <div class="form-group">
            <div id="form-title">
            
            <h1 class = "form-title">Parking System</h1>
          </div>
          <div class="form-group">
              <input type="text" class="form-control" placeholder="No.Polisi" name = "plat" required>
          </div>
        
         <div class = "form-group">
              <input type="radio"  value = "mobil" name="kat" required>Mobil<br>
              <input type="radio" value = "motor" name="kat" required>Motor
         </div>

         <style>
          form-container{
            margin-left : 50px;
            width : 50%;
          }
         </style>
         

          <button type="submit" class="btn btn-primary" name = "masuk">Masuk</button>

         
        
        </form>

        
        



<?php
if(isset($_POST['masuk'])){
  
    $now = date('H:i:s');
    
    $koneksi->query("INSERT INTO datapark(plat,masuk,kategori) VALUES ('$_POST[plat]','$now','$_POST[kat]')");
    echo "<div class='alert alert-info'>SELAMAT DATANG ! </div>";
    echo "<meta http-equiv='refresh' content='1;url=landing.php'>";
   
}

?>

</body>
  
 
</html>