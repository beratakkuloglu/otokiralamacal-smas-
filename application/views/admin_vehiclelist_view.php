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
            <div class="col-md-12">
                <h4>Araç Listemiz</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Resim<th>
                            <th>Arac ID</th>
                            <th>Marka</th>
                            <th>Model</th>
                            <th>Model Yılı</th>
                            <th>Günlük Fiyat</th>
                            <th>Müsait Mi?</th>
                            <th>
                                <a class="btn btn-danger btn-sm" href="admin/vehicleAdd">Araç Ekle</a>
                                
                            </th>
                        </tr>
                    <thead>
                    <tbody>
                        <? foreach($araclar as $arac) { ?>
                            <tr>
                                <td>
                                    <? if($arac->resim_var_mi=='E') { ?>
                                    <img src="assets/arac_resimleri/<?=$arac->arac_id.'.jpg'?>" width="100">
                                    <? } ?>
                                </td>
                                <td><?=$arac->arac_id?></td>
                                <td><?=$arac->marka?></td>
                                <td><?=$arac->model?></td>
                                <td><?=$arac->model_yili?></td>
                                <td><?=$arac->fiyat?> TL</td>
                                <td><?=$arac->musait_mi=="E" ? "EVET":"HAYIR" ?></td>
                                <td>
                                    <a href="admin/vehicleDetail/<?=$arac->arac_id?>" class="btn btn-primary btn-sm">
                                        Detay</a>
                                    <a href="admin/vehicleUpdate/<?=$arac->arac_id?>" class="btn btn-success btn-sm">
                                        Güncelle</a>
                                    <a href="admin/vehicleDelete/<?=$arac->arac_id?>" class="btn btn-dark btn-sm" onclick="return confirm('Bu aracı silmek istiyor musunuz?')">
                                        Sil</a>
                                    <a href="admin/UploadImage/<?=$arac->arac_id?>/<?=$arac->resim_var_mi?>" class="btn btn-warning btn-sm">
                                        Araç Resmi</a>
                                </td>
                            </tr>
                        <? } ?>
                    </tbody>
                </table>
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