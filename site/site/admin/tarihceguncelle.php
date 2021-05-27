   
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

$id=$_GET["id"];
$sorgu = $baglanti->prepare("select * from tarihce where id=:id");
$sorgu->execute(["id"=>$id]);
$sonuc = $sorgu->fetch();




if($_POST)
{
  

    $hata="";
    $foto="";    

    if($_POST["tarih"] !="" && $_POST["baslik"] !="" && $_POST["icerik"] !="" && $_FILES["foto"]["name"] !="" )
    {
        if($_FILES["foto"]["error"]!=0)
        {
            $hata.="dosya yüklenirken hata oluştu.";
        }
      else
      {
          copy($_FILES["foto"]["tmp_name"],"../assets/img/logos/".strtolower($_FILES["foto"]["name"]));
          $foto=strtolower($_FILES["foto"]["name"]);


      }
    }
    else{
        $foto=$sonuc["foto"];
    }
    if($_POST["tarih"] !="" && $_POST["baslik"] !=""&& $_POST["icerik"] !="" && $hata=="")
    {
        $sorgu=$baglanti->prepare("update tarihce set foto=:foto, tarih=:tarih, baslik=:baslik, icerik=:icerik where id=:id");
        $guncelle=$sorgu->execute([
            "foto"=> $foto,
            "tarih"=>$_POST["tarih"],
            "baslik"=>$_POST["baslik"],
            "icerik"=>$_POST["icerik"],
           "id"=>$id
        ]);
    
}
}




   
?>
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tarihçe Güncelle</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Tarihçe Güncelle</li>
                        </ol>
                     
                
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                
                            </div>
                            <div class="card-body">
                               <form action="" method="POST" enctype="multipart/form-data">
                               <div class="form-group">
                               <label>Foto</label>
                               <input type="file" name="foto"  class="form-control-file" >
                               <img width="200px" src="../assets/img/logos/<?php echo $sonuc["foto"];?>" alt=""> <br>
                               <label>Tarih</label>
                               <input type="text" name="tarih"  class="form-control" value="<?php echo $sonuc["tarih"];?>">
                               </div>
                               <div class="form-group">
                               <label>Başlık</label>
                               <input type="text" name="baslik"  class="form-control" value="<?php echo $sonuc["baslik"];?>">
                               </div>
                               <div class="form-group">
                               <label>İçerik</label>
                               <input type="text" name="icerik"  class="form-control" value="<?php echo $sonuc["icerik"];?>">
                               </div>
                               <div class="form-group form-check">
                             <label>
                             
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
       