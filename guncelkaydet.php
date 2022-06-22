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

//degiskenleri formdan aliyoruz
extract($_POST);

//sorguyu hazirliyoruz
$sql ="UPDATE randevular ".
      "SET ad='$ad',soyad='$soyad',telno='$telno',tarih='$tarih',saat='$saat',sikayet='$sikayet' ".
      "WHERE randevu_id=".$_GET['id'];
//sorguyu veritabanina gönderiyoruz.
$cevap = mysqli_query( $baglanti,$sql);


//veritabani baglantisini kapatiyoruz.
mysqli_close($baglanti);
?>
<html>
<head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">   
   <meta http-equiv="Content-Type" content="text/html;  
      charset=UTF-8" />
   </head>
   <body>
      <div class="container ">
            <h1  class="text-info">Diş Hekimi Randevu Otomasyonu</h1>
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
         <ul class="navbar-nav mr-auto">
         <li class="nav-item ">
            <a class="nav-link " href="index.php">Anasayfa <span class="sr-only">(current)</span></a>
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
      <span align="center">
      <?php
      //eger cevap FALSE ise hata yazdiriyoruz.      
        if(!$cevap){
            echo '<br>Hata:' . mysqli_error($baglanti);
        }
        else{
            echo "<h4>Kayıt Güncellendi.";
            echo " <br><a href='listele.php'> Listele</a>\n</h4>";
        }
      ?>
      </span>
   </div>
</html>