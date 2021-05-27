   
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
$sorgu = $baglanti->prepare("select * from referans where id=:id");
$sorgu->execute(["id"=>$id]);
$sonuc = $sorgu->fetch();




if($_POST)
{
    $aktif=0;
    if(isset($_POST["aktif"])) $aktif=1;

    $hata="";
    $foto="";    

    if($_POST["link"] !="" && $_POST["sira"] !="" && $_FILES["foto"]["name"] !="" )
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
    if($_POST["link"] !="" && $_POST["sira"] !="" && $hata=="")
    {
        $sorgu=$baglanti->prepare("update referans set foto=:foto, link=:link, sira=:sira, aktif=:aktif where id=:id");
        $guncelle=$sorgu->execute([
            "foto"=> $foto,
            "link"=>$_POST["link"],
            "sira"=>$_POST["sira"],
            "aktif"=>$aktif,
            "id"=>$id
        ]);
    
}
}




   
?>
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Referans Güncelle</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Referans Güncelle</li>
                        </ol>
                     
                
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                
                            </div>
                            <div class="card-body">
                               <form action="" method="POST" enctype="multipart/form-data">
                               <div class="form-group">
                               <img width="200px" src="../assets/img/logos/<?php echo $sonuc["foto"];?>" alt=""> <br>
                               <label>Foto</label>
                               <input type="file" name="foto"  class="form-control-file" >
                               </div>
                               <div class="form-group">
                               <label>Link</label>
                               <input type="text" name="link"  class="form-control" value="<?php echo $sonuc["link"];?>">
                               </div>
                               <div class="form-group">
                               <label>Sıra</label>
                               <input type="text" name="sira"  class="form-control" value="<?php echo $sonuc["sira"];?>">
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
       