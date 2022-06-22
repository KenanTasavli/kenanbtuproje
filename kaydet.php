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
<head><meta charset="utf-8"></head>
<body>
<?php
//mysql baglanti kodunu ekliyoruz 
include("mysqlbaglan.php");

//degiskenleri formdan aliyoruz
$ad=$_POST['ad'];
$soyad=$_POST['soyad'];
$telno=$_POST['telno'];
$tarih=date('Y-m-d', strtotime($_POST['tarih']));
$saat=$_POST['saat'];
$sikayet=$_POST['sikayet'];


echo "Girdiginiz bilgiler:</br>";
echo "Adi   :$ad </br>";
echo "Soyadi:$soyad</br>";
echo "Telefon Numarası :$telno</br>";
echo "Tarih :$tarih</br>";
echo "Saat :$saat</br>";
echo "Şikayet :$sikayet</br>";

//sorguyu hazirliyoruz
$sql = "INSERT INTO randevular ".
       "(ad,soyad,telno,tarih,saat,sikayet) ".
       "VALUES ( '$ad','$soyad', '$telno','$tarih', '$saat','$sikayet')";
	   
echo "<br/>";
//sorguyu veritabanina gönderiyoruz.
$cevap = mysqli_query( $baglanti,$sql);

//eger cevap FALSE ise hata yazdiriyoruz.      
if(!$cevap)
{
    echo '<br>Hata:' . mysqli_error($baglanti);
}
else
{
    echo "Veritabanina eklendi, Kayıtları görmek için";
    echo " <a href='listele.php'> Tiklayiniz</a>\n";
}

//veritabani baglantisini kapatiyoruz.
mysqli_close($baglanti);
?>
</body>
</html>
