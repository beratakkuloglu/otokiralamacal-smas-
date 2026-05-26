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
                <h4>Araç Ekleme Ekranı</h4>
                <form action="admin/vehicleAddPost" method="post">
                    <div class="form-group">
                        <label>MARKA</label>
                        <input type="text" name="marka_" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>MODEL</label>
                        <input type="text" name="model_" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>MODEL YILI</label>
                        <input type="number" name="model_yili_" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Vites Tipi</label><br>
                        <input type="radio" name="vites_" value="Manuel"> Manuel
                        <input type="radio" name="vites_" value="Otomatik"> Otomatik
                        <input type="radio" name="vites_" value="Tiptonik"> Tiptonik
                    </div>
                    <div class="form-group">
                        <label>Yakıt Tipi</label>
                        <select name="yakit_" class="form-control">
                            <option value="Benzin">Benzin</option>
                            <option value="Dizel">Dizel</option>
                            <option value="LPG">LPG</option>
                            <option value="Hibrit">Hibrit</option>
                            <option value="Elektrik">Elektrik</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Günlük Ücret</label>
                        <input type="text" name="fiyat_" class="form-control">
                    </div>
                    <div class="form-group">                        
                        <input type="submit" value="Kaydet" class="btn btn-primary btn-sm">
                        <?=$uyari?>
                    </div>
                </form>
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