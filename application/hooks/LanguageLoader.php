<?php
class LanguageLoader
{

    function initialize() {
        $ci =& get_instance();
        $ci->load->helper('language');
        $ci->lang->load('header','spanish');

        $site_lang = $ci->session->userdata('site_lang');

        if ($site_lang) {
            $ci->lang->load(array('header','static','footer'),$ci->session->userdata('site_lang'));
        } else {
        	$_SESSION['site_lang'] = 'spanish';
        	$ci->lang->load(array('header','static','footer'),'spanish');
        }

    }
    
}