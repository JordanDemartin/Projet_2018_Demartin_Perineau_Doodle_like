<?php


function loadpage($template, $chemin_contenue, $data="")
{
    $ci=& get_instance();
    $page = $ci->load->view($chemin_contenue,$data, true);
    if (!isset($template['compte'])) {
        $template['compte']=["lien"=>site_url('/compte'),'contenue'=>"connexion"];
    }
    $ci->load->view("template/default", array_merge (["page" => $page],$template));

}
