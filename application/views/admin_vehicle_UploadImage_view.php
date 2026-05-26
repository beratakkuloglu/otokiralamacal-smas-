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
                <div class="col-md-4">
                    <h2>Sakarya BİP Otomotiv</h2>
                </div>
                <div class="col-md-8 text-right">
                <a class="btn btn-link text-light" href="admin">Ana Sayfa</a>
                    <a class="btn btn-link text-light" href="admin/vehicle">Araçlar</a>
                    <a class="btn btn-link text-light">Rezervasyonlar</a>
                    <a class="btn btn-link text-light">Kullanıcılar</a>
                    <a class="btn btn-link text-light">Oturumu Kapat</a>
                </div>
            </div>
        </div>
    </div>

    

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>Araç Resmi Ekleme Ekranı</h4>
                <form action="admin/UploadImagePost" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>ARAÇ ID: <?=$arac_id?></label>
                        <input type="hidden" name="arac_id_" value="<?=$arac_id?>">
                        <br>
                        <label>Araç Resmi</label>
                        <input type="file" name="resim" class="form-control">
                    </div>
                    <div class="form-group">                        
                        <input type="submit" value="Yükle" class="btn btn-primary btn-sm">
                        <?=$uyari?>
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <? if($resim_var_mi=='E') { ?>
                <img src="assets/arac_resimleri/<?=$arac_id.'.jpg'?>" width="500">
                <? } ?>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-warning">
        <div class="container">
            <div class="row bosluk">
                <div class="col-md-12">
                    Bu sayfa sadece yöneticilerin kullanımına açıktır.
                </div>                
            </div>
        </div>
    </div>
</body>
</html>