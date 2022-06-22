<?php
//mysql baglanti kodunu ekliyoruz
include("mysqlbaglan.php");

//sorguyu hazirliyoruz
$sql = "DELETE FROM randevular WHERE randevu_id=".$_GET['id'];

//sorguyu veritabanina gönderiyoruz.
$cevap = mysqli_query($baglanti,$sql);
       
if(!$cevap )
{
    echo '<br>Hata:' . mysqli_error($baglanti);
}
else
{
    echo "Kayıt Silindi!</br>";
    echo " <a href='silmelistesi.php'> Listele</a>\n";
}
//veritabani baglantisini kapatiyoruz.
mysqli_close($baglanti);
?>
