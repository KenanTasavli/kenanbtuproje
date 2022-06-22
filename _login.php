<?php 
   session_start(); 


   
   //eğer username adlı oturum değişkeni yok ise  
   
   //login sayfasına yönlendir 
   
   if ( isset($_SESSION['username']) ) { 
   
     header("Location: _uyesayfasi.php"); 
   
     exit(); 
   
    } 

   
   require('mysqlbaglan.php'); 
   
    
   
   if (isset($_POST['username']) and isset($_POST['password'])){ 
   
   extract($_POST); 
   
    
   
   // sifre metni SHA256 ile şifreleniyor. 
   
   $password = hash('sha256', $password); 
   
   $sql = "SELECT * FROM `kullanicilar` WHERE "; 
   
   $sql= $sql . "kullaniciadi='$username' and sifre='$password'"; 
   
    
   
   $cevap = mysqli_query($baglanti, $sql); 
   
   //eger cevap FALSE ise hata yazdiriyoruz.       
   
   if(!$cevap ){ 
   
       echo '<br>Hata:' . mysqli_error($baglanti); 
   
   } 
   
   //veritabanindan dönen satır sayısını bul 
   
   $say = mysqli_num_rows($cevap); 
   
   if ($say == 1){ 
   
       $_SESSION['username'] = $username; 
   
    }else{ 
   
   $mesaj = "<h1> Hatalı Kullanıcı adı veya Şifre!</h1>"; 
   
    } 
   
   } 
   
   if (isset($_SESSION['username'])){ 
   
   header("Location: _uyesayfasi.php"); 
   
   }else{ 
   
   //oturum yok ise login formu görüntüle 
   
   ?> 
<html><head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">   
<link rel="stylesheet" href="css/tema.css">
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
     <li class="nav-item active">
       <a class="nav-link" href="_login.php">Giriş</a>
     </li>
     <li class="nav-item ">
       <a class="nav-link" href="_register.php">Kayıt ol</a>
     </li>
   </ul>

 </div>
</nav>


      <section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="resim.jpg"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
      <form action="<?php $_PHP_SELF ?>" method="POST"> 
         <?php  
            if(isset($mesaj)){ echo $mesaj;}  
            
            ?> 


          <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Kullanıcı Adı</label>
            <input type="text" name="username" class="form-control form-control-lg"
              placeholder="Kullanıcı Adı Giriniz" />
            
          </div>

          <div class="form-outline mb-3">
            <label class="form-label" for="form3Example4">Şifre</label>
            <input type="password" name="password" class="form-control form-control-lg"
              placeholder="Şifre Giriniz" />

          </div>



          <div class="text-center text-lg-start mt-4 pt-2">

              <input type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;" value="GİRİŞ"/>
            <p class="small fw-bold mt-2 pt-1 mb-0">Üyeliğiniz Yok Mu ? <a href="_register.php"
                class="link-danger">Kayıt Ol</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  
</section>


      
         </div>
   </body>
</html>
<?php } ?>