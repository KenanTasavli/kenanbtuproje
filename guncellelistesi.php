<?php 
   //oturumu başlat 
   
   session_start(); 
   
   //eğer username adlı oturum değişkeni yok ise  
   
   //login sayfasına yönlendir 
   
   if ( !isset($_SESSION['username']) ) { 
   
     header("Location: _login.php"); 
   
     exit(); 
   
    } 
   

//mysql baglanti kodunu ekliyoruz
include("mysqlbaglan.php");

//sorguyu hazirliyoruz
$sql = "SELECT * FROM randevular";

//sorguyu veritabanina gönderiyoruz.
$cevap = mysqli_query($baglanti,$sql);

//eger cevap FALSE ise hata yazdiriyoruz.      
if(!$cevap ){
    echo '<br>Hata:' . mysqli_error($baglanti);
}

//veritabani baglantisini kapatiyoruz.
mysqli_close($baglanti);
?>
<html>
<head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">   
   <meta http-equiv="Content-Type" content="text/html;  
      charset=UTF-8" />
   </head>
<div class="container ">
            <h1  class="text-info">Diş Hekimi Randevu Otomasyonu</h1>
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
         <ul class="navbar-nav mr-auto">
         <li class="nav-item ">
            <a class="nav-link" href="index.php">Anasayfa <span class="sr-only">(current)</span></a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="kayitformu.php">Randevu Oluştur</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="listele.php">Randevuları Listele</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="silmelistesi.php">Randevu Sil</a>
         </li>
         <li class="nav-item">
            <a class="nav-link active" href="guncellelistesi.php">Randevu Güncelle</a>
         </li>
         </ul>
         <span class="nav-link">
         <a href='_logout.php'>[Oturumu Kapat]</a> 
      </span>
      </div>
      </nav>
      <?php
      echo "<table class='table'>";
      echo "<thead class='thead-light'><tr><th scope='col'>Randevu ID</th><th scope='col'>Adı</th><th scope='col'>Soyadı</th><th scope='col'>Telefon Numarası</th><th scope='col'>Tarih</th><th scope='col'>Saat</th><th scope='col'>Şikayet</th></tr></thead>";
      
      
      //veritabanından gelen cevabı satır satır alıyoruz.
      while($gelen=mysqli_fetch_array($cevap))
      {
          // veritabanından gelen değerlerle tablo satırları oluşturalım
          echo "<tbody><tr><th scope='row'>".$gelen['randevu_id']."</th>";
          echo "<td>".$gelen['ad']."</td>";
          echo "<td>".$gelen['soyad']."</td>";
          echo "<td>".$gelen['telno']."</td>";
          echo "<td>".$gelen['tarih']."</td>";
          echo "<td>".$gelen['saat']."</td>";
          echo "<td>".$gelen['sikayet']."</td>";
          echo "<td><a href=guncelle.php?id=";
          echo $gelen['randevu_id'];
          echo ">Güncelle</a></td></tr></tbody>";  
         
      }
      // tablo kodunu bitirelim.
      echo "</table>";
      ?>
   </div>
</html>