<?php
//membuka file JSON
// data corona provinsi
$data_prov = file_get_contents("https://api.kawalcorona.com/indonesia/provinsi");
$json_prov = json_decode($data_prov, true);

// data suspect corona
$data_indonesia = file_get_contents("https://api.kawalcorona.com/indonesia");
$json_indonesia = json_decode($data_indonesia, true);

// data corona global
$data_globe = file_get_contents("https://api.kawalcorona.com/");
$json_globe = json_decode($data_globe, true);

// data  kasus corona di indonesia
$kasus = "https://api.kawalcorona.com/detail/";
$data_suspect = file_get_contents($kasus);
$json_suspect = json_decode($data_suspect, true);

// data total positif corona global
$data_globe_pos = file_get_contents("https://api.kawalcorona.com/positif");
$json_globe_pos = json_decode($data_globe_pos, true);

// data total sembuh corona global
$data_globe_sembuh = file_get_contents("https://api.kawalcorona.com/sembuh");
$json_globe_sembuh = json_decode($data_globe_sembuh, true);

// data total meninggal corona global
$data_globe_dead = file_get_contents("https://api.kawalcorona.com/meninggal");
$json_globe_dead = json_decode($data_globe_dead, true);

// convert tanggal
// var_dump($json_globe[0]['attributes']['Last_Update']);
$datejson = $json_globe[36]['attributes']['Last_Update'];
$date = date("D, d-M-Y H:i:s", $datejson / 1000);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanggap Corona</title>

    <!-- *Mycss -->
    <link rel="stylesheet" href="style/main.css">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- fontawesome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">

