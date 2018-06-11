<?php


function loadpage($titre, $chemin_contenue, $data="")
{
    $ci=& get_instance();
    $page = $ci->load->view($chemin_contenue,$data, true);
    $template['titre']=$titre;
    $template['compte']['connecter']=false;
    if ($ci->session->connecter) {
        $template['compte'] = ["lien"=>site_url('/compte'),"contenue"=>$ci->session->nom, "connecter" => true];
    }

    $ci->load->view("template/default", array_merge (["page" => $page],$template));

}
