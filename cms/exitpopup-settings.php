<?php
function exitpopup_settings(){
    $s1 = get_option('exitpopup_settings_popup');
  

    if(empty($s1))
        $s1 = array();

    $settings = $s1;


    return apply_filters( 'exitpopup_settings', $settings );;
}
