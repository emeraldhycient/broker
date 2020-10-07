<?php

class blockIo{

    public static function getExchange(){
        $cURL= curl_init();

        curl_setopt($cURL, CURLOPT_URL, 'https://block.io/api/v2/get_current_price/?api_key=63f7-33cd-b8da-b142');
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);

        $exchange = curl_exec($cURL);
        curl_close($cURL);

        return $exchange;
    }

}