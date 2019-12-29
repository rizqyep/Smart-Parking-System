<?php
$koneksi = new mysqli("localhost","root","","parking");
date_default_timezone_set('Asia/Bangkok');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Smart Parking</title>
 
    <link rel="stylesheet" href="bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png"/>
    <link rel="stylesheet" href="css/checkout.css">
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
   <div class = "content">
        <form id = "form-container" role ="form" method = "post">
          <div class="form-group">
            <div id="form-title">
            
            <h1 class = "form-title">Smart Parking Checkout</h1>
          </div>
          <div class="form-group">
              <input type="text" class="form-control" placeholder="Plat Mobil" name = "plat" required>
          </div>
         

          <button type="submit" class="btn btn-primary" name = "scan">Check Out</button>

          
        
        </form>
        </div>
        
        


<div class = "info">
<?php
if(isset($_POST['scan'])){
    $ambil = $koneksi->query("SELECT * FROM datapark WHERE plat = '$_POST[plat]' ");
    $isi = $ambil->fetch_assoc();
    $cocok = $ambil->num_rows;
    if($cocok==1)
    {
     
      $now = date('H:i:s');
      $keluar = strtotime($now);
      $dismasuk = $isi['masuk'];
      $masuk = strtotime($isi['masuk']);
        
      $duration = $keluar - $masuk;

      
      $x = (floor($duration/3600));
      
      if($x < 0){
        $x +=24;
      }
      else if($x == 0){
        $x+=1;
      }

      if($isi['kategori'] =="mobil"){
      $bayar = (3000 * $x) ;}
      else{
        $bayar = (2000 *$x);
      }
      echo "<div class = 'alert alert-info'>
      
      <p>Jam Masuk : $dismasuk</p>
      <p>Jam Keluar : $now</p>
      <p>Lama Parkir : $x Jam </p>
      <p></p>Total Biaya Parkir anda $bayar</p>
      </div>";
      $koneksi->query("UPDATE datapark SET keluar =now(),biaya = $bayar WHERE plat = '$_POST[plat]' "); 

      }
    else
    {
    echo "<div class = 'alert alert-danger'>Nomor Polisi Tidak Valid</div>";
    echo "<meta http-equiv='refresh' content='1;url=checkout.php'>";
    }
}

?>
</div>
 
</body>
  
 
</html>