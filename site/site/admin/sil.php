   
<?php
include("incadmin/adminhead.php");

if($_SESSION["yetki"]!=1)
{
    echo '    <script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>';
    echo"<script> Swal.fire(
        'Hata!',
        'Yetkisiz Kullanıcı',
        'erorr'
      )  </script>";
      exit;
}

if($_GET)
{
    $tablo=$_GET["tablo"];
    $id=(int)$_GET["id"];


    $sorgu=$baglanti->prepare("delete from $tablo where id=:id");
    $sonuc=$sorgu->execute(["id"=>$id]);
    if($sonuc)
    {
        echo '    <script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>';
        echo"<script> Swal.fire(
            'Başarılı!',
            'Silme Başarılı',
            'success'
          )  </script>";
          
          
    }

}

include("incadmin/adminfooter.php");
?>