</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#"> <i class="fas fa-shield-virus"></i> Tanggap Corona</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link" href="#"><i class="fas fa-home"></i> Dashboard</a>
                    <a class="nav-item nav-link" href="#prov"><i class="fas fa-location-arrow"></i> Provinsi Indonesia</a>
                    <a class="nav-item nav-link" href="#indo"><i class="fas fa-address-card"></i> Data Kasus Indonesia</a>
                    <a class="nav-item nav-link" href="#globe"> <i class="fas fa-globe"></i> Global</a>
                    <a class="nav-item1 nav-link" href="https://kawalcorona.com/api/" target="_blank"><i class="fas fa-terminal"></i> API FOR DEVELOPER</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 sm-11">
                    <h3 class="text-logo"><i class="fas fa-shield-virus"></i> Tanggap Corona <span class="col sm-1">(Coronavirus Global & Indonesia Live Data)</span></h3>
                    <h5 class="col-md-12 sm-12">Pantau dan Cegah Corona agar Keluarga Terlindungi</h5>
                </div>
            </div>

            <!-- cardview top -->
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card text-white bg-warning mb-3">
                            <div class="container">
                                <div class="row">
                                    <div class="card-body col-8">
                                        <p class="card-text total">TOTAL POSITIF</p>
                                        <p class="card-text data"> <?php print_r($json_globe_pos['value']); ?></p>
                                        <p class="card-text">ORANG</p>
                                    </div>
                                    <div class="col-4">
                                        <img class="emot" src="util/img/anxious.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-success mb-3">
                            <div class="container">
                                <div class="row">
                                    <div class="card-body col-8">
                                        <p class="card-text total">TOTAL SEMBUH</p>
                                        <p class="card-text data"> <?php print_r($json_globe_sembuh['value']); ?></p>
                                        <p class="card-text">ORANG</p>
                                    </div>
                                    <div class="col-4">
                                        <img class="emot" src="util/img/emotion.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-dark mb-3">
                            <div class="container">
                                <div class="row">
                                    <div class="card-body col-8">
                                        <p class="card-text total">TOTAL MENINGGAL</p>
                                        <p class="card-text data"> <?php print_r($json_globe_dead['value']); ?></p>
                                        <p class="card-text">ORANG</p>
                                    </div>
                                    <div class="col-4">
                                        <img class="emot" src="util/img/emotion-sad.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-danger mb-3">
                            <div class="container">
                                <div class="row">
                                    <div class="card-body col-8">
                                        <p class="card-text card-indo">INDONESIA</p>
                                        <?php foreach ($json_indonesia as $idn) : ?>
                                            <p class="card-text data-idn"> <?= $idn['positif'] . " Positif, " . $idn['sembuh'] . " Sembuh, " . $idn['meninggal'] . " Meninggal"; ?></p>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="col-4">
                                        <img class="emot" src="util/img/indonesia.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- tanggal -->
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center tanggal">
                        <p>Sumber data : <a href="https://kawalcorona.com/">kawalcorona.com/</a>. Update terakhir : <?= $date ?></p>
                    </div>
                </div>
            </div>

            <!-- table -->
            <div class="container">

                <div class="prov-indo">
                    <div class="card" id="prov">
                        <h5 class="card-header">Data Kasus Coronavirus di Indonesia Berdasarkan Provinsi (Data by kawalcorona.com)</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class=" table table-striped card-text table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" id="col">NO.</th>
                                            <th scope="col" id="col">PROVINSI</th>
                                            <th scope="col" id="col">POSITIF</th>
                                            <th scope="col" id="col">SEMBUH</th>
                                            <th scope="col" id="col">MENINGGAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($json_prov as $prov) : ?>
                                            <tr>
                                                <th scope="row"><?= $i ?></th>
                                                <td><?= $prov['attributes']['Provinsi'] ?></td>
                                                <td><?= $prov['attributes']['Kasus_Posi'] ?></td>
                                                <td><?= $prov['attributes']['Kasus_Semb'] ?></td>
                                                <td><?= $prov['attributes']['Kasus_Meni'] ?></td>
                                            </tr>
                                            <?php $i++ ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="data-suspect">
                    <div class="card">
                        <h5 class="card-header" id="indo">Data Kasus Coronavirus di Indonesia (Data by kawalcorona.com)</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class=" table table-striped card-text table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" id="col">NO.</th>
                                            <th scope="col" id="col">UMUR</th>
                                            <th scope="col" id="col">GENDER</th>
                                            <th scope="col" id="col">STATUS</th>
                                            <th scope="col" id="col">KEWARGANEGARAAN</th>
                                            <th scope="col" id="col">PROVINSI</th>
                                            <th scope="col" id="col">RUMAH SAKIT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($json_suspect['nodes'] as $suspect) : ?>
                                            <tr>
                                                <th><?= $suspect['kasus'] ?></td>
                                                <td><?= $suspect['umur'] ?></td>
                                                <td><?= $suspect['gender'] ?></td>
                                                <td><?= $suspect['status'] ?></td>
                                                <td><?= $suspect['wn'] ?></td>
                                                <td><?= $suspect['provinsi'] ?></td>
                                                <td><?= $suspect['rs'] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="globe">
                    <div class="card">
                        <h5 class="card-header" id="globe">Kasus Coronavirus Global (Data by kawalcorona.com)</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class=" table table-striped card-text table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" id="col">NO.</th>
                                            <th scope="col" id="col">NEGARA</th>
                                            <th scope="col" id="col">POSITIF</th>
                                            <th scope="col" id="col">SEMBUH</th>
                                            <th scope="col" id="col">MENINGGAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($json_globe as $globe) : ?>
                                            <tr>
                                                <th scope="row"><?= $i ?></th>
                                                <td><?= $globe['attributes']['Country_Region'] ?></td>
                                                <td><?= $globe['attributes']['Confirmed'] ?></td>
                                                <td><?= $globe['attributes']['Recovered'] ?></td>
                                                <td><?= $globe['attributes']['Deaths'] ?></td>
                                            </tr>
                                            <?php $i++ ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end table -->

            <!-- card -->
            <div class="container">
                <div class="row">
                    <div class="col-md-6 sm-12">
                        <a href="https://www.unicef.org/indonesia/id/coronavirus">
                            <div class="card text-white bg-danger mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Novel coronavirus (COVID-19): Hal-hal yang perlu Anda ketahui</h5>
                                    <p class="card-text">UNICEF Indonesia</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 sm-12">
                        <a href="https://www.kompas.com/tren/read/2020/03/03/183500265/infografik-daftar-100-rumah-sakit-rujukan-penanganan-virus-corona">
                            <div class="card text-white bg-success mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">INFOGRAFIK: Daftar 100 Rumah Sakit Rujukan Penanganan Virus Corona</h5>
                                    <p class="card-text">Kompas</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end content -->

    <!-- footer -->
    <div class="footer">
        <div class="container">
            <p>Powered by <a href="https://kawalcorona.com/">kawalcorona.com/</a>. Made by Faturprayuda</p>
        </div>
    </div>
    <!-- end footer -->


    <!-- sticky bar js -->
    <script src="util/js/sticky_bar.js"></script>

    <!-- My JS //pelajari lagi soal ini -->
    <script src="util/js/main.js"></script>

    <!-- js bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>