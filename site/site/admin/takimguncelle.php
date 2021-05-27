   
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
$sorgu = $baglanti->prepare("select * from takim where id=:id");
$sorgu->execute(["id"=>$id]);
$sonuc = $sorgu->fetch();




if($_POST)
{
    $aktif=0;
    if(isset($_POST["aktif"])) $aktif=1;

    $hata="";
    $foto="";    

    if($_POST["isim"] !="" && $_POST["gorev"] !="" &&$_POST["twitter"] !="" && $_POST["facebook"] !="" && $_POST["linkedin"] !="" && $_POST["sira"] !="" && $_FILES["foto"]["name"] !="" )
    {
        if($_FILES["foto"]["error"]!=0)
        {
            $hata.="dosya yüklenirken hata oluştu.";
        }
      else
      {
          copy($_FILES["foto"]["tmp_name"],"../assets/img/team/".strtolower($_FILES["foto"]["name"]));
          $foto=strtolower($_FILES["foto"]["name"]);


      }
    }
    else{
        $foto=$sonuc["foto"];
    }
    if($_POST["isim"] !="" && $_POST["gorev"] !="" &&$_POST["twitter"] !="" && $_POST["facebook"] !="" && $_POST["linkedin"] !="" && $_POST["sira"] !="")
    {
        $sorgu=$baglanti->prepare("update takim set foto=:foto, isim=:isim, gorev=:gorev, twitter=:twitter, facebook=:facebook, linkedin=:linkedin, sira=:sira, aktif=:aktif where id=:id");
        $guncelle=$sorgu->execute([
            "foto"=> $foto,
              "isim"=>$_POST["isim"],
              "gorev"=>$_POST["gorev"],
              "twitter"=>$_POST["twitter"],
              "facebook"=>$_POST["facebook"],
              "linkedin"=>$_POST["linkedin"],
              "sira"=>$_POST["sira"],
              "aktif"=>$aktif,
            "id"=>$id
        ]);
    
}
}




   
?>
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Takım Üyesi Güncelle</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Takım Üyesi Güncelle</li>
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
                               </div>
                               <div class="form-group">
                               <label>isim</label>
                               <input type="text" name="isim"  class="form-control" value="<?php echo @$sonuc["isim"];?>">
                               </div>
                               <div class="form-group">
                               <label>Görev</label>
                               <input type="text" name="gorev"  class="form-control" value="<?php echo @$sonuc["gorev"];?>">
                               </div>
                               <div class="form-group">
                               <label>Twitter</label>
                               <input type="text" name="twitter"  class="form-control" value="<?php echo @$sonuc["twitter"];?>">
                               </div>
                               <div class="form-group">
                               <label>Facebook</label>
                               <input type="text" name="facebook"  class="form-control" value="<?php echo @$sonuc["facebook"];?>">
                               </div>
                               <div class="form-group">
                               <label>Linkedin</label>
                               <input type="text" name="linkedin"  class="form-control" value="<?php echo @$sonuc["linkedin"];?>">
                               </div>
                               <div class="form-group">
                               <label>Sıra</label>
                               <input type="text" name="sira" class="form-control" value="<?php echo @$sonuc["sira"];?>">
                               </div>
                               <div class="form-group form-check">
                             <label>
                               <input type="checkbox" name="aktif"  class="form-checkinput" <?php $sonuc["aktif"]==1?"checked":"" ?> >Aktifmi</label>
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
       