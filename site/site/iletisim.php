<?php
$sayfa="İletişim";
include("inc/head.php");
include("inc/vt.php");
?>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase mt-3">İletişim</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <form id="contactForm" name="sentMessage" method="POST" action="iletisim.php">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" id="ad" name="ad" type="text" placeholder="İsminiz *" required="required" data-validation-required-message="Please enter your name." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="email" name="email" type="email" placeholder="Email *" required="required" data-validation-required-message="Please enter your email address." />
                                <p class="help-block text-danger"></p>
                            </div>
                          
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control" id="message" name="mesaj" placeholder="Mesajınız *" required="required" data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div id="success"></div>
                        <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Gönder</button>
                    </div>
                </form>
            <script type="text/javascript" src="js/sweetalert2.all.min.js"></script>

            <?php
            if($_POST)
            {
                $sorgu=$baglanti->prepare("insert into iletisimformu set ad=:ad, email=:email, mesaj=:mesaj");
                $ekle=$sorgu->execute(
                    [
                        "ad"=>htmlspecialchars($_POST["ad"]),
                        "email"=>htmlspecialchars($_POST["email"]),
                        "mesaj"=>htmlspecialchars($_POST["mesaj"]),
                    ]
                    );
                    if($ekle)
                    {
                        
                      






                        echo"<script> Swal.fire(
                            'Başarılı!',
                            'Mesajınız Bize Ulaşmıştır.',
                            'success'
                          ) </script>";
                    }
                    else{
                        echo"<script> Swal.fire(
                            'Hata',
                            'Tüm Alanları Doğru Doldurun.',
                            'error'
                          ) </script>";
                    }
            }
            ?>
            </div>
        </section>
        <?php
include("inc/footer.php");
?>
