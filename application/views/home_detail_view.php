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

        .rezFormu {
            border: 1px solid red;
        }

        #rezervasyonFormu {
            display: none;
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
            <div class="col-md-6">
                <h4>Araç Bilgileri</h4>
                <table class="table">
                    <tr>
                        <td width="30%">ARAÇ ID</td>
                        <td><?=$arac->arac_id?></td>
                    </tr>
                    <tr>
                        <td>MARKA</td>
                        <td><?=$arac->marka?></td>
                    </tr>
                    <tr>
                        <td>MODEL</td>
                        <td><?=$arac->model?></td>
                    </tr>
                    <tr>
                        <td>MODEL YILI</td>
                        <td><?=$arac->model_yili?></td>
                    </tr>
                    <tr>
                        <td>YAKIT TİPİ</td>
                        <td><?=$arac->yakit_tipi?></td>
                    </tr>
                    <tr>
                        <td>VİTES TİPİ</td>
                        <td><?=$arac->vites_tipi?></td>
                    </tr>
                    <tr>
                        <td>FİYAT</td>
                        <td><label id="gunluk_fiyat"><?=$arac->fiyat?></label> TL</td>
                    </tr>
                    <tr>
                        <td>MÜSAİT Mİ</td>
                        <td><?=$arac->musait_mi?></td>
                    </tr>
                </table>
                <a id="btnRez" href="javascript:void(0)"
                class="btn btn-success btn-sm">
                Rezervasyon</a>
                <label><?=$uyari?></label>
            </div>
            <div class="col-md-6">
                <? if($arac->resim_var_mi=='E') { ?>
                <img src="assets/arac_resimleri/<?=$arac->arac_id?>.jpg"
                class="img-fluid">
                <? } ?>
            </div>
        </div>

        <div class="row bosluk" id="rezervasyonFormu">
            <div class="col-md-6 rezFormu">
                <h4>Rezervasyon Formu</h4>
                <form action="home/rezervationAddPost" method="post">
                    <div class="form-group">
                        <label>Araç ID: <?=$arac->arac_id?></label>
                        <input type="hidden" name="arac_id_" value="<?=$arac->arac_id?>">
                    </div>
                    <div class="form-group">
                        <label>TC KİMLİK</label>
                        <input type="text" name="tckimlik_" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Alma Tarihi</label>
                        <input id="a_tar" type="date" name="alma_tarihi_" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Teslim Tarihi</label>
                        <input id="t_tar" type="date" name="teslim_tarihi_" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Günlük Fiyat</label>
                        <input id="fiyat" type="text" name="gunluk_fiyat_" value="<?=$arac->fiyat?>" class="form-control">
                    </form>
                    <div class="form-group">
                        <label id="txtTutar">Tutar</label>
                        <input id="tutar" type="text" name="tutar_" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Hızlı Rezervasyon" class="btn btn-danger btn-sm">
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