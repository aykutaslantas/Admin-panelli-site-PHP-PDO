   
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
$sorgu=$baglanti->prepare("select * from kullanici where id=:id");
$sorgu->execute(["id"=>$_GET["id"]]);
$sonuc=$sorgu->fetch();



if($_POST)
{
    $aktif=0;
    if(isset($_POST["aktif"])) $aktif=1;

  

    if($_POST["kadi"] !="" &&  $_POST["email"] !="" && $_POST["yetki"] !=""  )
    {
       
          $eklesorgu=$baglanti->prepare("update kullanici set kadi=:kadi, email=:email, aktif=:aktif, yetki=:yetki where id=:id");
          $ekle=$eklesorgu->execute([
             
              "kadi"=>$_POST["kadi"],
              "email"=>$_POST["email"],
              "yetki"=>$_POST["yetki"],
              "aktif"=>$aktif,
              "id"=>$_GET["id"]
          ]);

          if($ekle)
          {
              echo "<h1>Güncelleme Başarılı</h1>";
          }
      
    }
}




   
?>
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Kullanıcı Güncelle</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Kullanıcı Güncelle</li>
                        </ol>
                     
                
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                
                            </div>
                            <div class="card-body">
                               <form action="" method="POST" enctype="multipart/form-data">
                               <div class="form-group">
                               <label>Kullanıcı Adı</label>
                               <input type="text" name="kadi" required class="form-control-file" value="<?php echo $sonuc["kadi"];?>" >
                               </div>
                               <label>Email</label>
                               <input type="email" name="email" required class="form-control" value="<?php echo  $sonuc["email"];?>"> 
                               </div>
                               <div class="form-group">
                               <label>Yetki</label> <br>
                               <label> <input type="radio" name="yetki" value="1" <?php if($sonuc["yetki"]=="1"?"checked":"") ?> > Admin</label> <br>
                               <label> <input type="radio" name="yetki" value="2" <?php if($sonuc["yetki"]=="2"?"checked":"") ?> >  Normal Kullanıcı</label>

                               
                               </div>
                               <div class="form-group form-check">
                             <label>
                               <input type="checkbox" name="aktif"  class="form-checkinput" <?php if($sonuc["aktif"]=="1"?"checked":"") ?> >Aktifmi</label>
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
       