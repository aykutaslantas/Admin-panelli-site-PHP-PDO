<?php
include("incadmin/adminhead.php");

?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Anasayfa</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item active">Tarihçe</li>
        </ol>


        <div class="card mb-4">
            <div class="card-header">
               <a href="tarihcekle.php" class="btn btn-primary">Tarihçe Ekle</a>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                               
                                <th>Foto</th>
                                <th>Tarih</th>
                                <th>Başlık</th>
                                <th>İçerik</th>
                                <th></th>
                                <th></th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $sorgu = $baglanti->prepare("select * from tarihce");
                            $sorgu->execute();
                            while ($sonuc = $sorgu->fetch()) {
                            ?>
                                <tr>
                                   
                                    <td><img width="150px" src="../assets/img/about/<?php echo $sonuc["foto"]; ?>"> </td>
                                    <td><?php echo $sonuc["tarih"]; ?></td>
                                    <td><?php echo $sonuc["baslik"]; ?></td>
                                    <td><?php echo $sonuc["icerik"]; ?></td>
                                   

                                    <td class="text-center"> <a href="tarihceguncelle.php?id=<?php echo $sonuc["id"]; ?>"><span class="fa fa-edit fa-2x"></span></a></td>
                                    <td>
                                        <a  href="#" data-toggle="modal" data-target="#silmodal<?php echo $sonuc["id"]; ?>"><span class="fa fa-trash fa-2x"></span></a>
                                        <div class="modal fade" id="silmodal<?php echo $sonuc["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Silmek istediğinizden emin misiniz?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                                                        <a href="sil.php?id=<?php echo $sonuc["id"]?>&tablo=tarihce" class="btn btn-danger">Sil</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include("incadmin/adminfooter.php");

?>