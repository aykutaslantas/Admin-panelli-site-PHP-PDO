   
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

$sorgu=$baglanti->prepare("select * from hakkimizda where id=:id");
$sorgu->execute(["id"=>(int)$_GET["id"]]);
$sonuc=$sorgu->fetch();
if($_POST)//veri güncelleme
{
    $guncellesorgu=$baglanti->prepare("update hakkimizda set baslik=:baslik, icerik=:icerik, altbaslik=:altbaslik, alticerik=:alticerik, alticerik2=:alticerik2 where id=:id");
    $guncelle=$guncellesorgu->execute(["baslik"=>$_POST['baslik'],"icerik"=>$_POST['icerik'],"altbaslik"=>$_POST['altbaslik'],"alticerik"=>$_POST['alticerik'],"alticerik2"=>$_POST['alticerik2'],"id"=>$_GET['id']]);
    if($guncelle)
    {
        echo '    <script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>';
        echo"<script> Swal.fire(
            'Başarılı!',
            'Güncelleme Başarılı',
            'success'
          )  </script>";
    }
}
?>
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Hakkımızda</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Hakkımızda Düzenle</li>
                        </ol>
                     
                
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                
                            </div>
                            <div class="card-body">
                               <form action="" method="POST">
                               <div class="form-group">
                               <label>Başlık</label>
                               <input type="text" name="baslik" required class="form-control" value="<?php echo $sonuc["baslik"];?>">
                               </div>
                               <div class="form-group">
                               <label>içerik</label>
                               <input type="text" name="icerik" required class="form-control" value="<?php echo $sonuc["icerik"];?>">
                               </div>
                               <div class="form-group">
                               <label>Alt Başlık</label>
                               <input type="text" name="altbaslik" required class="form-control" value="<?php echo $sonuc["altbaslik"];?>">
                               </div>
                               <div class="form-group">
                               <label>Alt İçerik</label>
                               <input type="text" name="alticerik" required class="form-control" value="<?php echo $sonuc["alticerik"];?>">
                               </div>
                               <div class="form-group">
                               <label>Alt İçerik 2</label>
                               <input type="text" name="alticerik2" required class="form-control" value="<?php echo $sonuc["alticerik2"];?>">
                               </div>
                               <div class="form-group">
                               <input type="submit" value="Güncelle" class="btn btn-primary">
                               </div>
                               </form>
                            </div>
                        </div>
                    </div>
                </main>
                <?php
include("incadmin/adminfooter.php");

?>
        