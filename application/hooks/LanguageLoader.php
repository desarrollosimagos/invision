<?php
class LanguageLoader
{
    function initialize() {
        $ci =& get_instance();
		//~ $ci->session->sess_destroy();
        $ci->load->helper('language');
        $siteLang = $ci->session->userdata('site_lang');
        if ($siteLang) {
            $ci->lang->load('message',$siteLang);
            $ci->lang->load('header',$siteLang);
            $ci->lang->load('contact',$siteLang);
            $ci->lang->load('solicitud',$siteLang);
            $ci->lang->load('public_perfil',$siteLang);
            $ci->lang->load('base_public',$siteLang);
            //~ $ci->lang->load('admin_p',$siteLang);
            //~ $ci->lang->load('contact',$siteLang);
            $ci->lang->load('footer',$siteLang);
        } else {
            $ci->lang->load('message','spanish');
            $ci->lang->load('header','spanish');
            $ci->lang->load('contact','spanish');
            $ci->lang->load('solicitud','spanish');
            $ci->lang->load('public_perfil','spanish');
            $ci->lang->load('base_public','spanish');
            //~ $ci->lang->load('admin_p','spanish');
            //~ $ci->lang->load('contact','spanish');
            $ci->lang->load('footer','spanish');
        }
    }
}
