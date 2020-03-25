<?php
$data_prov = file_get_contents("https://api.kawalcorona.com/");
$json_prov = json_decode($data_prov, true);

foreach ($json_prov as $prov) {
    if (is_array($prov)) {
        var_dump($prov);
        die;
    }
}
