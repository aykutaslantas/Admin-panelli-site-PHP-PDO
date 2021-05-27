   
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


if($_POST)
{
   

    $hata="";

    if($_POST["tarih"] !="" && $_POST["baslik"] && $_POST["baslik"] !="" && $_FILES["foto"]["name"] !="" )
    {
        if($_FILES["foto"]["error"]!=0)
        {
            $hata.="dosya yüklenirken hata oluştu.";
        }
      else
      {
          copy($_FILES["foto"]["tmp_name"],"../assets/img/about/".strtolower($_FILES["foto"]["name"]));
          $eklesorgu=$baglanti->prepare("insert into tarihce set foto=:foto, tarih=:tarih, icerik=:icerik, baslik=:baslik");
          $ekle=$eklesorgu->execute([
              "foto"=>strtolower($_FILES["foto"]["name"]),
              "tarih"=>$_POST["tarih"],
              "icerik"=>$_POST["icerik"],
              "baslik"=>$_POST["baslik"],
           
          ]);

          if($ekle)
          {
              echo "<h1>Ekleme Başarılı</h1>";
          }
      }
    }
}




   
?>
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tarihçe Ekle</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Tarihçe Ekle</li>
                        </ol>
                     
                
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                
                            </div>
                            <div class="card-body">
                               <form action="" method="POST" enctype="multipart/form-data">
                               <div class="form-group">
                               <label>Foto</label>
                               <input type="file" name="foto" required class="form-control-file" >
                               </div>
                               <div class="form-group">
                               <label>Tarih</label>
                               <input type="text" name="tarih" required class="form-control" value="<?php echo @$_POST["link"];?>">
                               </div>
                               <div class="form-group">
                               <label>Başlık</label>
                               <input type="text" name="baslik" required class="form-control" value="<?php echo @$sonuc["sira"];?>">
                               </div>
                               <div class="form-group">
                               <label>İçerik</label>
                               <textarea name="icerik" id="icerik" <?php echo @$sonuc["icerik"];?> ></textarea>
                               </div>
                            
                               <div class="form-group">
                              
                             
                             <input type="submit" value="Ekle" class="btn btn-primary">
                               </div>
                               </form>
                            </div>
                        </div>
                    </div>
                </main>
                <?php
include("incadmin/adminfooter.php");

?>
       