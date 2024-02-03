<?php

if (!function_exists('convertArrayToObject')) {
    function convertArrayToObject($data){
        return json_decode (json_encode ( $data ), FALSE);
    }
}
