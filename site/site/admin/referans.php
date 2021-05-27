<?php
include("incadmin/adminhead.php");

?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Anasayfa</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item active">Referanslar</li>
        </ol>


        <div class="card mb-4">
            <div class="card-header">
               <a href="referansekle.php" class="btn btn-primary">Referans Ekle</a>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>İd</th>
                                <th>Foto</th>
                                <th>Link</th>
                                <th>Sıra</th>
                                <th>Aktif</th>
                                <th></th>
                                <th></th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $sorgu = $baglanti->prepare("select * from referans");
                            $sorgu->execute();
                            while ($sonuc = $sorgu->fetch()) {
                            ?>
                                <tr>
                                    <td><?php echo $sonuc["id"]; ?></td>
                                    <td><img width="150px" src="../assets/img/logos/<?php echo $sonuc["foto"]; ?>"> </td>
                                    <td><?php echo $sonuc["link"]; ?></td>
                                    <td><?php echo $sonuc["sira"]; ?></td>
                                    <td><span class="fa fa-2x fa-<?php echo $sonuc["aktif"] == "1" ? "check" : "times" ?>"></span></td>

                                    <td class="text-center"> <a href="referansguncelle.php?id=<?php echo $sonuc["id"]; ?>"><span class="fa fa-edit fa-2x"></span></a></td>
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
                                                        <a href="sil.php?id=<?php echo $sonuc["id"]?>&tablo=referans" class="btn btn-danger">Sil</a>
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