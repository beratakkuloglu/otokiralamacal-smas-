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
                        <td><?=$arac->fiyat?> TL</td>
                    </tr>
                    <tr>
                        <td>MÜSAİT Mİ</td>
                        <td><?=$arac->musait_mi?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <?
                    if($arac->resim_var_mi=='E')
                        $path='./AracResimleri/'.$arac_id.'.jpg';                                  

                ?>
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