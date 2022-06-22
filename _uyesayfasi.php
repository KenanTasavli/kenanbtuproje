<?php 
   //oturumu başlat 
   
   session_start(); 
   
   
   //eğer username adlı oturum değişkeni yok ise  
   
   //login sayfasına yönlendir 
   
   if ( !isset($_SESSION['username']) ) { 
   
     header("Location: _login.php"); 
   
     exit(); 
   
    } 
   
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
            <a class="nav-link active" href="index.php">Anasayfa <span class="sr-only">(current)</span></a>
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
            <a class="nav-link" href="guncellelistesi.php">Randevu Güncelle</a>
         </li>
         </ul>
         <span class="nav-link">
         <a href='_logout.php'>[Oturumu Kapat]</a> 
      </span>

      </div>
      </nav>
         <div class="jumbotron">
            <img src="resim.jpg" width="190 px" height="210 px" class="img-thumbnail" align="right">
            <h1>İşimiz, dişiniz.</h1>      
            <p> Her türlü diş hastalıklarını profesyonel bir şekilde hallediyoruz...</p>
         </div>


      <div class="card">
         <div class="card-header">
            Neden biz?
         </div>
         <div class="card-body">
            <h5 class="card-title">5 kişilik deneyimli bir kadro</h5>
            <p class="card-text">Diş ve ağız hastalıklarında uzmanı ve aynı zamanda diş bakımında lider olan 5 diş hekimi ile sizlere en iyi şekilde hizmet sağlamaktayız.
                Tüm diş ve ağız hastalıklarını acısız ve sancısız şekilde çözüyoruz. Diş çekimi, beyazlatma, bakım gibi her türtlü konuda sizi memnun edeceğize eminiz.
            </p>
         </div>
      </div>

      <div class="card">
         <div  class="card-header">
            <div class="well well-sm">
               <p align="center">Kenan Taşavlı 
               <br> Her Hakkı Saklıdır. Copyright &copy 2022</p>
            </div>
         </div>
      </div>
   </div>
</html>