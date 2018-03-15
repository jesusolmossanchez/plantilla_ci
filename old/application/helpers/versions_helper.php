<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_asset_versioned')){
    function get_asset_versioned($asset){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, base_url()."assets/app/json/config.json");
        $result = curl_exec($ch);
        curl_close($ch);

        $json_config = json_decode($result, true);

        $version_number = $json_config["version"];

        echo base_url().$asset."?v=".$version_number;
    }
}

if ( ! function_exists('get_asset_no_cache')){
    function get_asset_no_cache($asset){
        echo base_url().$asset."?t=".uniqid();
    }
}

if ( ! function_exists('get_asset_string')){
    function get_asset_string($asset){
        ob_start();
        include FCPATH.$asset;
        $css = ob_get_contents();
        ob_end_clean();
        $css_absolute = str_replace("url('../", "url('".base_url()."assets/app/", $css);
        $css_absolute = str_replace("url(../", "url(".base_url()."assets/app/", $css_absolute);
        return $css_absolute;
    }
}