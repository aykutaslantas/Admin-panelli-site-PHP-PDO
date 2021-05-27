<?php
include("incadmin/adminhead.php");
$sorgu=$baglanti->prepare("select * from hakkimizda");
$sorgu->execute();
$sonuc=$sorgu->fetch();
?>
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Hakkımızda</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Hakkımızda</li>
                        </ol>
                     
                
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Başlık</th>
                                                <th>İçerik</th>
                                                <th>Alt Başlık</th>
                                                <th>Alt İçerik</th>
                                                <th>Alt İçerik2</th>
                                                <th></th>
                                                
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                            <tr>
                                                <td><?php echo $sonuc["baslik"];?></td>
                                                <td><?php echo $sonuc["icerik"];?></td>
                                                <td><?php echo $sonuc["altbaslik"];?></td>
                                                <td><?php echo $sonuc["alticerik"];?></td>
                                                <td><?php echo $sonuc["alticerik2"];?></td>
                                                <td class="text-center"> <a href="hakkimizdaduzenle.php?id=<?php echo $sonuc["id"];?>"><span class="fa fa-edit fa-2x"></span></a></td>
                                               
                                            </tr>
                                          
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
        