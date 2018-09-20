<?php
// My API Key for the test account
$APIkey = "1fc3e2d9f8653cb3e0a10e2a004a725d";
// Convert given title to url friendly
$data = rawurlencode($_POST['title']);
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.themoviedb.org/3/search/movie?include_adult=false&page=1&query=" . $data . "&language=en-US&api_key=" . $APIkey,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => "{}",
    CURLOPT_SSL_VERIFYPEER => false,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}
