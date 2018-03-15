<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Output extends CI_Output {

    function _display_cache(&$CFG, &$URI){
        /* Deshabilitada la cache */
        return false;

        /* SE PODRÍA DESHABILITAR POR ENTORNOS O POR LO QUE SEA */

        return parent::_display_cache($CFG,$URI);
    }
    function _write_cache($output){
        /* Deshabilitada la cache */
        return false;

        return parent::_write_cache($output);
    }
}

?>