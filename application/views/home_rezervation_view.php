<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?=base_url()?>" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
    <script src="assets/bootstrap.min.js"></script>
    <script src="assets/jquery-4.0.0.js"></script>
    <style>
        .bosluk {
            padding-top: 30px;
            padding-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container-fluid bg-dark text-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Sakarya BİP Otomotiv</h2>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-link text-light" href="home">Ana Sayfa</a>
                    <a class="btn btn-link text-light" href="home/vehicle">Araçlar</a>
                    <a class="btn btn-link text-light">İletişim </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <img src="assets/img/baslik-img3.png" class="img-fluid">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row bosluk">
            <div class="col-md-12">                
                <? if (count($rezervasyonlar)>0) {?>   
                <h4>Rezervasyon Listesi</h4>           
                <table class="table">
                    <tr>
                        <td>Resim</td>
                        <td>RezID</td>
                        <td>Marka</td>
                        <td>Model (Yıl)</td>
                        <td>Alma Tarihi</td>
                        <td>Teslim Tarihi</td>
                        <td>Tutar</td>
                        <td>İptal Tarihi</td>
                        <td>Durumu</td>
                        <td></td>                      
                    </tr>
                    <?foreach($rezervasyonlar as $rez) { 
                    $today=strtotime(date('Y-m-d'));
                    $d2=strtotime(date($rez->alma_tarihi));
                    $fark=($d2-$today)/(60*60*24); 
                    ?>                    
                    <tr>
                        <td><img src="assets/arac_resimleri/<?=$rez->arac_id?>.jpg" width="100"></td>
                        <td><?=$rez->rez_id?></td>
                        <td><?=$rez->marka?></td>
                        <td><?=$rez->model?></td>
                        <td><?=$rez->alma_tarihi?></td>
                        <td><?=$rez->teslim_tarihi?></td>
                        <td><?=$rez->tutar?> TL</td>
                        <td><?=$fark?></td>
                        <td><?=$rez->durumu?></td>
                        <td>
                            <? if ($fark>0 && $rez->durumu!='İptal') { ?>
                            <a href="home/rezervationCancel/<?=$rez->rez_id?>"
                            class="btn btn-danger btn-sm">İptal</a>
                            <? } ?>
                        </td>
                    </tr>
                    <? } ?>
                </table>
                <? } ?>
            </div>
        </div>

        <div class="row bosluk">
            <div class="col-md-6 rezFormu">
                <h4>Rezervasyon Sorgulama Ekranı</h4>
                <form action="home/rezervationListPost" method="post">
                    <div class="form-group">
                        <label>TC KİMLİK</label>
                        <input type="text" name="tckimlik_" class="form-control">
                    </div> 
                    <div class="form-group">
                        <input type="submit" value="Rezervasyon Sorgula" class="btn btn-danger btn-sm">
                    </div>
                </form>
            </div>
        </div>
    </div>

    

    <div class="container-fluid bg-light">
        <div class="container">
            <div class="row bosluk">
                <div class="col-md-6">
                    <img src="assets/img/img3.png" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h5>İletişim</h5>
                    <p>
                        Adres:
                    </p>

                    <p>
                        Tığcılar Mah, Atatürk Bulvarı, Kadirhoca sk, No=5/A
                        Adapazarı, Sakarya
                    </p>
                    <p>
                        Telefon:
                    </p>
                    <p>0 264 545 54 54</p>
                    <p>Mail:</p>
                    <p>info@sakaryabipoto.com</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    $(function() {
        $("#btnRez").click(function() {
            $("#rezervasyonFormu").show(500);
        });

        $("#t_tar").blur(function() {
            var at=new Date($("#a_tar").val());
            var tt=new Date($("#t_tar").val());
            var fark=tt.getTime()-at.getTime();
            var farkGun=Math.ceil(fark/(1000*60*60*24));
            //salise->saniye->dk->sa->gün
            var gunlukFiyat=parseFloat($("#fiyat").val());
            $("#txtTutar").text("Tutar (" + farkGun + " günlük)");          
            var tutar=farkGun*gunlukFiyat;
            $("#tutar").val(tutar);
        })
    })
</script>