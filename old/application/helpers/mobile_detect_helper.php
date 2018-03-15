<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once ('application/libraries/Mobile_Detect.php');

if ( ! function_exists('get_device')){
   function get_device(){
        $detect = new Mobile_Detect();
	    
	    if ($detect->isMobile() || $detect->isTablet() || $detect->isAndroidOS()) {
	        $device = 'mobile';
	    } else {
	        $device = 'desktop';		
	    }

		return ($device);
   }
}