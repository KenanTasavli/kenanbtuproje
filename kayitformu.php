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
<!DOCTYPE html>
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
               <a class="nav-link" href="index.php">Anasayfa <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link active" href="kayitformu.php">Randevu Oluştur</a>
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
         <section class="vh-100">
   <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
         <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
         <form action="kaydet.php" method="POST"> 

            <div class="form-outline mb-4">
               <label class="form-label" for="form3Example3">Ad</label>
               <input type="text" name="ad" class="form-control form-control-lg"
               placeholder="Ad Giriniz" />
               
            </div>

            <div class="form-outline mb-3">
               <label class="form-label" for="form3Example4">Soyad</label>
               <input type="text" name="soyad" class="form-control form-control-lg"
               placeholder="Soyad Giriniz" />
            </div>

            <div class="form-outline mb-3">
               <label class="form-label" for="form3Example4">Telefon Numarası</label>
               <input type= "text" name="telno" class="form-control form-control-lg"
               placeholder="Telefon No Giriniz" />
            </div>

            <div class="form-outline mb-3">
               <label class="form-label" for="form3Example4">Tarih</label>
               <input type="date" name="tarih" class="form-control form-control-lg"
               placeholder="Tarihi Giriniz" />
            </div>

            <div class="form-outline mb-3">
               <label class="form-label" for="form3Example4">Saat</label>
               <input type="time" name="saat" class="form-control form-control-lg"
               placeholder="Saati Giriniz" />
            </div>

            <div class="form-outline mb-3">
               <label class="form-label" for="form3Example4">Şikayet</label>
               <input type="text" name="sikayet" class="form-control form-control-lg"
               placeholder="Şikayetinizi Giriniz" />
            </div>
            <div class="text-center text-lg-start mt-4 pt-2">
               <input type="submit" class="btn btn-primary btn-lg"
               style="padding-left: 2.5rem; padding-right: 2.5rem;" value="KAYDET"/>
          </div>

        </form>
      </div>
    </div>
  </div>
  
</section>
   </div>
   </body>
</html>