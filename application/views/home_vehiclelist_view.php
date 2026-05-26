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
        <div class="row">
            <? foreach($araclar as $arac) { ?>
            <div class="col-md-4">
                <? if($arac->resim_var_mi=='E') { ?>
                <img class="img-fluid" 
                src="assets/arac_resimleri/<?=$arac->arac_id?>.jpg">
                <? } ?>
                <?=$arac->marka?>, 
                <?=$arac->model?>
                (<?=$arac->model_yili?>)
                <a href="home/detail/<?=$arac->arac_id?>"
                class="btn btn-link btn-sm float-right">
                Detay</a>
            </div>
            <? } ?>
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