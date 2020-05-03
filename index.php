<?php
//membuka file JSON
// data corona provinsi
$data_prov = file_get_contents("https://api.kawalcorona.com/indonesia/provinsi");
$json_prov = json_decode($data_prov, true);

// data suspect corona indonesia
$data_indonesia = file_get_contents("https://api.kawalcorona.com/indonesia");
$json_indonesia = json_decode($data_indonesia, true);

// data corona global
$data_globe = file_get_contents("https://api.kawalcorona.com/");
$json_globe = json_decode($data_globe, true);

// // data  kasus corona di indonesia
// $kasus = "https://api.kawalcorona.com/detail/";
// $data_suspect = file_get_contents($kasus);
// $json_suspect = json_decode($data_suspect, true);

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
var_dump($json_globe[0]['attributes']['Last_Update']);
$dateUTC = $json_globe[36]['attributes']['Last_Update'];
$date = gmdate("D, d-M-Y H:i:s e");

$time = strtotime($date);

date_default_timezone_set('Asia/Jakarta');

$date = date("d-M-Y H:i:s", $time);


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
                <div class="navbar-nav ml-auto d-flex flex-wrap ">
                    <a class="nav-item nav-link" href="#"></i> Dashboard</a>
                    <a class="nav-item nav-link" href="#covid"></i> Covid-19</a>
                    <a class="nav-item nav-link" href="#sebar"></i> Penyebaran</a>
                    <a class="nav-item nav-link" href="#gejala"></i> Gejala</a>
                    <a class="nav-item nav-link" href="#cegah"></i> Pencegahan</a>
                    <a class="nav-item nav-link" href="#prov">Provinsi
                        Indonesia</a>
                    <!-- <a class="nav-item nav-link" href="#indo"><i class="fas fa-address-card"></i> Data Kasus
                        Indonesia</a> -->
                    <a class="nav-item nav-link" href="#globe">Global</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- content -->
    <div class="content">
        <!-- jumbotront -->
        <div class="jumbotron jumbotron-fluid">
            <div class="container text-jumbo">
                <img src="util/img/1588147361944.png" class="img-jumbo">
                <h1 class=" txt-logo text-center"><i class="fas fa-shield-virus"></i> Tanggap Corona</h1>
                <p class="lead text-center">Pantau dan Cegah Corona agar Keluarga Terlindungi</p>
            </div>
        </div>
        <!-- end jumbotront -->

        <!-- cardview top -->
        <div class="container cont-card">
            <div class="row">
                <div class="col-md-3">
                    <div class="card text-white bg-warning mb-3">
                        <div class="container">
                            <div class="row">
                                <div class="card-body">
                                    <p class="card-text total" style="font-weight: 500; margin-bottom: -10px; font-size: 13px;">
                                        TOTAL POSITIF</p>
                                    <p class="card-text data" style="margin: -5px 0;font-size: 30px;font-weight: bolder;"> <?php print_r($json_globe_pos['value']);
                                                                                                                            ?></p>
                                    <p class="card-text">ORANG</p>
                                </div>
                                <div class="">
                                    <img class="emot-img1" src="util/img/anxious.svg" style="width: 50px;margin: 15px 0 0 0;">
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
                                    <p class="card-text total" style="font-weight: 500; margin-bottom: -10px; font-size: 13px;">TOTAL SEMBUH</p>
                                    <p class="card-text data" style="margin: -5px 0;font-size: 30px;font-weight: bolder;"> <?php print_r($json_globe_sembuh['value']);
                                                                                                                            ?></p>
                                    <p class="card-text">ORANG</p>
                                </div>
                                <div class="col-4">
                                    <img class="emot" src="util/img/emotion.svg" style="width: 50px; margin: 15px 0 0 0;">
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
                                    <p class="card-text total" style="font-weight: 500; margin-bottom: -10px; font-size: 13px;">TOTAL MENINGGAL</p>
                                    <p class="card-text data" style="margin: -5px 0;font-size: 30px;font-weight: bolder;"> <?php print_r($json_globe_dead['value']);
                                                                                                                            ?></p>
                                    <p class="card-text">ORANG</p>
                                </div>
                                <div class="col-4">
                                    <img class="emot" src="util/img/emotion-sad.svg" style="width: 50px;margin: 15px 0 0 0;">
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
                                    <p class="card-text card-indo" style="font-weight: bolder;font-size: 20px;">INDONESIA</p>
                                    <?php foreach ($json_indonesia as $idn) :
                                    ?>
                                        <p class="card-text data-idn" style="margin: -4px 0;font-size: 11px;">
                                            <?= $idn['positif'] . " Positif, " . $idn['sembuh'] . " Sembuh, " . $idn['meninggal'] . " Meninggal";
                                            ?>
                                        </p>
                                    <?php endforeach;
                                    ?>
                                </div>
                                <div class="col-4">
                                    <img class="emot" src="util/img/indonesia.svg" style="width: 50px;margin: 15px 0 0 0;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tanggal -->
            <div class="container">
                <div class="text-center tanggal">
                    <p class="sumber-data">Sumber data : <a href="https://kawalcorona.com/">kawalcorona.com/</a>. Update terakhir :
                        <?= $date
                        ?></p>
                </div>
            </div>
        </div>

        <!-- about corona -->
        <div class="article1" id="covid">
            <div class="container">
                <div class="row row-artcile">
                    <div class="col-lg-6 col-sm-6 cont-article pos-dua">
                        <small class="pile-notif">Tentang Covid-19</small>
                        <h1 class="article-title mb-2">Apa itu Covid-19?</h1>
                        <p>COVID-19 adalah penyakit menular yang disebabkan oleh jenis coronavirus yang baru ditemukan. Ini merupakan virus baru dan penyakit yang sebelumnya tidak dikenal sebelum terjadi wabah di Wuhan, Tiongkok, bulan Desember 2019.</p>
                        <p>Coronavirus adalah suatu kelompok virus yang dapat menyebabkan penyakit pada hewan atau manusia. Beberapa jenis coronavirus diketahui menyebabkan infeksi saluran nafas pada manusia mulai dari batuk pilek hingga yang lebih serius seperti Middle East Respiratory Syndrome (MERS) dan Severe Acute Respiratory Syndrome (SARS). Coronavirus jenis baru yang ditemukan menyebabkan penyakit COVID-19. <a href="https://www.who.int/indonesia/news/novel-coronavirus/qa-for-public">(WHO)</a> </p>
                    </div>
                    <div class="col-lg-6 col-sm-6 cont-img-article pos-satu">
                        <img src="util/img/IMG_20200429_211603.png">
                    </div>
                </div>
            </div>
        </div>
        <!-- end about corona -->

        <!-- about spread corona -->
        <div class="article" id="sebar">
            <div class="container">
                <div class="row row-artcile1">
                    <div class="col-lg-6 cont-img-article pos-dua">
                        <div class="row">
                            <div class="col-6">
                                <div class="card card-icon">
                                    <img src="util/img/healthcare-and-medical.svg" class="card-img-top">
                                    <div class="card-body">
                                        <p class="card-text text-center" style="text-transform:capitalize;">Orang yang Bersin atau Batuk sembarangan menyebabkan droplet bertebaran disekitar.</p>
                                    </div>
                                </div>
                                <div class="card card-icon">
                                    <img src="util/img/business.svg" class="card-img-top">
                                    <div class="card-body">
                                        <p class="card-text text-center" style="text-transform:capitalize;">Hindari berjabat tangan untuk mencegah penyebaran coronavirus.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mt-5">
                                <div class="card card-icon">
                                    <img src="util/img/animals.svg" class="card-img-top">
                                    <div class="card-body">
                                        <p class="card-text text-center" style="text-transform:capitalize;">Sejumlah hewan liar berpeluang untuk menjadi inang bagi coronavirus, terutama kelelawar.</p>
                                    </div>
                                </div>
                                <div class="card card-icon">
                                    <img src="util/img/medical.svg" class="card-img-top">
                                    <div class="card-body">
                                        <p class="card-text text-center" style="text-transform:capitalize;">selain droplet, penyebaran coronavirus dapat menyebar melalui sentuhan.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 cont-article pos-satu spread-article">
                        <small class="pile-notif">Penyebaran Covid-19</small>
                        <h1 class="article-title mb-2">Bagaimana Covid-19 Menyebar?</h1>
                        <p>Orang dapat tertular COVID-19 dari orang lain yang terjangkit virus ini. COVID-19 dapat menyebar dari orang ke orang melalui percikan-percikan dari hidung atau mulut yang keluar saat orang yang terjangkit COVID-19 batuk atau mengeluarkan napas. Percikan-percikan ini kemudian jatuh ke benda-benda dan permukaan-permukaan di sekitar. Orang yang menyentuh benda atau permukaan tersebut lalu menyentuh mata, hidung atau mulutnya, dapat terjangkit COVID-19. Penularan COVID-19 juga dapat terjadi jika orang menghirup percikan yang keluar dari batuk atau napas orang yang terjangkit COVID-19. Oleh karena itu, penting bagi kita untuk menjaga jarak lebih dari 1 meter dari orang yang sakit. <a href="https://www.who.int/indonesia/news/novel-coronavirus/qa-for-public">(WHO)</a> </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end about spread corona -->

        <!-- about symptomps corona -->
        <div class="article1 mt-1" id="gejala">
            <div class="container">
                <div class="row row-artcile">
                    <div class="col-lg-12 cont-article mt-5">
                        <small class="pile-notif pile-gejala">Gejala Covid-19</small>
                        <h1 class="article-title mb-2 text-center">Gejala pada Covid-19</h1>
                        <p class="text-center">Gejala-gejala COVID-19 yang paling umum adalah demam, rasa lelah, dan batuk kering. Beberapa pasien mungkin mengalami rasa nyeri dan sakit, hidung tersumbat, pilek, sakit tenggorokan atau diare, Gejala-gejala yang dialami biasanya bersifat ringan dan muncul secara bertahap. Beberapa orang yang terinfeksi tidak menunjukkan gejala apa pun dan tetap merasa sehat. Sebagian besar (sekitar 80%) orang yang terinfeksi berhasil pulih tanpa perlu perawatan khusus. Sekitar 1 dari 6 orang yang terjangkit COVID-19 menderita sakit parah dan kesulitan bernapas. Orang-orang lanjut usia (lansia) dan orang-orang dengan kondisi medis yang sudah ada sebelumnya seperti tekanan darah tinggi, gangguan jantung atau diabetes, punya kemungkinan lebih besar mengalami sakit lebih serius. Mereka yang mengalami demam, batuk dan kesulitan bernapas sebaiknya mencari pertolongan medis. <a href="https://www.who.int/indonesia/news/novel-coronavirus/qa-for-public">(WHO)</a> </p>
                    </div>
                    <div class="img-symp mb-5">
                        <img src="util/img/symptomp.jpeg">
                    </div>
                </div>
            </div>
        </div>
        <!-- end about symptomps corona -->

        <!-- about prevent the spread corona -->
        <div class="article" id="cegah">
            <div class="container">
                <div class="row row-artcile">
                    <div class="col-lg-12 cont-article mt-5">
                        <small class="pile-notif pile-gejala">Pencegahan Covid-19</small>
                        <h2 class="article-title mb-2 text-center">Bagaimana Melindungi Diri dan Mencegah Penyebaran Covid-19?</h2>
                        <p class="text-center" style="margin-bottom: -100px">Tetap ikuti informasi terbaru tentang wabah COVID-19 yang tersedia di situs web WHO dan melalui Kementerian Kesehatan dan Dinas Kesehatan daerah Anda. Di banyak negara di dunia, kasus dan bahkan wabah COVID-19 telah terjadi. Pemerintah Tiongkok dan pemerintah beberapa negara lain telah berhasil memperlambat atau menghentikan wabah yang terjadi di wilayahnya. Namun, situasi yang ada masih sulit diprediksi. Karena itu, tetaplah ikuti berita terbaru.
                            Anda dapat mengurangi risiko terinfeksi atau menyebarkan COVID-19 dengan cara melakukan beberapa langkah pencegahan: </p>
                    </div>
                    <div class="col-lg-12 cont-img-article">
                        <div class="row">
                            <div class="col-6">
                                <h5>Yang Harus <span class="green" style="color: green">Dilakukan</span> : </h5>
                                <div class="card card-icon1 fix-card">
                                    <div class="row">
                                        <img src="util/img/hands-and-gestures.svg" class="card-img-top col-lg-4">
                                        <div class="card-body col-lg-8">
                                            <h5><b>Cuci Tangan Setiap hari</b></h5>
                                            <p class="card-text text-justify" style="text-transform:capitalize;">Mencuci tangan secara rutin dengan gel pembersih berbasis alkohol atau sabun dan bilas dengan air.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-icon1 fix-card">
                                    <div class="row">
                                        <img src="util/img/medical1.svg" class="card-img-top col-lg-4">
                                        <div class="card-body col-lg-8">
                                            <h5><b>Gunakan Masker</b></h5>
                                            <p class="card-text text-justify" style="text-transform:capitalize;">Penggunaan masker medis memang terbukti dapat mencegah penyebaran virus corona dan influenza dari orang-orang yang menunjukkan gejala.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-icon1 fix-card">
                                    <div class="row">
                                        <img src="util/img/house.svg" class="card-img-top col-lg-4">
                                        <div class="card-body col-lg-8">
                                            <h5><b>Lakukan Aktivitas Dirumah</b></h5>
                                            <p class="card-text text-justify" style="text-transform:capitalize;">
                                                Dengan tidak keluar rumah alias tetap berada di dalam rumah, akan meminimalisir Anda untuk terjangkit virus corona.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 ">
                                <h5>Yang Harus <span class="red" style="color: red">Jangan Dilakukan</span> : </h5>
                                <div class="card card-icon1 fix-card">
                                    <div class="row">
                                        <img src="util/img/shake.svg" class="card-img-top col-lg-4">
                                        <div class="card-body col-lg-8">
                                            <h5><b>Hindari Berjabat Tangan</b></h5>
                                            <p class="card-text text-justify" style="text-transform:capitalize;">Dengan tidak melakukan jabat tangan, akan menghindarkan terjadinya kontak kulit.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-icon1 fix-card">
                                    <div class="row">
                                        <img src="util/img/food.svg" class="card-img-top col-lg-4">
                                        <div class="card-body col-lg-8">
                                            <h5 style="font-size:18.9px"><b>Hindari Kontak dengan Binatang Liar</b></h5>
                                            <p class="card-text text-justify" style="text-transform:capitalize;">Menghindari sentuhan terhadap binatang-binatang liar/buruan (termasuk babi, rusa, unggas dan binatang liar lain) dan kotoran binatang.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-icon1 fix-card">
                                    <div class="row">
                                        <img src="util/img/sign.svg" class="card-img-top col-lg-4">
                                        <div class="card-body col-lg-8">
                                            <h5><b>Hindari Makan Makanan Mentah</b></h5>
                                            <p class="card-text text-justify" style="text-transform:capitalize;">Memastikan kebersihan dan kelayakan konsumsi makanan, serta menghindari konsumsi produk olahan dari binatang, termasuk susu, telur, daging dan makanan yang terkontaminasi kotoran binatang.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end about prevent the spread corona -->

        <!-- data province indo corona -->
        <div class="data-province" id="prov">
            <div class="container">
                <div class="prov-indo">
                    <div class="container pile-data">
                        <small class="pile-notif pile-data1">Data Covid-19</small>
                        <h1 class="article-title mb-2 text-center">Data Covid-19 Di Provinsi Indonesia</h1>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Data Kasus Coronavirus di Indonesia Berdasarkan Provinsi (Data by
                            kawalcorona.com)</h5>
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
                                            <?php $i++; ?>
                                        <?php endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end data province indo corona -->

        <!-- data global corona -->
        <div class="data-global" id="globe">
            <div class="container">
                <div class="globe">
                    <div class="container pile-data">
                        <small class="pile-notif pile-data1">Data Covid-19</small>
                        <h1 class="article-title mb-2 text-center">Data Covid-19 Global</h1>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Kasus Coronavirus Global (Data by kawalcorona.com)</h5>
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
                                        <?php $i = 1;
                                        ?>
                                        <?php foreach ($json_globe as $globe) :
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $i; ?></th>
                                                <td><?= $globe['attributes']['Country_Region']
                                                    ?></td>
                                                <td><?= $globe['attributes']['Confirmed']
                                                    ?></td>
                                                <td><?= $globe['attributes']['Recovered']
                                                    ?></td>
                                                <td><?= $globe['attributes']['Deaths']
                                                    ?></td>
                                            </tr>
                                            <?php $i++;
                                            ?>
                                        <?php endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end global corona -->

        <div class="container">
            <!-- <div class="row">
                <div class="col-md-12 sm-11">
                    <h3 class="text-logo"><i class="fas fa-shield-virus"></i> Tanggap Corona <span class="col sm-1">(Coronavirus Global & Indonesia Live Data)</span></h3>
                    <h5 class="col-md-12 sm-12">Pantau dan Cegah Corona agar Keluarga Terlindungi</h5>
                </div>
            </div> -->

            <!-- table data corona -->
            <div class="container">



                <!-- <div class="data-suspect">
                    <div class="card">
                        <h5 class="card-header" id="indo">Data Kasus Coronavirus di Indonesia (Data by kawalcorona.com)
                        </h5>
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
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> -->


            </div>
            <!-- end table -->

            <!-- card -->
            <div class="container">
                <div class="row">
                    <div class="col-md-6 sm-12">
                        <a href="https://www.unicef.org/indonesia/id/coronavirus">
                            <div class="card text-white bg-danger mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Novel coronavirus (COVID-19): Hal-hal yang perlu Anda ketahui
                                    </h5>
                                    <p class="card-text">UNICEF Indonesia</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 sm-12">
                        <a href="https://www.kompas.com/tren/read/2020/03/03/183500265/infografik-daftar-100-rumah-sakit-rujukan-penanganan-virus-corona">
                            <div class="card text-white bg-success mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">INFOGRAFIK: Daftar 100 Rumah Sakit Rujukan Penanganan Virus
                                        Corona</h5>
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>